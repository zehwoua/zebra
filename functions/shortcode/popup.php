<?php

// loads the shortcodes class, wordpress is loaded with it
require_once('shortcodes-output.php');

// get popup type
// $shortcode = new zilla_shortcodes( $popup );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">

  //if($('.zebras_shortcode_name').length > 0){

    //shortcode_id = jQuery('.zebras_shortcode_name').attr(id);
    //output = '['+ shortcode_id +']';
    // jQuery('.zebras_shortcode_field').each(function(){
    //   shortcode_field = jQuery(this).attr('id');
    //   sc = shortcode_id + '_' + shortcode_field;
    //   jQuery(sc).val();
    // });
    // output ="test";
  //}
  jQuery("#insert").click(function(e){
    shortcode_text_content = '';
    if(window.tinyMCE)
        {
          shortcode_id = jQuery('.zebras_shortcode_name').attr("id");
          output = '['+ shortcode_id + ' ';
          jQuery('.zebras_shortcode_field').each(function(){
            shortcode_field = jQuery(this).attr('id');
            sc = shortcode_id + '_shortcode_' + shortcode_field;
            shortcode_value = jQuery("#"+sc).val();
            if(shortcode_value != ''){
              if(shortcode_field != 'text'){
                output += shortcode_field +'="'+ shortcode_value+ '" ';
              }else{
                shortcode_text_content = ']' + shortcode_value;
              }
            }
            else{
              shortcode_text_content = ']';
            }
          });

          output += shortcode_text_content +'[/'+ shortcode_id +']';
          window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, output);
          tb_remove();
          jQuery('.zebras_shortcode_name').empty();
        }
  });
</script>
</head>
<body>
<?php
$popup = trim( $_GET['popup'] );
echo '<div id="'.$popup.'" class="zebras_shortcode_name">';
display_shortcode($popup);
echo '</div>';
?>
<div id="insert" style="display: block; line-height: 24px;">Insert</div>
</body>
</html>
