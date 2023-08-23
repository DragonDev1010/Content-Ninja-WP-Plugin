var el = wp.element.createElement;
var Panel = wp.components.Panel
var PanelBody = wp.components.PanelBody
var PanelRow = wp.components.PanelRow
var Button = wp.components.Button
var Icon = wp.components.Icon

var checkDate = 'Jun 06 2023 - 08:55 AM '
var checker = 'Heeyoun Hong'
var totalWords = 682

var contentGuardianPanelRow = el(
  'div',
  null,
  [
    el(
      'p',
      {className: 'roboto-7-13-17'},
      "Check Results"
    ),
    el(
      'p',
      {className: 'roboto-4-12-17 color-757575'},
      [
        "Checked on ", 
        el(
          'span',
          {className: 'roboto-7-12-17'},
          checkDate
        ),
        "by ",
        el(
          'span',
          {className: 'roboto-7-12-17'},
          checker
        )
      ]
    ),
    el(
      'div',
      {
        style: {
          display: "inline-block"
        }
      },
      el(
        'p',
        {className: "primary-btn roboto-5-13-17"},
        [
          "Total words: ",
          totalWords
        ]
      )
    ),
    el(
      'div',
      {
        className: 'primary-btn',
        style: {
          width: '168px',
          display: 'flex',
          alignItems: 'center',
          justifyContent: 'space-around'
        }
      },
      [
        el(
          'div',
          { style: {
            display: 'flex',
            alignItems: 'center',
            columnGap: 10
          }},
          [
            el(
              'img',
              {
                src: '/dino/wp-content/plugins/Content-Guardian/assets/images/ai-part-icon.png'
              }
            ),
            "AI"
          ]
        ),
        el(
          'div',
          {style: {
            display: 'flex',
            alignItems: 'center',
            columnGap: 10
          }},
          [
            el(
              'img',
              {
                src: '/dino/wp-content/plugins/Content-Guardian/assets/images/human-part-icon.png'
              }
            ),
            "Human"
          ]
        )
      ]
    ),
    el(
      'div',
      {
        style: {
          padding: '16px 10px',
          backgroundColor: 'rgba(216, 214, 229, 0.6)',
          borderRadius: 7,
          display: 'flex',
          flexDirection: 'column',
          alignItems: 'center',
          justifyContent: 'center'
        }
      },
      [
        el(
          'img',
          {
            src: '/dino/wp-content/plugins/Content-Guardian/assets/images/pt-logo-small-black 2.png'
          },
        ),
        el(
          'p',
          {},
          [
            el(
              Icon,
              {
                icon: 'info'
              },
            ),
            "What is ",
            el(
              'a',
              {},
              "Content Guardian Score?"
            )
          ]
        ),
        el(
          'img',
          {
            src: '/dino/wp-content/plugins/Content-Guardian/assets/images/ai-probability-chart.png'
          }
        ),
        el(
          'div',
          {
            style: {
              display: 'flex',
              alignItems: 'center',
              justifyContent: 'space-between',
            }
          },
          [
            el(
              'img',
              {src: '/dino/wp-content/plugins/Content-Guardian/assets/images/bot-icon.png'},
            ),
            el(
              'p',
              {
                style: {
                  marginBottom: 0
                }
              },
              "Number of sentences likely to be AI:"
            )
          ]
        ),
        el(
          'p',
          {
            style: {
              padding: '6px 10px',
              backgroundColor: '#AC266B',
              borderRadius: 7,
              fontFamily: 'Roboto',
              fontWeight: 800,
              fontSize: 20,
            }
          },
          "35"
        ),
        el(
          Button,
          {
            style: {
              border: '2px solid #AC266B',
              borderRadius: 4,
              padding: '6px 16px',
              backgroundColor: 'transparent',
              color: '#AC266B'
            }
          },
          "Hightlighted AI Sentence"
        )
      ]
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
    )
  )
)