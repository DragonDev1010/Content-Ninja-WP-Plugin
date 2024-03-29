var el = wp.element.createElement;
var Panel = wp.components.Panel
var PanelBody = wp.components.PanelBody
var PanelRow = wp.components.PanelRow

var sapling_PanelRow = el(
  'div',
  null,
  'sapling_panel'
)

var sapling_Panel = el(
  Panel,
  null,
  el(
    PanelBody,
    {
      title: el(
        'p',
        {
          className: 'roboto-7-13-17'
        },
        'Sapling'
      ),
      initialOpen: false
    },
    el(
      PanelRow,
      null,
      sapling_PanelRow
    )
  )
)