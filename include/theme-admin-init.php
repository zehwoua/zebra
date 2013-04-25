<?php
function mytheme_add_init() {

$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/functions/css/functions.css", false, "1.0", "all");
wp_enqueue_style("cp", $file_dir."/functions/css/cp.css", false, "1.0", "all");
// wp_enqueue_style("layout", $file_dir."/functions/css/layout.css", false, "1.0", "all");

wp_enqueue_script("rm_script", $file_dir."/functions/js/rm_script.js", false, "1.0");
wp_enqueue_script("eye", $file_dir."/functions/js/eye.js", false, "1.0");
wp_enqueue_script("layout", $file_dir."/functions/js/layout.js", false, "1.0");
wp_enqueue_script("jquery.easytabs.min", $file_dir."/functions/js/jquery.easytabs.min.js", false, "1.0");

    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');

    wp_enqueue_script('media-upload');

wp_enqueue_script("ut", $file_dir."/functions/js/ut.js", false, "1.0");
wp_enqueue_script("cp", $file_dir."/functions/js/cp.js", false, "1.0");

}

add_action( 'wp_enqueue_scripts', 'zebrasweb_scripts' );

function zebrasweb_scripts() {
  $ss_url = get_stylesheet_directory_uri();
  wp_enqueue_script( 'jquery');
  wp_enqueue_script( 'theme-scripts', "{$ss_url}/js/theme-scripts.js" );
}
add_action( 'wp_enqueue_scripts', 'zebrasweb_styles' );

function zebrasweb_styles(){
  $ss_url = get_stylesheet_directory_uri();
  $color_scheme = get_option('zbr_color_scheme');
  wp_enqueue_style( 'reset', "{$ss_url}/functions/css/reset.css" );
  wp_enqueue_style( '{$color_scheme}', "{$ss_url}/stylesheets/{$color_scheme}.css" );
  wp_enqueue_style( 'app', "{$ss_url}/stylesheets/app.css" );
}

