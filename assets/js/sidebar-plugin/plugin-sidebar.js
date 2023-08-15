( function ( wp ) {
  var registerPlugin = wp.plugins.registerPlugin;
  var PluginSidebar = wp.editPost.PluginSidebar;
  var el = wp.element.createElement;
  var TabPanel = wp.components.TabPanel
  var Panel = wp.components.Panel
  var PanelBody = wp.components.PanelBody
  var PanelRow = wp.components.PanelRow
  
  var moreIcon = el(
    "div",
    null,
    el(
      "p",
      null,
      "X%"
    )
  )
  var contentGuardianPanel = el(
    Panel,
    null,
    el(
      PanelBody,
      {
        title: "Content Guardian",
        initialOpen: true
      },
      el(
        PanelRow,
        null,
        "My Panel Inputs and Labels"
      )
    )
  )
  var sidebarPanel = el(
    TabPanel,
    {
      className:"rank-math-editor-social",
      activeClass:"is-active",
      tabs: [
        {
          name: 'post',
          title: "Post",
          className: "post"
        },
        {
          name: 'block',
          title: "Block",
          className: "block"
        }
      ]
    },
    (function(e){
      return contentGuardianPanel
      })
  )

  registerPlugin( 'content-guardian-plugin-sidebar', {
      // icon: 'admin-post',
      icon: moreIcon,
      render: function () {
          return el(
              PluginSidebar,
              {
                  name: 'content-guardian-plugin-sidebar',
                  title: 'Content Guardian',
              },
              sidebarPanel
          );
      },
  } );
  
} )( window.wp );