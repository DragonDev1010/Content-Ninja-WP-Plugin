( function ( wp ) {
  var registerPlugin = wp.plugins.registerPlugin;
  var PluginSidebar = wp.editPost.PluginSidebar;
  var el = wp.element.createElement;
  var TextControl = wp.components.TextControl;

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
              el(
                'div',
                { className: 'plugin-sidebar-content' },
                el( TextControl, {
                    label: 'Meta Block Field',
                    value: 'Initial value',
                    onChange: function ( content ) {
                        console.log( 'content changed to ', content );
                    },
                } )
              )
          );
      },
  } );
  
} )( window.wp );