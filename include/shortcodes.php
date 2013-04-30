<?php
/*
Plugin Name: zebras Short Code Buttons
Plugin URI: http://pippinsplugins.com/user-friendly-short-codes-plugin-example/
Description: Adds user-friendly short code buttons to your  WordPress site. This plugin is more of an example than anything, but does provide a few nice looking buttons
Version: 1.0
Author: Pippin Williamson
Author URI: http://pippinsplugins.com
*/

// plugin root folder
$file_dir = get_stylesheet_directory_uri().'/functions/zebras_buttons/';

/*-----------------------------------------------------------------------------------*/
/*  Setting up Button shortcodes
/*-----------------------------------------------------------------------------------*/

function zebras_button_shortcode( $atts, $content = null )
{
      extract( shortcode_atts( array(
        'color' => 'blue',
        'size' => 'medium',
        'style' => 'round',
        'align' => 'none',
        'text' => '',
        'url' => '',
      ), $atts ) );
      return '<div class="zebras_button zebras_button_' . $size . ' zebras_button_' . $color . ' zebras_button_' . $style . ' zebras_button_' . $align . '"><a href="' . $url . '">' . $text . $content . '</a></div>';

}
add_shortcode('button', 'zebras_button_shortcode');


/*-----------------------------------------------------------------------------------*/
/*  Load the buttons css
/*-----------------------------------------------------------------------------------*/

function zebras_buttons_css()
{
        // the path to our root plugin folder
  global $file_dir;
  wp_enqueue_style('zebras-buttons', $file_dir . '/includes/css/zebras_buttons.css');
}
add_action('wp_print_styles', 'zebras_buttons_css');


/*-----------------------------------------------------------------------------------*/
/*  Register Buttons
/*-----------------------------------------------------------------------------------*/

function register_zebras_buttons($buttons) {
  // inserts a separator between existing buttons and our new one
  // "friendly_button" is the ID of our button
  array_push($buttons, "|", "zebras_button");
  return $buttons;
}
/*-----------------------------------------------------------------------------------*/
/*  Filters the tinyMCE buttons and adds our custom buttons
/*-----------------------------------------------------------------------------------*/

function zebras_shortcode_buttons() {
  // Don't bother doing this stuff if the current user lacks permissions
  if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
    return;

  // Add only in Rich Editor mode
  if ( get_user_option('rich_editing') == 'true') {
    // filter the tinyMCE buttons and add our own
    add_filter("mce_external_plugins", "add_zebras_tinymce_plugin");
    add_filter('mce_buttons', 'register_zebras_buttons');
  }
}
// init process for button control
add_action('init', 'zebras_shortcode_buttons');

// add the button to the tinyMCE bar
function add_zebras_tinymce_plugin($plugin_array) {
  global $file_dir;
  $plugin_array['zebras_button'] = $file_dir . '/zebras-shortcode-buttons.js';
  return $plugin_array;
}
