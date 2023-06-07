(function (blocks, editor, i18n, element) {
  var el = element.createElement;
  var __ = i18n.__;

  blocks.registerBlockType('custom-block-plugin/custom-block', {
      title: __('Content Guardian', 'custom-block-plugin'),
      icon: 'admin-tools',
      category: 'common',
      edit: function (props) {
        return el('button', { className: 'custom-block' }, 'Check content');
      },
      save: function () {
          return el('button', { className: 'custom-block' }, 'Check content');
      },
  });
})(
  window.wp.blocks,
  window.wp.editor,
  window.wp.i18n,
  window.wp.element
);
