<?php
function display_fonts($class, $fonts){
   $returned_fonts = return_font_values($fonts);
   $display_font_size = $returned_fonts['font_size'];
   $display_font_style = $returned_fonts['font_size_type'];
   $display_font_family = $returned_fonts['font_family'];
   $display_font_color = $returned_fonts['font_color'];
   echo $class."{
     font-size:".$display_font_size."".$display_font_style." !important;
     font-family:".$display_font_family.";
     color:".$display_font_color."!important;
   }";
}

function display_sidebar_layout(){
  if(get_option('zbr_sidebar_layout') != ''){
    $layout = get_option('zbr_sidebar_layout');
    //echo $layout;
    switch ($layout) {
      case 'left':
        echo "#sidebar{float:left;}#content{float:right;}";
        break;

      case 'right':
        echo "#sidebar{float:right;}#content{float:left;}";
        break;
    }
  }
}

function display_bg_settings($target_setting, $target_object){
  $style = "";
  if(get_option('zbr_'.$target_setting.'_background_color') != '' || get_option('zbr_'.$target_setting.'_background_image') != ''){
    $settings = array();
    $style = $target_object.'{';
    // Check the bg color is set ?
    if(get_option('zbr_'.$target_setting.'_background_color') != ''){
      $background_color = get_option('zbr_'.$target_setting.'_background_color');
      $style .= 'background-color:'.$background_color.';';
    }
    // Check the bg image is set ?
    if(get_option('zbr_'.$target_setting.'_background_image') != ''){
      $background_image = get_option('zbr_'.$target_setting.'_background_image');
      $background_repeat = get_option('zbr_'.$target_setting.'_background_image_repeat');
      $background_position = get_option('zbr_'.$target_setting.'_background_image_position');

      $style .= 'background-image: url('.$background_image.');';
      $style .= 'background-repeat:'.$background_repeat.';';
      $style .= 'background-position:'.$background_position.';';
    }
    $style .= '}';
    echo $style;
  }
}

function return_font_values($fonts){
  $listed_fonts = array();

  foreach ($fonts as $key => $font) {
    switch ($key) {
      case 'font_size':
        $listed_fonts[$key] = $font;
        break;

      case 'font_size_type':
        $listed_fonts[$key] = $font;
        break;

      case 'font_family':
        $listed_fonts[$key] = $font;
        break;

      case 'font_style':
        $listed_fonts[$key] = $font;
        break;

      case 'font_color':
        $listed_fonts[$key] = $font;
        break;
    }
  }
  return $listed_fonts;
}
function get_default_color($value){
  if($value['type'] == 'color'){
    // get the default color
    if($value['std']) $default_color = $value['std'];
    // check if there is any color stored in the db

    if(get_settings( $value['id'] ) != '' ){
      // assign the selected color as default color
      $default_color = get_settings( $value['id'] );
    }
  }
  return $default_color;
}

function color_picker($value, $color){
  if($value['type']== 'color'){ ?>
    <div class="colorSelector" id="<?php echo $value['id']."_picker"; ?>">
      <div style="background-color: <?php echo $color; ?>"></div>
    </div>
    <input type="text" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" class="color_display_panel" value="<?php echo $color; ?>"/>
  <?php }else if($value['type']== 'font'){ ?>
    <div class="colorSelector" id="<?php echo $value['id']."_font_color_picker"; ?>">
      <div style="background-color: <?php echo $color; ?>"></div>
    </div>
    <input type="text" name="<?php echo $value['id']."_font_color"; ?>" id="<?php echo $value['id']."_font_color"; ?>" class="color_display_panel" value="<?php echo $color; ?>"/>
    <?php } ?>
  <?php
}

function tapography_options($value, $shortname){

  $fst = array("px",'em');
  $ff = array(
    "Arial, Helvetica, sans-serif",
    "Arial Black, Gadget, sans-serif",
    "Comic Sans MS, cursive, sans-serif",
    "Impact, Charcoal, sans-serif",
    "Lucida Sans Unicode, Lucida Grande, sans-serif",
    "Tahoma, Geneva, sans-serif",
    "Trebuchet MS, Helvetica, sans-serif",
    "Verdana, Geneva, sans-serif",
    "Courier New, Courier, monospace",
    "Lucida Console, Monaco, monospace");

  $fs = array(
    "Normal",
    "Light",
    "Bold",
    "Italic",
    "Normal-Italic",
    "Bold-Italic",
    "Light-Italic");

  // check the default font values first
  $returned_fonts = return_font_values($value['std']);
  $default_font_size = $returned_fonts['font_size'];
  $default_font_style = $returned_fonts['font_size_type'];
  $default_font_family = $returned_fonts['font_family'];
  $default_font_color = $returned_fonts['font_color'];


  if(get_settings($value['id'])){

    // check the stored font values and replace with default font variable if there is
    $returned_fonts = return_font_values(get_settings($value['id']));
    $default_font_size = $returned_fonts['font_size'];
    $default_font_style = $returned_fonts['font_size_type'];
    $default_font_family = $returned_fonts['font_family'];
    $default_font_color = $returned_fonts['font_color'];
  }
  ?>
  <select name="<?php echo $value['id']."_font_size"; ?>" id="<?php echo $value['id']."_font_size"; ?>">
    <?php for ($i=1; $i<=70 ;$i++){ ?>
      <option <?php if ($default_font_size == $i) { echo 'selected="selected"'; } ?> value="<?php echo $i; ?>">
        <?php echo $i; ?>
      </option>
    <?php } ?>
  </select>

  <select name="<?php echo $value['id']."_font_size_type"; ?>" id="<?php echo $value['id']."_font_size"; ?>">
    <?php foreach($fst as $ft ){ ?>
      <option <?php if ($default_font_size_type == $ft) { echo 'selected="selected"'; } ?> value="<?php echo $ft; ?>">
        <?php echo $ft; ?>
      </option>
    <?php } ?>
  </select>

  <select name="<?php echo $value['id']."_font_family"; ?>" id="<?php echo $value['id']."_font_size"; ?>">
    <?php foreach($ff as $f ){ ?>
      <option <?php if ($default_font_family == $f) { echo 'selected="selected"'; } ?> value="<?php echo $f; ?>">
        <?php echo $f; ?>
      </option>
    <?php } ?>
  </select>

  <select name="<?php echo $value['id']."_font_style"; ?>" id="<?php echo $value['id']."_font_size"; ?>">
    <?php foreach($fs as $s ){ ?>
      <option <?php if ($default_font_style == $s) { echo 'selected="selected"'; } ?> value="<?php echo $s; ?>">
        <?php echo $s; ?>
      </option>
    <?php } ?>
  </select>

  <?php color_picker($value, $default_font_color);

}
