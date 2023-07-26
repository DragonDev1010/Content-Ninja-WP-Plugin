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
      'plugin-sidebar-js',
      plugins_url( '/assets/js/sidebar-plugin/plugin-sidebar.js', __FILE__ ),
      array( 'wp-plugins', 'wp-edit-post', 'wp-element' )
  );
}
add_action( 'init', 'sidebar_plugin_register' );

function sidebar_plugin_script_enqueue() {
  wp_enqueue_script( 'plugin-sidebar-js' );
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
