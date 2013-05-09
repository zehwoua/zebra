<?php
/*
Plugin Name: ZebrasShortcodes
Plugin URI: http://www.themezilla.com/plugins/zillashortcodes
Description: A simple shortcode generator. Add buttons, columns, tabs, toggles and alerts to your theme.
Version: 1.1
Author: ZebrasWeb
Author URI: http://www.themezilla.com
*/

class ZebrasShortcodes {

    function __construct()
    {
      $path = esc_url(trailingslashit(get_template_directory() . '/' . basename( dirname( __FILE__ ) ) ) );
      $path_uri = esc_url(trailingslashit(get_template_directory_uri() . '/' . basename( dirname( __FILE__ ) ) ) );

      require_once( $path .'shortcodes.php');
      define('ZEBRAS_SHORTCODE_DIR', $path .'shortcode/');
      define('ZEBRAS_SHORTCODE_URI', $path_uri .'shortcode/');
        add_action('init', array(&$this, 'init'));
        add_action('admin_init', array(&$this, 'admin_init'));
  }


  /**
   * Registers TinyMCE rich editor buttons
   *
   * @return  void
   */
  function init()
  {
    if( ! is_admin() )
    {
      wp_enqueue_style( 'zebras-shortcodes', ZEBRAS_SHORTCODE_URI . 'css/zebras_shortcodes.css' );
      wp_enqueue_script( 'jquery-ui-accordion' );
      wp_enqueue_script( 'jquery-ui-tabs' );
      wp_enqueue_script( 'zebra-shortcodes-js', ZEBRAS_SHORTCODE_URI . 'js/zebra-shortcodes-js.js', array('jquery', 'jquery-ui-accordion', 'jquery-ui-tabs') );
    }

    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
      return;

    if ( get_user_option('rich_editing') == 'true' )
    {
      add_filter( 'mce_external_plugins', array(&$this, 'add_zebra_shortcodes') );
      add_filter( 'mce_buttons', array(&$this, 'register_shortcodes_buttons') );
    }
  }

  // --------------------------------------------------------------------------

  /**
   * Defins TinyMCE rich editor js plugin
   *
   * @return  void
   */
  function add_zebra_shortcodes( $plugin_array )
  {
    $plugin_array['zebraShortcodes'] = ZEBRAS_SHORTCODE_URI . 'add_shortcodes.js';
    return $plugin_array;
  }

  // --------------------------------------------------------------------------

  /**
   * Adds TinyMCE rich editor buttons
   *
   * @return  void
   */
  function register_shortcodes_buttons( $buttons )
  {
    array_push( $buttons, "|", 'zebra_button' );
    return $buttons;
  }

  /**
   * Enqueue Scripts and Styles
   *
   * @return  void
   */
  function admin_init()
  {
    // css
    // wp_enqueue_style( 'zilla-popup', ZILLA_TINYMCE_URI . '/css/popup.css', false, '1.0', 'all' );

    // // js
    wp_enqueue_script( 'jquery-ui-sortable' );
    wp_enqueue_script( 'jquery-livequery', ZEBRAS_SHORTCODE_URI . '/js/jquery.livequery.js', false, '1.1.1', false );
    wp_enqueue_script( 'jquery-appendo', ZEBRAS_SHORTCODE_URI . '/js/jquery.appendo.js', false, '1.0', false );
    wp_enqueue_script( 'base64', ZEBRAS_SHORTCODE_URI . '/js/base64.js', false, '1.0', false );
    wp_enqueue_script( 'zebra-popup', ZEBRAS_SHORTCODE_URI . '/js/shortcode_popup.js', false, '1.0', false );
    wp_enqueue_style( 'zebras-popup', ZEBRAS_SHORTCODE_URI . 'css/zebras_popup.css' );
    wp_localize_script( 'jquery', 'ZebrasShortcodesFolder', array('shortcodes_folder' => ZEBRAS_SHORTCODE_URI ) );
  }

}
$zebras_shortcodes = new ZebrasShortcodes();

?>
