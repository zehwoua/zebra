<?php

// loads the shortcodes class, wordpress is loaded with it
require_once('shortcodes-output.php');

// get popup type
// $shortcode = new zilla_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

</head>
<body>
  <div id="transparent"></div>
  <div id="zebras_shortcode_popup">
    <?php
      $popup = trim( $_GET['popup'] );
    echo '<div id="'.$popup.'" class="zebras_shortcode_name">';
      display_shortcode($popup);
    echo '</div>';
    ?>
    <div id="insert" style="display: block; line-height: 24px;">Insert</div>
  </div><!--/zebras-shortcode-popup-->
</body>
</html>
