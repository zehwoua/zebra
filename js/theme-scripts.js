jQuery(document).ready(function(){
  // Check whether the theme has a header menu
  if(jQuery('#header_navigation').length > 0){
    // Fetch all the submenus
    jQuery('.sub-menu').each(function(){
      var child = jQuery(this);
      var parent = child.parent();
      var position_y = parent.height();
      jQuery(this).css('top',position_y);
      parent.hover(function(){
        child.slideDown('fast');
      },function(){
        child.hide();
      });
    });
  }
});
