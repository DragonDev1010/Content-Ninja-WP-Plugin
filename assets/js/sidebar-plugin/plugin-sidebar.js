( function ( 
    wp, 
    contentGuardianPanel, 
    originalityAiPanel, 
    copyLeaksPanel, 
    openAi_3_5_Panel, 
    openAi_4_Panel, 
    sapling_Panel, 
    gpt_zero_Panel
  ) {
  var registerPlugin = wp.plugins.registerPlugin;
  var PluginSidebar = wp.editPost.PluginSidebar;
  var el = wp.element.createElement;
  var TabPanel = wp.components.TabPanel

  var contentGuardianPluginIcon = el(
    "div",
    {id: 'content-guardian-plugin-icon'},
    el(
      "p",
      null,
      "X%"
    )
  )

  var contentGuardianSidebarPanel = el(
    TabPanel,
    {
      className:"cgs-main-container",
      activeClass:"is-active",
      tabs: [
        {
          name: 'post',
          title: "Post",
          className: "roboto-7-13-17 color-1e1e1e"
        },
        {
          name: 'block',
          title: "Block",
          className: "roboto-7-13-17 color-1e1e1e"
        }
      ]
    },
    (function(e){
      return [
        contentGuardianPanel, 
        originalityAiPanel, 
        copyLeaksPanel, 
        openAi_3_5_Panel, 
        openAi_4_Panel,
        sapling_Panel,
        ai_content_detector_Panel,
        gpt_zero_Panel
      ]
    })
  )

  registerPlugin( 'content-guardian-plugin-sidebar', {
      icon: contentGuardianPluginIcon,
      render: function () {
          return el(
              PluginSidebar,
              {
                  name: 'content-guardian-plugin-sidebar',
                  title: 'Content Guardian',
              },
              contentGuardianSidebarPanel
          );
      },
  } );
} )( 
  window.wp, 
  contentGuardianPanel, 
  originalityAiPanel, 
  copyLeaksPanel, 
  openAi_3_5_Panel, 
  openAi_4_Panel, 
  sapling_Panel, 
  gpt_zero_Panel 
);