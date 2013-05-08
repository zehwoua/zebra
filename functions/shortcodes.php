<?php

/*-----------------------------------------------------------------------------------*/
/*  Setting up Column Layout shortcodes
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
      return '<div class="zebras_button zebras_button_' . $size . ' zebras_button_' . $color . ' zebras_button_' . $style . ' zebras_button_' . $align . '"><a href="' . $url . '">' . do_shortcode($content) . '</a></div>';

}
add_shortcode('button', 'zebras_button_shortcode');

/*-----------------------------------------------------------------------------------*/
/*  Setting up Alert Box shortcodes
/*-----------------------------------------------------------------------------------*/

function zebras_box_shortcode( $atts, $content = null )
{
      extract( shortcode_atts( array(
        'type' => 'success',
        'style' => 'color',
        'text' => '',
      ), $atts ) );
      return '<div class="zebras_box zebras_box_' . $type . ' zebras_box_' . $style . '"><div class="zebras_box_inner">' . do_shortcode($content) . '</div></div>';

}
add_shortcode('box', 'zebras_box_shortcode');
