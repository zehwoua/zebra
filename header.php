<?php
/**
 * @package WordPress
 * @subpackage Classic_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

  <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

  <style type="text/css" media="screen">
    @import url( <?php bloginfo('stylesheet_url'); ?> );
  </style>
  <link rel="icon" type="image/png" href="<?php if(get_option('zbr_favicon') != ""){ echo get_option('zbr_favicon'); }?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
  <style type="text/css">
  <?php
  if(get_option('zbr_site_title') == 'true'){
    $fonts_h1 = get_option('zbr_site_title_styling');
    display_fonts('#site-title',$fonts_h1);
    if(get_option('zbr_site_description' )=='true'){
      $fonts_h2 = get_option('zbr_site_description_styling');
      display_fonts('#site-description',$fonts_h2);
    }
  }
   if(get_option('zbr_custom_css') != '' ){
     echo get_option('zbr_custom_css');
   }
   if(get_option('zbr_custom_tapography') == 'true'){
     $fonts_nav = get_option('zbr_site_nav_styling');
     display_fonts('#header_navigation a',$fonts_nav);

     $fonts_nav = get_option('zbr_sidebar_widget_title');
     display_fonts('h3.widget_title',$fonts_nav);

     $fonts_nav = get_option('zbr_post_title');
     display_fonts('h2.post_title a',$fonts_nav);

   }
   display_bg_settings('body','body');
   display_bg_settings('header','#header');
   display_sidebar_layout();

   if(get_option('zbr_link_color') != ''){
     echo "a{color:". get_option('zbr_link_color') .";}";
   }
   if(get_option('zbr_link_hover_color') != ''){
     echo "a:hover{color:".get_option('zbr_link_hover_color').";}";
   }

  ?>
  </style>
  <?php wp_get_archives('type=monthly&format=link'); ?>
  <?php //comments_popup_script(); // off by default ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="header" class="clearfix <?php if(get_option('zbr_header_position')) echo get_option('zbr_header_position'); ?>">
  <div id="header_wrap" class="wrap <?php if(get_option('zbr_body_layout')) echo get_option('zbr_body_layout'); ?>">
  <div class="inner clearfix">
    <div id="site-information">
      <?php if(get_option('zbr_site_title') == ''){ ?>
      <div id="logo">
        <a href="<?php bloginfo('url'); ?>/">
          <!-- Checking if there is custom logo option-->
          <?php if(get_option('zbr_logo') != ""){ ?>
            <img src="<?php echo get_option('zbr_logo'); ?>" title="" alt="" />
          <?php }else{ ?>
            <img src="<?php bloginfo('template_directory')?>/images/logo.png" title="" alt="" />
          <?php } ?>
        </a>
      </div><!--/logo-->
      <?php } ?>

      <a href="<?php bloginfo('url'); ?>/">
        <?php if(get_option('zbr_site_title') == 'true'){ ?><h1 id="site-title"><?php bloginfo('name'); ?></h1><?php } ?>
        <?php if(get_option('zbr_site_description') == 'true'){ ?><h2 id="site-description"><?php bloginfo( 'description' ); ?></h2><?php } ?>
      </a>
    </div><!--/#site-information-->

    <nav id="header-navigation">
      <?php if ( function_exists('has_nav_menu') && has_nav_menu('main-menu') ) { ?>
        <?php wp_nav_menu(array( 'theme_location' => 'main-menu', 'menu_id' => 'header_navigation', 'menu_class' => 'clearfix','walker' => new ZebraWeb_Nav_Menu() )); ?>
      <?php } ?>
    </nav>
  </div><!--/.inner-->
</div><!--/header-wrap-->
</div><!--/header-->
<h1 id="page-title">
  <div class="wrap <?php if(get_option('zbr_body_layout')) echo get_option('zbr_body_layout'); ?>">
    <div class="inner">
      <span><?php the_title(); ?></span>
    </div><!--/inner-->
  </div>
</h1>
<div id="main_content" class="clearfix">
  <div id="body_wrap" class="wrap <?php if(get_option('zbr_body_layout')) echo get_option('zbr_body_layout'); ?>">
    <div class="inner clearfix">
      <div id="content">
