jQuery(document).ready(function($){
  $(".zebras_toggle").each( function () {
    if($(this).attr('data') == 'close') {
      $(this).accordion({ header: '.zebras_toggle_title', collapsible: true, active: false  });
    } else {
      $(this).accordion({ header: '.zebras_toggle_title', collapsible: true});
    }
  });
});
