var el = wp.element.createElement;
var Panel = wp.components.Panel
var PanelBody = wp.components.PanelBody
var PanelRow = wp.components.PanelRow

var ai_content_detector_PanelRow = el(
  'div',
  null,
  'ai_content_detector_panel'
)

var ai_content_detector_Panel = el(
  Panel,
  null,
  el(
    PanelBody,
    {
      title: el(
        'p',
        {
          style: {
            color: 'red'
          }
        },
        'AI Content Detector'
      ),
      initialOpen: false
    },
    el(
      PanelRow,
      null,
      ai_content_detector_PanelRow
    )
  )
)