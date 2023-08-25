var el = wp.element.createElement;
var Panel = wp.components.Panel
var PanelBody = wp.components.PanelBody
var PanelRow = wp.components.PanelRow
var Button = wp.components.Button

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
      title: el(
        'div',
        {
          className: 'roboto-7-13-17',
          style: {
            display: 'flex',
            columnGap: 5
          }
        },
        [
          el(
            'p',
            {
              style: {}
            },
            "OpenAI"
          ),
          el(
            'p',
            {
              style: {
                color: 'white',
                background: 'black'
              }
            },
            "ChatGPT 3.5"
          )
        ]
      ),
      initialOpen: false
    },
    el(
      PanelRow,
      null,
      openAi_3_5_PanelRow
    )
  )
)