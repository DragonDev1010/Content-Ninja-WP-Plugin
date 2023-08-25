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
        'div',
        {
          className: 'roboto-7-13-17',
          style: {
            display: 'flex'
          }
        },
        [
          el(
            'p',
            {
              style: {
                color: '#999999'
              }
            },
            "GPT"
          ),
          el(
            'p',
            {
              style: {
                color: '#50a0ff'
              }
            },
            "Zero"
          )
        ]
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