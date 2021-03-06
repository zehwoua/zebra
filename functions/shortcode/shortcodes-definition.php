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
      "content" => array(
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
    ),
  array(
    "name" => "Create Columns",
    "id" => "columns_shortcode",
    "options" =>array(
      "column_layout" => array(
        "type" => "select",
        "std" => "none",
        "label" => "Column Type :",
        "desc" => "Please select your column layout type.",
        "options" =>array(
          "none" => "Please Select Column Layout",
          "size-two" => "Two Column Layout",
          "size-three" => "Three Column Layout",
          "size-four" => "Four Column Layout")
        ),
      "size-two" => array(
        "type" => "select",
        "display" => "hidden",
        "std" => "size-two",
        "label" => "Columns :",
        "desc" => "Please select your columns.",
        "options" =>array(
          "size-two" => "Two one")
        ),
      "size-three" => array(
        "type" => "select",
        "display" => "hidden",
        "std" => "size-three",
        "label" => "Columns :",
        "desc" => "Please select your columns.",
        "options" =>array(
          "size-three" => "Three one",
          "size-three-two" => "Three two")
        ),
      "size-four" => array(
        "type" => "select",
        "display" => "hidden",
        "std" => "size-four",
        "label" => "Columns :",
        "desc" => "Please select your columns.",
        "options" =>array(
          "size-four" => "Four one",
          "size-four-two" => "Four two",
          "size-four-three" => "Four three")
        ),
      "add-column-button" => array(
        "type" => "button",
        "label" => "Add Column"
        ),
      "column-error" => array(
        "type" => "error",
        "label" => "You cannot add anymore columns!"
        ),
      "show-columns" => array(
        "type" => "column-display",
        "label" => "Column Layout",
        "desc" => "Your column Layout"
        )
      )
    ),
  array(
    "name" => "Create a toggle",
    "id" => "toggle_shortcode",
    "options" =>array(
      "title" => array(
        "type" => "text",
        "std" => "Your Toggle title",
        "label" => "Toggle title",
        "desc" => "Please enter your toggle title in here"),
      "content" => array(
        "type" => "textarea",
        "std" => "Toggle Content",
        "label" => "Toggle Content",
        "desc" => "Please enter your toggle content in here"),
      "type" => array(
        "type" => "select",
        "std" => "open",
        "label" => "Toggle state",
        "desc" => "Please select your toggle state. Default:Open",
        "options" =>array(
          "open" => "Open",
          "close" => "Close")
        )
      )
    ),
  array(
    "name" => "Create a dropcap",
    "id" => "dropcap_shortcode",
    "options" =>array(
      "content" => array(
        "type" => "text",
        "std" => "Dropcap Content",
        "label" => "Dropcap Content",
        "desc" => "Please enter your dropcap content in here"),
      "color" => array(
        "type" => "select",
        "std" => "gray",
        "label" => "Dropcap Color",
        "desc" => "Please select your dropcap color. Default:gray",
        "options" =>array(
          "gray" => "Gray",
          "blue" => "Blue",
          "red" => "Red",
          "green" => "Green",
          "black" => "Black")
        )
      )
    ),
  array(
    "name" => "Create a testimonial",
    "id" => "testimonial_shortcode",
    "options" =>array(
      "content" => array(
        "type" => "textarea",
        "std" => "Testimonial Content",
        "label" => "Testimonial Content",
        "desc" => "Please enter your testimonial content in here"),
      "name" => array(
        "type" => "text",
        "std" => "The person's name",
        "label" => "The person's name",
        "desc" => "Please enter the name of the person in here"),
      "title" => array(
        "type" => "text",
        "std" => "The person's title",
        "label" => "The person's title",
        "desc" => "Please enter the title/company of the person in here")
      )
    ),
  array(
    "name" => "Create a divider",
    "id" => "divider_shortcode",
    "options" =>array(
      "style" => array(
        "type" => "select",
        "std" => "",
        "label" => "Divider Style",
        "desc" => "Please select your divider style. Default:normal",
        "options" =>array(
          "" => "select divider style",
          "normal" => "normal",
          "style1" => "Style 1",
          "style2" => "Style 2",
          "style3" => "Style 3",
          "style4" => "Style 4",
          "style5" => "Style 5",
          "style6" => "Style 6",
          "style7" => "Style 7")
        ),
      "show-columns" => array(
        "type" => "column-display",
        "label" => "Divider Preview",
        "desc" => "You can preview your divider"
        )
      )
    ),
  );
  return $shortcode_options;
}

?>
