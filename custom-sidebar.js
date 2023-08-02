// Example custom plugin JavaScript file (custom-sidebar-plugin.js)

(function (wp) {
  const { registerPlugin } = wp.plugins;
  const { PluginSidebar, PluginSidebarMoreMenuItem } = wp.editPost;
  const { createElement } = wp.element;
  
  const CustomSidebarPlugin = () => {
    return createElement(
      PluginSidebarMoreMenuItem,
      {
        target: 'custom-sidebar',
      },
      createElement('div', { className: 'my-custom-content' },
        createElement('p', null, 'This is a custom sidebar added via registerPlugin()'),
        createElement('p', null, 'Dynamic Value: 100%') // Replace '100%' with your dynamic value variable
      ),
      'Custom Sidebar sdf'
    );
  };

  const CustomSidebarContent = () => {
    return createElement(
      PluginSidebar,
      {
        name: 'custom-sidebar',
        title: 'Custom Sidebar',
      },
      // Add your custom content here
      createElement('p', null, 'This is a custom sidebar added via registerPlugin()')
    );
  };

  registerPlugin('custom-sidebar', { render: CustomSidebarPlugin });
  registerPlugin('custom-sidebar-content', { render: CustomSidebarContent });
})(window.wp);
