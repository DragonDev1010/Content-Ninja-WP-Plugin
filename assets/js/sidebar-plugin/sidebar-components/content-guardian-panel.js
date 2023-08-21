var el = wp.element.createElement;
var Panel = wp.components.Panel
var PanelBody = wp.components.PanelBody
var PanelRow = wp.components.PanelRow
var Button = wp.components.Button

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
          "Jun 06 2023 - 08:55 AM "
        ),
        "by ",
        el(
          'span',
          {className: 'roboto-7-12-17'},
          "Heeyoun Hong"
        )
      ]
    ),
    el(
      'p',
      {className: "primary-btn"},
      "Total words: 682"
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
    ),
    el(
      Button,
      {
        variant: "primary"
      },
      "Hightlighted AI Sentence"
    )
  )
)