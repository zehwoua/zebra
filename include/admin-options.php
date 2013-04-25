<?php
$themename = "ZebraTheme";
$shortname = "zbr";

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category");

$options = array (

  // array( "name" => $themename." Options",
  //   "type" => "title"),

// General Group section starts in here
  array("name" => "General Settings",
    "id" => $shortname."_group_general_settings",
    "type" => "group"),

  array( "name" => "General",
    "type" => "section"),

  array( "type" => "open"),

  array( "name" => "Colour Scheme",
    "desc" => "Select the colour scheme for the theme",
    "id" => $shortname."_color_scheme",
    "type" => "radio",
    "stly" => "color",
    "options" => array("black" => "#000","green" => "#2acc35" ,"red" => "#B11623","orange" => "#F54828"),
    "std" => "#000"),

  array( "name" => "Custom Logo",
    "desc" => "Please upload your own logo",
    "id" => $shortname."_logo",
    "type" => "upload",
    "std" => ""),

  array( "name" => "Site Title",
    "desc" => "Would you like to display the site title next to logo? Check this box if you want. Default: checked",
    "id" => $shortname."_site_title",
    "type" => "checkbox",
    "std" => ""),

  array("name" => "Title Inner Section",
    "id" => $shortname."_is_title",
    "type" => "inner_section_open"
    ),

  array( "name" => "Site Title Styling",
    "desc" => "You can style your site title from the options.",
    "id" => $shortname."_site_title_styling",
    "type" => "font",
    "std" => array(
      "font_size" => "50",
      "font_size_type" => "px",
      "font_family" => "Comic Sans MS, cursive, sans-serif",
      "font_style" => "normal",
      "font_color" => "#000000")
    ),

  array( "name" => "Site Descrition",
    "desc" => "Would you like to display the site description next to logo? Check this box if you want. Default: checked",
    "id" => $shortname."_site_description",
    "type" => "checkbox",
    "std" => ""),

  array( "name" => "Site Description Styling",
    "desc" => "You can style your site title from the options.",
    "id" => $shortname."_site_description_styling",
    "type" => "font",
    "std" => array(
      "font_size" => "20",
      "font_size_type" => "px",
      "font_family" => "Comic Sans MS, cursive, sans-serif",
      "font_style" => "normal",
      "font_color" => "#0000ff")
    ),

  array("name" => "Title Inner Section",
    "type" => "inner_section_close"
    ),

  array( "name" => "Custom Favicon",
    "desc" => "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",
    "id" => $shortname."_favicon",
    "type" => "upload",
    "std" => ""),


  array( "name" => "Custom CSS",
    "desc" => "Want to add any custom CSS code? Put in here, and the rest is taken care of. This overrides any other stylesheets. eg: a.button{color:green}",
    "id" => $shortname."_custom_css",
    "type" => "textarea",
    "std" => ""),

  array( "type" => "close"),
  array( "type" => "group_close"),
  // General Group Ends in here

  // Body Group section starts in here
  array("name" => "Body Settings",
    "id" => $shortname."_group_body_settings",
    "type" => "group"),

  array( "name" => "Body Settings",
    "type" => "section"),

  array( "type" => "open"),

  array( "name" => "Body Background Color",
    "desc" => "You can select a backgroun color for your bg",
    "id" => $shortname."_body_background_color",
    "type" => "color",
    "std" => ""),

  array( "name" => "Body Background Image",
    "desc" => "You can upload a background image for your theme",
    "id" => $shortname."_body_background_image",
    "type" => "upload",
    "std" => ""),

  array( "name" => "Body Background Image Repeat",
    "desc" => "Please select the background image repeat",
    "id" => $shortname."_body_background_image_repeat",
    "type" => "select",
    "options" => array("no-repeat", "repeat", "repeat-x", "repeat-y"),
    "std" => "Choose a category"),

  array( "name" => "Body Background Image Position",
    "desc" => "Please select the background image position",
    "id" => $shortname."_body_background_image_position",
    "type" => "select",
    "options" => array("top left", "center left", "bottom left", "top right", "center right", "center bottom","center center"),
    "std" => "Choose a category"),

  array( "name" => "Link Color",
    "desc" => "You can select a color for your links",
    "id" => $shortname."_link_color",
    "type" => "color",
    "std" => "#000000"),

  array( "name" => "Link Hover Color",
    "desc" => "You can select a color for your links on hover position",
    "id" => $shortname."_link_hover_color",
    "type" => "color",
    "std" => "#000000"),

  array( "type" => "close"),
  array( "type" => "group_close"),
  // Body Group settings Ends in here

  // Layout settings starts in here
  array("name" => "Layout Settings",
    "id" => $shortname."_group_layout_settings",
    "type" => "group"),

  array( "name" => "Homepage",
    "type" => "section"),
  array( "type" => "open"),

  array( "name" => "Body Layout",
    "desc" => "Select your theme's body layout",
    "id" => $shortname."_body_layout",
    "type" => "radio",
    "stly" => "bg",
    "options" => array("full" => "body-full-width-icon.png", "boxed" => "body-boxed-width-icon.png"),
    "std" => "full"),

  array( "name" => "Sidebar Layout",
    "desc" => "Select your theme's sidebar position",
    "id" => $shortname."_sidebar_layout",
    "type" => "radio",
    "stly" => "bg",
    "options" => array("right" => "sidebar-right-icon.png", "left" => "sidebar-left-icon.png"),
    "std" => "right"),

  array( "name" => "Homepage header image",
    "desc" => "Enter the link to an image used for the homepage header.",
    "id" => $shortname."_header_img",
    "type" => "text",
    "std" => ""),

  array( "name" => "Homepage featured category",
    "desc" => "Choose a category from which featured posts are drawn",
    "id" => $shortname."_feat_cat",
    "type" => "select",
    "options" => $wp_cats,
    "std" => "Choose a category"),

  array( "type" => "close"),
  array( "type" => "group_close"),
  // Layout Group Ends in here

// Tapography settings starts in here
  array("name" => "Tapography Settings",
    "id" => $shortname."_group_tapography_settings",
    "type" => "group"),

  array( "name" => "Tapography",
    "type" => "section"),
  array( "type" => "open"),

  array( "name" => "Custom Tapography",
    "desc" => "Would you like to enable the custom tapography",
    "id" => $shortname."_custom_tapography",
    "type" => "checkbox",
    "std" => ""),

  array( "name" => "Site Navigation Styling",
    "desc" => "You can style your site navigation from the options.",
    "id" => $shortname."_site_nav_styling",
    "type" => "font",
    "std" => array(
      "font_size" => "50",
      "font_size_type" => "px",
      "font_family" => "Comic Sans MS, cursive, sans-serif",
      "font_style" => "normal",
      "font_color" => "#000000")
    ),

  array( "name" => "Post Title Styling",
    "desc" => "You can style your posts title from the options.",
    "id" => $shortname."_post_title",
    "type" => "font",
    "std" => array(
      "font_size" => "50",
      "font_size_type" => "px",
      "font_family" => "Comic Sans MS, cursive, sans-serif",
      "font_style" => "normal",
      "font_color" => "#000000")
    ),

  array( "name" => "Sidebar Widget Title Styling",
    "desc" => "You can style your sidebar widget title from the options.",
    "id" => $shortname."_sidebar_widget_title",
    "type" => "font",
    "std" => array(
      "font_size" => "50",
      "font_size_type" => "px",
      "font_family" => "Comic Sans MS, cursive, sans-serif",
      "font_style" => "normal",
      "font_color" => "#000000")
    ),

  array( "name" => "Footer Widget Title Styling",
    "desc" => "You can style your footer widget title from the options.",
    "id" => $shortname."_footer_widget_title",
    "type" => "font",
    "std" => array(
      "font_size" => "50",
      "font_size_type" => "px",
      "font_family" => "Comic Sans MS, cursive, sans-serif",
      "font_style" => "normal",
      "font_color" => "#000000")
    ),

  array( "type" => "close"),
  array( "type" => "group_close"),
  // Tapography Group Ends in here


  // Header settings starts in here
  array("name" => "Header Settings",
    "id" => $shortname."_group_header_settings",
    "type" => "group"),

  array( "name" => "Header",
    "type" => "section"),

  array( "type" => "open"),

  array( "name" => "Header position",
    "desc" => "Please select your themes header position",
    "id" => $shortname."_header_position",
    "type" => "select",
    "options" => array("Static", "Fixed"),
    "std" => "Choose a category"),

  array( "name" => "Header Background Color",
    "desc" => "You can select a backgroun color for your theme header",
    "id" => $shortname."_header_background_color",
    "type" => "color",
    "std" => ""),

  array( "name" => "Header Background Image",
    "desc" => "You can upload a background image for your theme header",
    "id" => $shortname."_header_background_image",
    "type" => "upload",
    "std" => ""),

   array( "name" => "Header Background Image Repeat",
    "desc" => "Please select the backgroun image repeat",
    "id" => $shortname."_header_background_image_repeat",
    "type" => "select",
    "options" => array("no-repeat", "repeat", "repeat-x", "repeat-y"),
    "std" => "Choose a category"),

  array( "name" => "Header Background Image Position",
    "desc" => "Please select the background image position",
    "id" => $shortname."_header_background_image_position",
    "type" => "select",
    "options" => array("top left", "center left", "bottom left", "top right", "center right", "center bottom","center center"),
    "std" => "Choose a category"),

  array( "type" => "close"),
  array( "type" => "group_close"),
  // Header Group Ends in here

  // Footer settings starts in here
  array("name" => "Footer Settings",
    "id" => $shortname."_group_footer_settings",
    "type" => "group"),

  array( "name" => "Footer",
    "type" => "section"),

  array( "type" => "open"),

  array( "name" => "Footer copyright text",
    "desc" => "Enter text used in the right side of the footer. It can be HTML",
    "id" => $shortname."_footer_text",
    "type" => "text",
    "std" => ""),

  array( "name" => "Google Analytics Code",
    "desc" => "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.",
    "id" => $shortname."_ga_code",
    "type" => "textarea",
    "std" => ""),

  array( "name" => "Feedburner URL",
    "desc" => "Feedburner is a Google service that takes care of your RSS feed. Paste your Feedburner URL here to let readers see it in your website",
    "id" => $shortname."_feedburner",
    "type" => "text",
    "std" => get_bloginfo('rss2_url')),

  array( "type" => "close"),
  array( "type" => "group_close")
  // Footer Group Ends in here

);
