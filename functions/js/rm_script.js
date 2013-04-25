jQuery(document).ready(function(){

  if(jQuery('#zbr_site_title').is(':checked')){
    jQuery('.zbr_is_title').show();
  }else{jQuery('.zbr_is_title').hide();}

  jQuery('#zbr_site_title').click(function(){
    if(jQuery(this).is(':checked')){
      jQuery('.zbr_is_title').slideDown();
    }else{
      jQuery('.zbr_is_title').slideUp();
    }
  });

jQuery('#admin_options_content').easytabs();

// this code is for radio buttons in the admin panel
var checked_radio = jQuery(".section_radio input[type='radio']:checked").next().addClass('selected_radio');
jQuery('.section_radio .radio_display').click(function(){
  var radio_name = jQuery(this).prev().attr('name');
  var clicked_radio = jQuery(this);
  clicked_radio.addClass('selected_radio').prev().attr('checked','checked');
  // check there are any active div and remove the selected_radio class if there is any
  jQuery('input[name = "'+ radio_name +'"]:not(:checked)').each(function(){
    jQuery(this).removeAttr('checked');
    jQuery(this).next().removeClass('selected_radio');

  });
});

// this code calls colorpicker

jQuery('.section_select_font, .section_select_color').each(function(o){

  color_picker_target = jQuery(this).find(".color_display_panel").attr('id');
  color = jQuery(this).find(".color_display_panel").val();
  color_picker_target = color_picker_target+"_picker";
  var target = '#'+color_picker_target;
  jQuery(target).children( 'div' ).css( 'backgroundColor', color );

  jQuery(target).ColorPicker({
    color:color,
    onShow: function ( colpkr ) {
            jQuery( colpkr ).fadeIn( 200 );
            return false;
          },
          onHide: function ( colpkr ) {
            jQuery( colpkr ).fadeOut( 200 );
            return false;
          },
    onChange: function (hsb, hex, rgb) {
      jQuery(target).children( 'div' ).css('backgroundColor', '#' + hex);
      jQuery(target).next('input').attr('value','#' + hex);
    }
  });

});

jQuery('.upload_button').click(function() {
    jQuery(this).parent().addClass("active_upload");

    //type = image,audio,video,file. If we write it wrong, nothing will appear. type = file by default
    // El tipo no importa, ya que desde hace algunas versiones, el uploader puede subir cualquier tipo de archivo

    // Si no lo hacemos desde un meta box dentro de un post y además WP_DEBUG = true, nos saldrá un error ya que
    // no estará asociado a ningún post

    //tb_show(caption, url, imageGroup)
    // Google: 'ImageGroup tb_show thickbox':
    //The optional imageGroup parameter can also be used to pass in an array of images for a single or multiple image slide show gallery.
    // The problem is that inserting a gallery needs an associated post to work
    tb_show('Upload a logo', 'media-upload.php?referer=wptuts-settings&amp;type=image&amp;TB_iframe=true&amp;post_id=0', false);
    return false;
  });

  jQuery('.image_delete_btn').click(function() {
    jQuery(this).parent().fadeOut('normal');
    var delete_uploaded_img = jQuery(this).attr('rel');
    jQuery('#'+delete_uploaded_img).val("");
  });

  window.send_to_editor = function(html) {
    // html returns a link like this:
    // <a href="{server_uploaded_image_url}"><img src="{server_uploaded_image_url}" alt="" title="" width="" height"" class="alignzone size-full wp-image-125" /></a>
    var image_url = jQuery('img',html).attr('src');
    jQuery('.active_upload').find('.uploaded_img_url').val(image_url);
    var target_preview = jQuery('.active_upload').find('.uploaded_img_url').attr('id');
    tb_remove();
    jQuery('#'+target_preview+'_preview').children('.uploaded_img_preview').attr('src',image_url);
    jQuery('.active_upload').removeClass('active_upload');
    jQuery('#submit_options_form').trigger('click');

  }

});
