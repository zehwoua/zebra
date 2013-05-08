<?php
function display_shortcode($popup){
  require_once('shortcodes-definition.php');
  global $shortcode_options;
  $popup = $popup .'_shortcode';
  $shortcode_options = shortcodes_variables();

  foreach ($shortcode_options as $shortcode_option) {
    if($shortcode_option['id'] == $popup ){
      foreach ($shortcode_option['options'] as $key => $value) {
        shortcode_fields($key,$value, $popup);
      }// end of foreach
    }// end of if
  }//end of foreach
}// end of function display_shortcode

function shortcode_fields($key, $value, $id){
  $output = "";
  $field = $value['type'];
  $field_id = $id."_".$key;
  switch ($field) {
    case 'text':
      $output .= '<div id="'.$key.'" class="zebras_shortcode_field">';
        $output .='<label class="shortcode_label" for ="'.$field_id.'">'.$value['label'].'</label>';
        $output .= '<input type="text" value="'.$value['std'].'" id ="'.$field_id.'" name ="'.$field_id.'"/>';
        $output .= '<p>'.$value['desc'].'</p>';
      $output .= '</div>';
    break;

    case 'textarea':
      $output .= '<div id="'.$key.'" class="zebras_shortcode_field">';
        $output .='<label class="shortcode_label" for ="'.$field_id.'">'.$value['label'].'</label>';
        $output .= '<textarea value="'.$value['std'].'" id ="'.$field_id.'" name ="'.$field_id.'"></textarea>';
        $output .= '<p>'.$value['desc'].'</p>';
      $output .= '</div>';
    break;

    case 'select':
      $output .= '<div id="'.$key.'" class="zebras_shortcode_field">';
        $output .='<label class="shortcode_label" for ="'.$field_id.'">'.$value['label'].'</label>';
        $output .= '<select name="button-size" id ="'.$field_id.'" name ="'.$field_id.'" size="1">';
          foreach ($value['options'] as $select_key => $select_value) {
            if($value['std'] == $select_key){
              $select = "selected ='selected'";
            }else $select = '';
            $output .= '<option '.$select.' value="'. $select_key .'">'. $select_value .'</option>';
          }
        $output .= '</select>';
        $output .= '<p>'.$value['desc'].'</p>';
      $output .= '</div>';
    break;
  }
  echo $output;
}// end of function shortcode_fields
?>
