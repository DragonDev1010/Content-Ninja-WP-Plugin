var el = wp.element.createElement;
var Panel = wp.components.Panel
var PanelBody = wp.components.PanelBody
var PanelRow = wp.components.PanelRow

var gpt_zero_PanelRow = el(
  'div',
  null,
  'gpt_zero_panel'
)

var gpt_zero_Panel = el(
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
        'GPT Zero'
      ),
      initialOpen: false
    },
    el(
      PanelRow,
      null,
      gpt_zero_PanelRow
    )
  )
)