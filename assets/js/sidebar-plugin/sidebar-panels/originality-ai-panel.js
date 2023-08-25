var el = wp.element.createElement;
var Panel = wp.components.Panel
var PanelBody = wp.components.PanelBody
var PanelRow = wp.components.PanelRow

var originalityAiPanelRow = el(
  'div',
  {
    style: {
      position: 'relative'
    }
  },
  [
    el(
      'canvas',
      {
        id: 'ai-probability-chart-1',
        style: {
          width: '100%'
        }
      }
    ),
    el(
      'div',
      {
        style: {
          position: 'absolute',
          top: '50%',
          left: '50%',
          transform: 'translate(-50%, -50%)',
          margin: 0,
          textAlign: 'center',
        }
      },
      [
        el(
          'p',
          {
            className: 'roboto-8-30-34'
          },
          "25%"
        ),
        el(
          'p',
          {
            className: 'roboto-5-12-16'
          },
          "AI probability"
        )
      ]
    )
  ]
)

var originalityAiPanel = el(
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
        "Originality.ai"
      ),
      initialOpen: false
    },
    el(
      PanelRow,
      null,
      originalityAiPanelRow
    )
  )
)