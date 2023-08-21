var el = wp.element.createElement;
var Panel = wp.components.Panel
var PanelBody = wp.components.PanelBody
var PanelRow = wp.components.PanelRow

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