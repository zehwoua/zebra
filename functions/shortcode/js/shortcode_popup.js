
// resize TB

jQuery(document).ready(function($){

  var zebras = {
    load: function(){
      var zebras = this;
      zebras.resize_Popup();
      $(window).resize(function() { zebras.resize_Popup() });
      if($('#columns').length > 0 ){
        zebras.column();
      }else{
        zebras.insert();
      }
    },
    column: function(){
      $("#columns #columns_shortcode_column_layout").change(function(){
      // clear variables whenever main column layout changes
      column_layout = "";
      column_text = "";
      // assign main selectors to short variables
      add_button = $('#add-column-button');
      show_area = $('#show-columns');
      // hide sub selector whenever main layout changes
      $('.select_hidden_display').fadeOut();
      add_button.hide();
      // empty show area whenever main layout changes
      show_area.find('.show-inner').empty();
      // gets the value of selected layout
      column_layout = main_column_value();

      // show sub column options when main column layout is selected
      $('#'+column_layout).fadeIn(function(){
        show_area.fadeIn();
        add_button.fadeIn();
      });
      });
      var id = 0;
      function add_column(cl,scl,ct){
      //total column size in the display box
      number_of_c = 0;
      // get the number of max column size in display box
      max_number_of_c = get_column_layout(cl);
      // get the selected column's size
      c_size = get_column_size(scl);

      //check the size of exist columns in the box
      $('.show-inner').find('.size').each(function(){
        number_of_c += parseInt($(this).attr('rel'));
      });
      // if the existing size is smaller than max size add column

      if((number_of_c < max_number_of_c) && (number_of_c + parseInt(c_size) <= max_number_of_c)){
        id++;
        // check whether it is the last column
        if(number_of_c + parseInt(c_size) == max_number_of_c){
          //add columns with last size
          $('.show-inner').append('<div class="column-show size '+scl+' last-size" rel="'+c_size+'" id="c'+id+'"><div class="column-show-gradient"><span class="column_type_name">'+ct+'</span><p class="add_column_content clickable">Add Content</p><span class="column_delete"></span></div></div>');
        }else{
          //add column
          $('.show-inner').append('<div class="column-show size '+scl+'" rel="'+c_size+'" id="c'+id+'"><div class="column-show-gradient"><span class="column_type_name">'+ct+'</span><p class="add_column_content clickable">Add Content</p><span class="column_delete"></span></div></div>');
        }
      }else{
          shortcode_show_error("You cannot add anymore columns");
        }
      }

      function main_column_value(){
      // get value of main selected area
      return column_layout = $("#columns_shortcode_column_layout option:selected").val();
      }

      $('#insert').click(function(){
        if($('#show-columns').find('.last-size').length == 0){
          shortcode_show_error("Please select more columns");
        }else{
          output = '';
          column_layout = main_column_value();
          $('#show-columns').find('.size').each(function(){
            size = get_column_size($(this).attr('rel'));
            column_content = $(this).attr('id');
            column_content_value = '';
            if($('.'+ column_content).length > 0){
              column_content_value = $('.'+ column_content).val();
            }
            if($(this).hasClass('last-size')){
              output += '[col-'+ column_layout +'-'+ size +'-last]'+column_content_value+'[/col-'+ column_layout +'-'+ size +'-last]';
            }else{
              output += '[col-'+ column_layout +'-'+ size +']'+column_content_value+'[/col-'+ column_layout +'-'+ size +']';
            }
          });
          window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, output);
          tb_remove();
          $('.zebras_shortcode_name').empty();
        }
      });

      function shortcode_show_error(message){
        // show you cannot add any column error mesage
        $('#transparent').show().delay(1000).fadeOut(400);
        $('.shortcode_error').append(message).show().delay(1000).fadeOut(400,function(){
          $(this).empty();
        });
      }

      function get_column_layout(cl){
      switch(cl){
        case "size-two":
          max_number_of_c = 2;
        break;
        case "size-three":
          max_number_of_c = 3;
        break;
        case "size-four":
          max_number_of_c = 4;
        break;
      }
      return max_number_of_c;
      }
      function get_column_size(scl){
        switch(scl){
          case "size-two":
            c_size = 1;
          break;
          case "size-three":
            c_size = 1;
          break;
          case "size-four":
            c_size = 1;
          break;
          case "size-three-two":
            c_size = 2;
          break;
          case "size-four-two":
            c_size = 2;
          break;
          case "size-four-three":
            c_size = 3;
          break;
          case "1":
            c_size = 'one';
          break;
          case "2":
            c_size = 'two';
          break;
          case "3":
            c_size = 'three';
          break;
        }
      return c_size;
      }
    $('#add-column-button').click(function(){
      column_layout = main_column_value();
      column_text = $('#'+column_layout).find("option:selected").text();
      selected_column_layout = $('#'+column_layout).find("option:selected").val();
      add_column(column_layout,selected_column_layout, column_text);

      // this function removes the blocks when delete button is clicked
      $('.column_delete').click(function(){
        $(this).parents('.column-show').fadeOut(function(){
          // look if there is any last-size element after deleting block
          if($(this).parent().find('.last-size').length > 0){
            $(this).parent().find('.last-size').each(function(){
              $(this).removeClass('last-size');
            });
          }// end of if
          remove_content = $(this).attr('id');
          $('.'+remove_content).parent().remove();
          $(this).remove();
        });// end of fadeout function
      }); // end of column delete click funtion
      check_content();
    }); // end of add column button click function


    function check_content(){
      $('.add_column_content').unbind().click(function(){
        if($(this).hasClass('not_clickable')){
          return false;
        }
        selected_column = $(this);
        content_id = $(this).parents('.column-show').attr('id');
        column_content = '<div class="zebras_shortcode_field shortcode_textarea_field clearfix"><label for ="'+content_id+'">Column Content :</label><p>Please enter the column content</p><textarea class="'+content_id+'"></textarea></div>';
        $(column_content).insertAfter('#show-columns');
        $(this).removeClass('clickable').addClass('not_clickable').text('Content Added');
      });
    }

    },
    insert: function(){
      $("#insert").click(function(e){
        shortcode_text_content = '';
        if(window.tinyMCE)
          {
          shortcode_id = $('.zebras_shortcode_name').attr("id");
          output = '['+ shortcode_id + ' ';
          $('.zebras_shortcode_field').each(function(){
            shortcode_field = $(this).attr('id');
            sc = shortcode_id + '_shortcode_' + shortcode_field;
            shortcode_value = $("#"+sc).val();
            if(shortcode_value != ''){
              if(shortcode_field != 'content'){
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
          $('.zebras_shortcode_name').empty();
        }
      });
    },
    resize_Popup: function(){
        var TB_content = $('#TB_ajaxContent'),
        TB_Window = $('#TB_window'),
        zebraPopup = $('#zebras_shortcode_popup');

            TB_Window.css({
                //height: zebraPopup.outerHeight() + 50,
                width: zebraPopup.outerWidth() + 40,
                marginLeft: -(zebraPopup.outerWidth()/2)
            });

      TB_content.css({
        paddingTop: '20px',
        paddingLeft: '20px',
        paddingRight: '20px',
        height: (TB_Window.outerHeight()-67),
        overflow: 'auto', // IMPORTANT
        width: zebraPopup.outerWidth()
      });

      $('#zebras_shortcode_popup').addClass('no_preview');
    }
  }
  // run
  $('#zebras_shortcode_popup').livequery( function() { zebras.load(); } );
});
