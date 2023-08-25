var el = wp.element.createElement;
var Panel = wp.components.Panel
var PanelBody = wp.components.PanelBody
var PanelRow = wp.components.PanelRow

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
      title: el(
        'p',
        {
          className: 'roboto-7-13-17',
        },
        "COPYLEAKS"
      ),
      initialOpen: false
    },
    el(
      PanelRow,
      null,
      copyLeaksPanelRow
    )
  )
)