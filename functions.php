<?php

// Set path to ZEbrasweb Framework and theme specific functions
$functions_path = get_template_directory() . '/include/';

require_once ($functions_path . 'admin-options.php' );       // Admin framework options
require_once ($functions_path . 'admin-sidebar.php' );       // Admin options sidebar
require_once ($functions_path . 'theme-admin.php' );         // Add admin options panel to wordpress
require_once ($functions_path . 'theme-admin-init.php');     // Admin init page
require_once ($functions_path . 'admin-font.php' );          // Admin options font
require_once ($functions_path . 'admin-custom-menu.php' );   // Add custom menu
require_once ($functions_path . 'image_upload.php' );        // Image upload




function mytheme_add_admin() {

global $themename, $shortname, $options;

if ( $_GET['page'] == basename(__FILE__) ) {
  $fonts = array();

  if ( 'save' == $_REQUEST['action'] ) {

    foreach ($options as $value) {
      $variable = '';
      $variable = $_REQUEST[ $value['id']];

       if($value['type'] == 'font'){

         foreach ( array( 'font_size', 'font_size_type','font_family','font_style','font_color') as $f  ) {
           $requested_font = $value['id']."_".$f;
           $fonts[$f] =  stripslashes($_REQUEST[ $requested_font ]);
         }// end of foreach
         $variable = $fonts;
       }//end of if type == font

      update_option( $value['id'], $variable  );

    }// end of foreach

    foreach ($options as $value) {
      $variable = '';
      $variable = $_REQUEST[ $value['id']];

      if( isset( $_REQUEST[ $value['id'] ] ) ) {
        update_option( $value['id'], $variable  );

      }else if($value['type'] == 'font'){
        foreach ( array( 'font_size', 'font_size_type','font_family','font_style','font_color') as $f  ) {
            $requested_font = $value['id']."_".$f;
            $fonts[$f] =  stripslashes($_REQUEST[ $requested_font ]);
        }
        $variable = $fonts;
        update_option( $value['id'], $variable);
      } else {
       delete_option( $value['id'] );
      }
    }

  header("Location: admin.php?page=functions.php&saved=true");
die;
}
else if( 'reset' == $_REQUEST['action'] ) {

  foreach ($options as $value) {
    delete_option( $value['id'] ); }

  header("Location: admin.php?page=functions.php&reset=true");
die;

}
}
add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin');
}

add_theme_support('post-thumbnails');


/*-----------------------------------------------------------------------------------*/
/*	Zebras Custom Sidebars
/*-----------------------------------------------------------------------------------*/


function add_zebra_sidebars(){
	// Register new Sidebar
	if( function_exists('register_sidebar')){
		register_sidebar(array(
			'name' => 'Sidebar',
			'id' => 'sidebar1',
			'before_widget' => '<li id="%1$s" class="%2$s widget">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget_title">',
			'after_title' => '</h3>'
			));
	}

	// Create new sidebars
	if(function_exists('register_sidebar')){
		register_sidebar(array(
			'name' => 'Homepage Sidebar',
			'id' => 'homepage-sidebar',
			'description' => 'this is homepage sidebar',
			'before_widget' => '<li id="%1$s" class="%2$s widget">',
			'after_widget' => '</li>',
			'before_title' => '<h3 class="widget_title">',
			'after_title' => '</h3>'
			));
	}
}


add_action( 'widgets_init', 'add_zebra_sidebars' );

/*-----------------------------------------------------------------------------------*/
/*	Zebras Custom Footers
/*-----------------------------------------------------------------------------------*/


function add_zebra_footers(){
	// Register new Sidebar
	$footer_widget = get_option('zbr_footer_widget_layout');
	for($i = 1; $i <= $footer_widget; $i++){
		if( function_exists('register_sidebar')){
			register_sidebar(array(
				'name' => 'Footer Widget '.$i,
				'id' => 'footer_widget_'.$i,
				'before_widget' => '<li id="%1$s" class="%2$s widget">',
				'after_widget' => '</li>',
				'before_title' => '<h3 class="widget_title">',
				'after_title' => '</h3>'
				));
		}
	}
}


add_action( 'widgets_init', 'add_zebra_footers' );

/*-----------------------------------------------------------------------------------*/
/*	Zebras Custom Widgets
/*-----------------------------------------------------------------------------------*/

include($functions_path .'widget-recent-posts.php');
include($functions_path .'widget-popular-posts.php');
include($functions_path .'widget-twitter.php');
include(get_template_directory().'/functions/zebras_buttons/shortcodes.php');

/*-----------------------------------------------------------------------------------*/
/*	Zebras Post view Count
/*-----------------------------------------------------------------------------------*/

// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0 View';
    }
    return $count.' Views';
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Add it to a column in WP-Admin - (Optional)
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}
