<?php
/**
 * Plugin Name: Content Guardian
 * Description: Adds the Content Guardian option to the post settings bar.
 * Version: 1.0
 */

// Add the Content Guardian option to the settings bar
require_once __DIR__.'/Templates/Admin_menu/overview.php';
require_once __DIR__.'/Templates/Admin_menu/checker.php';
require_once __DIR__.'/Templates/Admin_menu/history.php';
require_once __DIR__.'/Templates/Admin_menu/setting.php';
require_once __DIR__.'/Includes/add_meta_box.php';
require_once __DIR__.'/Includes/add_menu_bar.php';
require_once __DIR__.'/Includes/add_menu.php';
require_once __DIR__.'/Includes/add_sub_menu.php';
require_once __DIR__.'/Includes/enqueue_styles.php';
require_once __DIR__.'/Includes/enqueue_scripts.php';

function sidebar_plugin_register() {
  wp_register_script(
      'ai-content-detector-panel-js',
      plugins_url( '/assets/js/sidebar-plugin/sidebar-panels/ai-content-detector-panel.js', __FILE__ )
  );
  wp_register_script(
      'originality-ai-panel-js',
      plugins_url( '/assets/js/sidebar-plugin/sidebar-panels/originality-ai-panel.js', __FILE__ )
  );
  wp_register_script(
      'content-guardian-panel-js',
      plugins_url( '/assets/js/sidebar-plugin/sidebar-panels/content-guardian-panel.js', __FILE__ )
  );
  wp_register_script(
      'copyleaks-panel-js',
      plugins_url( '/assets/js/sidebar-plugin/sidebar-panels/copyleaks-panel.js', __FILE__ )
  );
  wp_register_script(
      'gpt-zero-panel-js',
      plugins_url( '/assets/js/sidebar-plugin/sidebar-panels/gpt-zero-panel.js', __FILE__ )
  );
  wp_register_script(
      'openai-chat-gpt-3.5-panel-js',
      plugins_url( '/assets/js/sidebar-plugin/sidebar-panels/openai-chat-gpt-3.5-panel.js', __FILE__ )
  );
  wp_register_script(
      'openai-chat-gpt-4-panel-js',
      plugins_url( '/assets/js/sidebar-plugin/sidebar-panels/openai-chat-gpt-4-panel.js', __FILE__ )
  );
  wp_register_script(
      'sapling-panel-js',
      plugins_url( '/assets/js/sidebar-plugin/sidebar-panels/sapling-panel.js', __FILE__ )
  );
  wp_register_script(
      'plugin-sidebar-js',
      plugins_url( '/assets/js/sidebar-plugin/plugin-sidebar.js', __FILE__ ),
      array( 'wp-plugins', 'wp-edit-post', 'wp-element' )
  );
  wp_register_style(
    'plugin-sidebar-css',
    plugins_url( '/assets/css/sidebar-plugin/plugin-sidebar.css', __FILE__ )
  );
}
add_action( 'init', 'sidebar_plugin_register' );

function sidebar_plugin_script_enqueue() {
  wp_enqueue_script( 'ai-content-detector-panel-js' );
  wp_enqueue_script( 'content-guardian-panel-js' );
  wp_enqueue_script( 'copyleaks-panel-js' );
  wp_enqueue_script( 'gpt-zero-panel-js' );
  wp_enqueue_script( 'openai-chat-gpt-3.5-panel-js' );
  wp_enqueue_script( 'openai-chat-gpt-4-panel-js' );
  wp_enqueue_script( 'originality-ai-panel-js' );
  wp_enqueue_script( 'sapling-panel-js' );
  wp_enqueue_script( 'plugin-sidebar-js' );
  wp_enqueue_style( 'plugin-sidebar-css' );
}
add_action( 'enqueue_block_editor_assets', 'sidebar_plugin_script_enqueue' );

add_action('admin_enqueue_scripts', 'enqueue_styles');

add_action('wp_enqueue_scripts', 'enqueue_scripts');

add_action('admin_enqueue_scripts', 'enqueue_scripts');

add_action('add_meta_boxes', 'add_meta_box_option');

add_action('admin_bar_menu', 'add_menu_bar', 999);

// Add the top-level menu page
add_action('admin_menu', 'add_menu');

// Add the submenus
add_action('admin_menu', 'add_sub_menu');

// function add_font_family() {
//   wp_enqueue_style('google-roboto-fonts', plugin_dir_url(__FILE__).'/assets/roboto-font-family/Roboto-Black.ttf');
// }
// add_action('admin_enqueue_scripts', 'add_font_family');