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

add_action('admin_enqueue_scripts', 'enqueue_styles');

add_action('wp_enqueue_scripts', 'enqueue_scripts');

add_action('admin_enqueue_scripts', 'enqueue_scripts');

add_action('add_meta_boxes', 'add_meta_box_option');

add_action('admin_bar_menu', 'add_menu_bar', 999);

// Add the top-level menu page
add_action('admin_menu', 'add_menu');

// Add the submenus
add_action('admin_menu', 'add_sub_menu');
