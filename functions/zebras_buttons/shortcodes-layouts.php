<?php
/*
Plugin Name: zebras Short Code Layouts
Plugin URI: http://pippinsplugins.com/user-friendly-short-codes-plugin-example/
Description: Adds user-friendly short code buttons to your  WordPress site. This plugin is more of an example than anything, but does provide a few nice looking buttons
Version: 1.0
Author: Pippin Williamson
Author URI: http://pippinsplugins.com
*/

// plugin root folder
$file_dir = get_stylesheet_directory_uri().'/functions/zebras_buttons/';

/*-----------------------------------------------------------------------------------*/
/*  Setting up Layout shortcodes
/*-----------------------------------------------------------------------------------*/

// two column layout
function two_column_size_one( $atts, $content = null ){
  return '<div class="size size-two">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_col_one', 'two_column_size_one');

// three column layout
function three_column_size_one( $atts, $content = null ){
  return '<div class="size size-three">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_col_one', 'three_column_size_one');

// four column layout
function four_column_size_one( $atts, $content = null ){
  return '<div class="size size-four">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_col_one', 'four_column_size_one');

// three column two layout
function three_column_size_two( $atts, $content = null ){
  return '<div class="size size-three-two">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_col_two', 'three_column_size_two');

// four column three layout
function four_column_size_three( $atts, $content = null ){
  return '<div class="size size-four-three">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_col_three', 'four_column_size_three');

//LAST COLUMNS
function two_column_size_one_last( $atts, $content = null ){
  return '<div class="size size-two last-size">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_col_one_last', 'two_column_size_one_last');

function three_column_size_one_last( $atts, $content = null ){
  return '<div class="size size-three last-size">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_col_one_last', 'three_column_size_one_last');

function four_column_size_one_last( $atts, $content = null ){
  return '<div class="size size-four last-size">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_col_one_last', 'four_column_size_one_last');

function three_column_size_two_last( $atts, $content = null ){
  return '<div class="size size-three-two last-size">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_col_two_last', 'three_column_size_two_last');

function four_column_size_three_last( $atts, $content = null ){
  return '<div class="size size-four-three last-size">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_col_three_last', 'four_column_size_three_last');


/*-----------------------------------------------------------------------------------*/
/*  Load the Layout css
/*-----------------------------------------------------------------------------------*/

function zebras_layouts_css()
{
        // the path to our root plugin folder
  global $file_dir;
  wp_enqueue_style('zebras-layouts', $file_dir . '/includes/css/zebras_layouts.css');
}
add_action('wp_print_styles', 'zebras_layouts_css');


/*-----------------------------------------------------------------------------------*/
/*  Register Layouts
/*-----------------------------------------------------------------------------------*/

function register_zebras_layouts($layouts) {
  // inserts a separator between existing layouts and our new one
  // "friendly_button" is the ID of our button
  array_push($layouts, "|", "zebras_layout");
  return $layouts;
}
/*-----------------------------------------------------------------------------------*/
/*  Filters the tinyMCE buttons and adds our custom buttons
/*-----------------------------------------------------------------------------------*/

function zebras_shortcode_layouts() {
  // Don't bother doing this stuff if the current user lacks permissions
  if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
    return;

  // Add only in Rich Editor mode
  if ( get_user_option('rich_editing') == 'true') {
    // filter the tinyMCE buttons and add our own
    add_filter("mce_external_plugins", "add_zebras_layout_tinymce_plugin");
    add_filter('mce_buttons', 'register_zebras_layouts');
  }
}
// init process for button control
add_action('init', 'zebras_shortcode_layouts');

// add the button to the tinyMCE bar
function add_zebras_layout_tinymce_plugin($plugin_array) {
  global $file_dir;
  $plugin_array['zebras_layout'] = $file_dir . '/zebras-shortcode-layouts.js';
  return $plugin_array;
}
