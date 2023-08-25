var el = wp.element.createElement;
var Panel = wp.components.Panel
var PanelBody = wp.components.PanelBody
var PanelRow = wp.components.PanelRow
var Button = wp.components.Button
var Icon = wp.components.Icon

var checkDate = 'Jun 06 2023 - 08:55 AM '
var checker = 'Heeyoun Hong'
var totalWords = 682
var amount_ai_sentences = 35

var contentGuardianPanelRow = el(
  'div',
  null,
  [
    el(
      'p',
      {
        className: 'roboto-7-13-17',
        style: {
          marginBottom: 10
        }
      },
      "Check Results"
    ),
    el(
      'p',
      {
        className: 'roboto-4-12-17 color-757575'
      },
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
        {
          className: "primary-btn roboto-5-13-17",
          style: {
            marginBottom: 7
          }
        },
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
          justifyContent: 'space-around',
          marginBottom: 10
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
          {
            className: 'roboto-4-12-17',
            style: {
              display: 'flex',
              alignItems: 'center'
            }
          },
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
                id: 'ai-probability-chart',
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
                className: 'roboto-5-13-17'
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
              color: 'white',
              margin: '7px 0'
            }
          },
          amount_ai_sentences
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
          el(
            'div',
            {
              className: 'roboto-7-13-17'
            },
            [
              el(
                Icon,
                {
                  icon: 'saved'
                },
              ),
              "Hightlighted AI Sentence"
            ]
          )
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
      title: el(
        'div',
        {
          className: 'roboto-7-13-17',
          style: {
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'center',
            columnGap: 10
          }
        },
        [
          el(
            'img',
            {src: '/dino/wp-content/plugins/Content-Guardian/assets/images/cg-logo.png'}
          ),
          el(
            'p',
            {
              className: 'roboto-7-13-17',
            },
            "Content Guardian"
          )
        ]
      ),
      initialOpen: true
    },
    el(
      PanelRow,
      null,
      contentGuardianPanelRow
    )
  )
)