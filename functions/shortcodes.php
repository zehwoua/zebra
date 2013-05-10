<?php

/*-----------------------------------------------------------------------------------*/
/*  Setting up Column Layout shortcodes
/*-----------------------------------------------------------------------------------*/

// two column layout
function two_column_size_one( $atts, $content = null ){
  return '<div class="size size-two">' . do_shortcode($content) . '</div>';
}
add_shortcode('col-size-two-one', 'two_column_size_one');

// three column layout
function three_column_size_one( $atts, $content = null ){
  return '<div class="size size-three">' . do_shortcode($content) . '</div>';
}
add_shortcode('col-size-three-one', 'three_column_size_one');

// four column layout
function four_column_size_one( $atts, $content = null ){
  return '<div class="size size-four">' . do_shortcode($content) . '</div>';
}
add_shortcode('col-size-four-one', 'four_column_size_one');

// three column two layout
function three_column_size_two( $atts, $content = null ){
  return '<div class="size size-three-two">' . do_shortcode($content) . '</div>';
}
add_shortcode('col-size-three-two', 'three_column_size_two');

// four column three layout
function four_column_size_three( $atts, $content = null ){
  return '<div class="size size-four-three">' . do_shortcode($content) . '</div>';
}
add_shortcode('col-size-four-three', 'four_column_size_three');

// four column two layout
function four_column_size_two( $atts, $content = null ){
  return '<div class="size size-four-two">' . do_shortcode($content) . '</div>';
}
add_shortcode('col-size-four-two', 'four_column_size_two');

//LAST COLUMNS
function two_column_size_one_last( $atts, $content = null ){
  return '<div class="size size-two last-size">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}
add_shortcode('col-size-two-one-last', 'two_column_size_one_last');

function three_column_size_one_last( $atts, $content = null ){
  return '<div class="size size-three last-size">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}
add_shortcode('col-size-three-one-last', 'three_column_size_one_last');

function four_column_size_one_last( $atts, $content = null ){
  return '<div class="size size-four last-size">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}
add_shortcode('col-size-four-one-last', 'four_column_size_one_last');

function three_column_size_two_last( $atts, $content = null ){
  return '<div class="size size-three-two last-size">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}
add_shortcode('col-size-three-two-last', 'three_column_size_two_last');

function four_column_size_two_last( $atts, $content = null ){
  return '<div class="size size-four-three last-size">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}
add_shortcode('col-size-four-two-last', 'four_column_size_two_last');

function four_column_size_three_last( $atts, $content = null ){
  return '<div class="size size-four-three last-size">' . do_shortcode($content) . '</div><div class="clearfix"></div>';
}
add_shortcode('col-size-four-three-last', 'four_column_size_three_last');

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

/*-----------------------------------------------------------------------------------*/
/*  Setting up Toggle shortcodes
/*-----------------------------------------------------------------------------------*/

function zebras_toggle_shortcode( $atts, $content = null )
{
      extract( shortcode_atts( array(
        'title' => 'Toggle title',
        'state' => 'open'
      ), $atts ) );
      return '<div class="zebras_toggle" data="'. $state .'"><h3 class="zebras_toggle_title"><div class="toggle_title_inner">'. $title .'</div></h3><div class="zebras_toggle_content"><div class="zebras_toggle_inner">' . do_shortcode($content) . '</div><!--/zebras_toggle_inner--></div></div><!--/zebras_toggle-->';

}
add_shortcode('toggle', 'zebras_toggle_shortcode');

/*-----------------------------------------------------------------------------------*/
/*  Setting up Dropcap shortcodes
/*-----------------------------------------------------------------------------------*/

function zebras_dropcap_shortcode( $atts, $content = null )
{
      extract( shortcode_atts( array(
        'color' => 'gray'
      ), $atts ) );
      return '<span class="zebras_dropcap zebras_dropcap_'.$color.'">' . do_shortcode($content) . '</span>';

}
add_shortcode('dropcap', 'zebras_dropcap_shortcode');

/*-----------------------------------------------------------------------------------*/
/*  Setting up Quote shortcodes
/*-----------------------------------------------------------------------------------*/

function zebras_quote_shortcode( $atts, $content = null )
{
      extract( shortcode_atts( array(
        'color' => 'gray'
      ), $atts ) );
      return '<blockquote class="zebras_quote" >' . do_shortcode($content) . '</blockquote>';

}
add_shortcode('quote', 'zebras_quote_shortcode');

/*-----------------------------------------------------------------------------------*/
/*  Setting up Testimonial shortcodes
/*-----------------------------------------------------------------------------------*/

function zebras_testimonial_shortcode( $atts, $content = null )
{
      extract( shortcode_atts( array(
        'name' => 'person name',
        'title' => 'person title'
      ), $atts ) );
      $test = '<div class="testimonial_container clearfix>">
                <div class="zebras_testimonial" >
                  <div class="zebras_testimonial_inner">' . do_shortcode($content) . '</div>
                </div>';

      $test .=   '<div class="testimonial_person_detail">
                  <p class="testimonial_person_name">'.$name.'</p>
                  <p class="testimonial_person_title">'.$title.'</p>
                </div>
              </div><!--/testimonial_conteiner-->';
      return $test;

}
add_shortcode('testimonial', 'zebras_testimonial_shortcode');
