var el = wp.element.createElement;
var Panel = wp.components.Panel
var PanelBody = wp.components.PanelBody
var PanelRow = wp.components.PanelRow

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