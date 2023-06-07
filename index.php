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