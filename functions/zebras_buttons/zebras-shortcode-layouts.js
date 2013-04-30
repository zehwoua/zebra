(function() {
  tinymce.create('tinymce.plugins.layoutPlugin', {
    init : function(ed, url) {
      // Register commands
      ed.addCommand('mcelayout', function() {
        ed.windowManager.open({
          file : url + 'layout_popup.php', // file that contains HTML for our modal window
          width : 220 + parseInt(ed.getLang('layout.delta_width', 0)), // size of our window
          height : 240 + parseInt(ed.getLang('layout.delta_height', 0)), // size of our window
          inline : 1
        }, {
          plugin_url : url
        });
      });

      // Register buttons
      ed.addButton('zebras_layout', {title : 'Insert Layout', cmd : 'mcelayout', image: url + 'includes/images/shortcode_layout.gif' });
    },

    getInfo : function() {
      return {
        longname : 'Insert Button',
        author : 'Zebras themes',
        authorurl : 'http://zebrasweb.com/',
        infourl : 'http://zebrasweb.com/',
        version : tinymce.majorVersion + "." + tinymce.minorVersion
      };
    }
  });

  // Register plugin
  // first parameter is the button ID and must match ID elsewhere
  // second parameter must match the first parameter of the tinymce.create() function above
  tinymce.PluginManager.add('zebras_layout', tinymce.plugins.layoutPlugin);

})();
