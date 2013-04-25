<?php
function add_img($value){
  ?>
<div id="<?php echo $value['id']."_container"; ?>">
  <label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
  <div class="choise">
    <input type="text" readonly="readonly" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo esc_url(get_settings( $value['id']) ); } else { echo $value['std']; }  ?>" class="uploaded_img_url" />
    <input id="<?php echo $value['id']."_button"; ?>" rel="<?php echo $value['id']; ?>" type="button" class="upload_button" value="Upload" />
  </div><!--/choise-->
  <div class="definition">
    <?php echo $value['desc']; ?>
  </div><!--/definition-->
  <div class="clearfix"></div>
  <div id="<?php echo $value['id']."_preview"; ?>" class="uploaded_img_container">
    <?php if ( get_settings( $value['id'] ) != "" || $value['std'] != ""){ ?>
      <img src="<?php bloginfo('template_directory')?>/functions/images/delete_x.png" class="image_delete_btn" rel="<?php echo $value['id']; ?>" title="delete uploaded image" alt="delete uploaded image" />
    <?php } ?>
    <img class="uploaded_img_preview" style="max-width:100%;" src="<?php if ( get_settings( $value['id'] ) != "") { echo esc_url(get_settings( $value['id']) ); } else { echo $value['std']; }  ?>" />
  </div><!--uploaded-img-container-->
</div><!--/upload container-->
  <?php
}
?>
