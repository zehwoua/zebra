(function ()
{
  // create zillaShortcodes plugin
  tinyMCE.create("tinyMCE.plugins.zebraShortcodes",
  {
    init: function ( ed, url )
    {
      ed.addCommand("zebraPopup", function ( a, params )
      {
        var popup = params.identifier;
        // console.log (url);

        // load thickbox
        tb_show("Insert Zebras Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 600 );
      });
    },
    createControl: function ( btn, e )
    {
      if ( btn == "zebra_button" )
      {
        var a = this;

        var btn = e.createSplitButton('zebra_button', {
                    title: "Insert Zebras Shortcode",
          image: ZebrasShortcodesFolder.shortcodes_folder +"/images/shortcode_layout.gif",
          icons: false
                });

                btn.onRenderMenu.add(function (c, b)
        {
          a.addWithPopup( b, "Boxes", "box" );
          a.addWithPopup( b, "Buttons", "button" );
          a.addWithPopup( b, "Columns", "columns" );
          a.addWithPopup( b, "Tabs", "tabs" );
          a.addWithPopup( b, "Toggle", "toggle" );
          a.addWithPopup( b, "Dropcap","dropcap" );
          a.addImmediate( b, "Quote","quote" );
          a.addWithPopup( b, "Testimonial","testimonial" );
        });

                return btn;
      }

      return null;
    },
    addWithPopup: function ( ed, title, id ) {
      ed.add({
        title: title,
        onclick: function () {
          tinyMCE.activeEditor.execCommand("zebraPopup", false, {
            title: title,
            identifier: id
          })
        }
      })
    },
    addImmediate: function ( ed, title, sc) {
      ed.add({
        title: title,
        onclick: function () {

          selected_text = '';

              if ( tinyMCE.activeEditor.selection.getContent().length > 0 ) {

                selected_text = tinyMCE.activeEditor.selection.getContent();

              } // End IF Statement
              shortcode_content = '['+sc+']'+ selected_text +'[/'+sc+']';
          tinyMCE.activeEditor.execCommand( "mceInsertContent", false, shortcode_content )
        }
      })
    },
    getInfo: function () {
      return {
        longname: 'Zebras Shortcodes',
        author: 'Zebras Web',
        authorurl: 'http://zebrasweb.com',
        infourl: 'http://zebrasweb.com',
        version: "1.0"
      }
    }
  });

  // add zebrasShortcodes plugin
  tinyMCE.PluginManager.add("zebraShortcodes", tinyMCE.plugins.zebraShortcodes);
})();
