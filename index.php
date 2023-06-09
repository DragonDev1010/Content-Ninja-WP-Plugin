<?php
/*
Plugin Name:  Content Ninja Plugin
Plugin URI:   https://www.wpbeginner.com 
Description:  A short little description of the plugin. It will be displayed on the Plugins page in WordPress admin area. 
Version:      1.0
Author:       Jackson
Author URI:   https://www.wpbeginner.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wpb-tutorial
Domain Path:  /languages
*/

function custom_block_enqueue_scripts() {
  // Enqueue your block's JavaScript file
  wp_enqueue_script(
      'custom-block-script',
      plugins_url('/assets/js/custom-block.js', __FILE__),
      array('wp-blocks', 'wp-editor'),
      '1.0',
      true
  );

  // Enqueue your block's CSS file
  wp_enqueue_style(
      'custom-block-style',
      plugins_url('/assets/css/custom-block.css', __FILE__),
      array('wp-edit-blocks'),
      '1.0'
  );
}
add_action('enqueue_block_editor_assets', 'custom_block_enqueue_scripts');

function custom_block_register_block() {
  // Register your block
  register_block_type('custom-block-plugin/custom-block', array(
      'editor_script' => 'custom-block-script',
      'editor_style' => 'custom-block-style',
  ));
}
add_action('init', 'custom_block_register_block');

function add_content_guardian_menu_bar_item ($wp_admin_bar) {
  $args = array (
    'id'        => 'content_guardian',
    'title'     => 'Content Guardian',
    'href'      => 'http://example.com/',
    // 'parent'    => 'new-content'
  );

  $wp_admin_bar->add_node( $args );
}

add_action('admin_bar_menu', 'add_content_guardian_menu_bar_item');

function add_content_guardian_sub_menu_bar_item ($wp_admin_bar) {
  $args = array (
    'id'        => 'check_content',
    'title'     => 'Check Content',
    'href'      => 'http://example.com/',
    'parent'    => 'content_guardian'
  );

  $wp_admin_bar->add_node( $args );
}

add_action('admin_bar_menu', 'add_content_guardian_sub_menu_bar_item', 20);
// add_action('wp_before_admin_bar_render', 'add_content_guardian_sub_menu_bar_item');

add_action('admin_menu', 'add_content_guardian_menu_item', 100);

function add_content_guardian_menu_item() {
  global $submenu;

  $menu_slug = "content_guardian"; // used as "key" in menus
  $menu_pos = 2; // whatever position you want your menu to appear

  // create the top level menu
  add_menu_page( 'Content Guardian', 'Content Guardian', 'read', $menu_slug, '', '', $menu_pos);
  // add the external links to the slug you used when adding the top level menu
  $submenu[$menu_slug][] = array('<div id="overview">Overview</div>', 'manage_options', '');
  $submenu[$menu_slug][] = array('<div id="checker">Checker</div>', 'manage_options', '');
  $submenu[$menu_slug][] = array('<div id="history">History</div>', 'manage_options', '');
  $submenu[$menu_slug][] = array('<div id="settings">Settings</div>', 'manage_options', '');
}