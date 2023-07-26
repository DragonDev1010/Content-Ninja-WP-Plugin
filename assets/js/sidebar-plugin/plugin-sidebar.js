( function ( wp ) {
  var registerPlugin = wp.plugins.registerPlugin;
  var PluginSidebar = wp.editPost.PluginSidebar;
  var el = wp.element.createElement;

  registerPlugin( 'content-guardian-plugin-sidebar', {
      icon: 'admin-post',
      render: function () {
          return el(
              PluginSidebar,
              {
                  name: 'content-guardian-plugin-sidebar',
                  // icon: 'admin-post',
                  title: 'Content Guardian',
              },
              'Meta field'
          );
      },
  } );
  
} )( window.wp );