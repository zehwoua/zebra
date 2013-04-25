<?php
function mytheme_admin() {

global $themename, $shortname, $options;
$i=0;

if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<link href="http://fonts.googleapis.com/css?family=Ubuntu:bold" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900' rel='stylesheet' type='text/css'>

<div class="wrap rm_wrap">
<form method="post" class="clearfix">
  <h2>
    <span class="submit">
      <input name="save" type="submit" value="Save changes" class="general_button_settings <?php echo $shortname ?>_save_button"/>
    </span>
    <?php echo $themename; ?> Settings
  </h2>
  <div class="clearfix"></div>

<div class="rm_opts clearfix">
  <div id="admin_options_content">
  <?php admin_options_sidebar(); ?>

  <?php foreach ($options as $value) {
  switch ( $value['type'] ) {

    case "open": ?>
      <?php break;

    case "close": ?>
      </div>
      </div>
      <br />
      <?php break;

    // IF the array group type "Group"--->
    case "group": ?>
      <div class="group" id="<?php echo $value['id']; ?>">
      <?php break;

    case "group_close": ?>
      </div><!--/group-close-->
      <?php break;


    case "inner_section_open":
    ?>

    <div class="<?php echo $value['id']; ?>">


    <?php break;

    case "inner_section_close":
    ?>
    </div>

    <?php break;

    case "title":
    ?>
    <p>To easily use the <?php echo $themename;?> theme, you can use the menu below.</p>


    <?php break;

    case 'text':
    ?>

    <div class="section section_text clearfix">
      <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
      <div class="choise clearfix">
        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
      </div><!--/choise-->
      <div class="definition">
        <?php echo $value['desc']; ?>
      </div><!--/definition-->
    </div><!--/section-->

    <?php
    break;

    case 'textarea':
    ?>

    <div class="section section_textarea clearfix">
      <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
      <div class="choise clearfix">
        <textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
      </div><!--/choise-->
      <div class="definition">
          <?php echo $value['desc']; ?>
      </div><!--/definition-->
    </div><!--/section-->

    <?php
    break;

    case 'select':
    ?>

    <div class="section section_select clearfix">
      <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
      <div class="choise clearfix">
        <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
          <?php foreach ($value['options'] as $option) { ?>
            <option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?> value="<?php echo $option; ?>"><?php echo $option; ?></option><?php } ?>
        </select>
      </div><!--/choise-->
      <div class="definition">
        <?php echo $value['desc']; ?>
      </div><!--/definition-->
    </div><!--/section-->
    <?php
    break;

    case 'select_color_scheme':
    ?>

    <div class="section select_color_scheme clearfix">
      <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
      <div class="choise clearfix">
          <?php foreach ($value['options'] as $option) { ?>
            <div class="radio_option_container">
              <input <?php if (get_settings( $value['id'] ) == $option) { echo 'checked="checked"'; } ?> type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $option; ?>">
              <div class="radio_display" style="background:<?php echo $option; ?>"></div>
            </div>
          <?php } ?>
      </div><!--/choise-->
      <div class="definition">
        <?php echo $value['desc']; ?>
      </div><!--/definition-->
    </div><!--/section-->
    <?php
    break;

    case 'radio':
    ?>
    <div class="section section_radio clearfix">
      <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
      <div class="choise clearfix">
          <?php foreach ($value['options'] as $key => $option) { ?>
            <div class="radio_option_container">
              <?php if($value['stly'] == "bg"){ ?>
                <input class="none_display_radio" id="<?php echo $value['id']."_".$key."_option"; ?>" <?php if (get_settings( $value['id'] ) == $key) { echo 'checked="checked"'; } else if($value['std'] == $key){ echo 'checked="checked"'; } ?> type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>">
                <div class="radio_display" class="<?php echo $value['id']."_".$key."_option"; ?>" style="background:url(<?php echo get_template_directory_uri(); ?>/functions/images/<?php echo $option ?>) no-repeat; ?>"></div>
              <?php }else if($value['stly'] == "color"){ ?>
                <input class="none_display_radio" id="<?php echo $value['id']."_".$key."_option"; ?>" <?php if (get_settings( $value['id'] ) == $key) { echo 'checked="checked"'; } else if($value['std'] == $option){ echo 'checked="checked"'; } ?> type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>">
                <div class="radio_display" class="<?php echo $value['id']."_".$option."_option"; ?>" style="background:<?php echo $option ?>;"></div>
              <?php } ?>
            </div>
          <?php } ?>
      </div><!--/choise-->
      <div class="definition">
        <?php echo $value['desc']; ?>
      </div><!--/definition-->
    </div><!--/section-->
    <?php
    break;

    case 'color':
    ?>

    <div class="section section_select_color clearfix">
      <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
      <div class="choise clearfix">
        <?php
         $color = get_default_color($value);
         color_picker($value, $color);
        ?>
      </div><!--/choise-->
      <div class="definition">
        <?php echo $value['desc']; ?>
      </div><!--/definition-->
    </div><!--/section-->
    <?php
    break;

    case 'font':
    ?>

    <div class="section section_select_font clearfix">
      <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
      <div class="definition">
        <?php echo $value['desc']; ?>
      </div><!--/definition-->
      <div class="choise clearfix">
        <?php tapography_options($value, $shortname); ?>
      </div><!--/choise-->
    </div><!--/section-->
    <?php
    break;

    case "checkbox":
    ?>

    <div class="section section_checkbox clearfix">
      <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
      <div class="choise clearfix">
        <?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
      </div><!--/choise-->
      <div class="definition">
        <?php echo $value['desc']; ?>
      </div><!--/definition-->
    </div><!--/section-->
    <?php break;

    case "upload":
    ?>

    <div class="section section_upload clearfix">
      <?php add_img($value); ?>
    </div><!--/section-->
    <?php break;


    case "section":

    $i++;

    ?>

    <div class="rm_section">
      <div class="rm_title">
        <h3><img src="<?php bloginfo('template_directory')?>/functions/images/trans.png" class="inactive" alt=""><?php echo $value['name']; ?></h3>
        <div class="clearfix"></div>
      </div><!--/rm_title-->
    <div class="rm_options">


    <?php break;

    }
  }
?>

<input type="hidden" name="action" value="save" />
</div><!--/admin-options-content-->

</div><!--/rm_opts-->
</form>
<form method="post">
  <p class="submit">
    <input class="<?php echo $shortname; ?>_reset_button general_button_settings" name="reset" type="submit" value="Reset" />
    <input type="hidden" name="action" value="reset" />
  </p>
</form>
</div><!--/wrap wm_wrap-->

<?php
}
?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
