<?php
// load wordpress
//require_once('get_wp.php');
function shortcodes_variables(){
  $shortcode_options = array (
  array(
    "name" => "Create a button",
    "id" => "button_shortcode",
    "options" =>array(
      "url" => array(
        "type" => "text",
        "std" => "",
        "label" => "Button URL",
        "desc" => "Please enter your buttons URL in here"),
      "text" => array(
        "type" => "text",
        "std" => "Button text",
        "label" => "Button Text",
        "desc" => "Please enter your button's text in here"),
      "size" => array(
        "type" => "select",
        "std" => "medium",
        "label" => "Button Size",
        "desc" => "Please select your button size. Default:Medium",
        "options" =>array(
          "small" => "Small",
          "medium" => "Medium",
          "big" => "Big")
        ),
      "style" => array(
        "type" => "select",
        "std" => "square",
        "label" => "Button Style",
        "desc" => "Please select your button style. Default:square",
        "options" =>array(
          "round" => "Round",
          "less_round" => "Less Round",
          "square" => "Square")
        ),
      "color" => array(
        "type" => "select",
        "std" => "black",
        "label" => "Button Color",
        "desc" => "Please select your button color. Default:black",
        "options" =>array(
          "gray" => "Gray",
          "blue" => "Blue",
          "red" => "Red",
          "green" => "Green",
          "black" => "Black")
        ),
      "alignment" => array(
        "type" => "select",
        "std" => "none",
        "label" => "Button Alignment",
        "desc" => "Please select your button alignment. Default:none",
        "options" =>array(
          "none" => "None",
          "left" => "Left",
          "right" => "Right",
          "center" => "Center")
        )
      )
    ),
  array(
    "name" => "Create a box",
    "id" => "box_shortcode",
    "options" =>array(
      "text" => array(
        "type" => "textarea",
        "std" => "Box text",
        "label" => "Box Text",
        "desc" => "Please enter your box's text in here"),
      "type" => array(
        "type" => "select",
        "std" => "success",
        "label" => "Button Type",
        "desc" => "Please select your box type. Default:Success",
        "options" =>array(
          "success" => "Success",
          "warning" => "Warning",
          "error" => "Error",
          "info" => "Info",
          "note" => "Note",
          "normal" => "normal")
        ),
      "style" => array(
        "type" => "select",
        "std" => "square",
        "label" => "Box Style",
        "desc" => "Please select your box style. Default:square",
        "options" =>array(
          "round" => "Round",
          "less_round" => "Less Round",
          "square" => "Square")
        )
      )
    )
  );
  return $shortcode_options;
}

?>
