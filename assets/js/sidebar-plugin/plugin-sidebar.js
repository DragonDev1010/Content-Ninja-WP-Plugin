( function ( wp ) {
  var registerPlugin = wp.plugins.registerPlugin;
  var PluginSidebar = wp.editPost.PluginSidebar;
  var el = wp.element.createElement;
  var TabPanel = wp.components.TabPanel
  var Panel = wp.components.Panel
  var PanelBody = wp.components.PanelBody
  var PanelRow = wp.components.PanelRow
  var Button = wp.components.Button
  
  var moreIcon = el(
    "div",
    null,
    el(
      "p",
      null,
      "X%"
    )
  )

  var contentGuardianPanelRow = el(
    'div',
    null,
    [
      el(
        'p',
        null,
        "Check Results"
      ),
      el(
        'p',
        null,
        "Checked on Jun 06 2023 - 08:55 AM by Heeyoun Hong"
      ),
      el(
        'p',
        null,
        "Total words: 682"
      )
    ]
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
        contentGuardianPanelRow
      ),
      el(
        Button,
        {
          variant: "primary"
        },
        "Hightlighted AI Sentence"
      )
    )
  )

  var originalityAiPanelRow = el(
    'div',
    null,
    'originalityAiPanelRow'
  )

  var originalityAiPanel = el(
    Panel,
    null,
    el(
      PanelBody,
      {
        title: "Originality.ai",
        initialOpen: false
      },
      el(
        PanelRow,
        null,
        originalityAiPanelRow
      )
    )
  )

  var copyLeaksPanelRow = el(
    'div',
    null,
    'copyLeaksPanelRow'
  )

  var copyLeaksPanel = el(
    Panel,
    null,
    el(
      PanelBody,
      {
        title: "COPYLEAKS",
        initialOpen: false
      },
      el(
        PanelRow,
        null,
        copyLeaksPanelRow
      )
    )
  )

  var openAi_3_5_PanelRow = el(
    'div',
    null,
    'openAi_3_5_PanelRow'
  )

  var openAi_3_5_Panel = el(
    Panel,
    null,
    el(
      PanelBody,
      {
        title: "OpenAI ChatGPT 3.5",
        initialOpen: false
      },
      el(
        PanelRow,
        null,
        openAi_3_5_PanelRow
      )
    )
  )

  var openAi_4_PanelRow = el(
    'div',
    null,
    'openAi_4_PanelRow'
  )

  var openAi_4_Panel = el(
    Panel,
    null,
    el(
      PanelBody,
      {
        title: "OpenAI ChatGPT 4",
        initialOpen: false
      },
      el(
        PanelRow,
        null,
        openAi_4_PanelRow
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
      return [
        contentGuardianPanel, 
        originalityAiPanel, 
        copyLeaksPanel, 
        openAi_3_5_Panel, 
        openAi_4_Panel
      ]
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