<?php
    // Add "Content Guardian" menu item to the admin bar
    // function add_content_guardian_menu_bar_item($wp_admin_bar) {
    function add_menu_bar($wp_admin_bar) {
        // Add the main menu item with a dropdown
        $args = array(
            'id'    => 'content-guardian',
            'title' => 'Content Guardian',
            'href'  => '#',
            'meta'  => array(
                'class' => 'content-guardian-menu-item',
            ),
        );
        $wp_admin_bar->add_node($args);

        // Add the dropdown box with "Check Content" button
        $args = array(
            'id'     => 'content-guardian-dropdown',
            'parent' => 'content-guardian',
            'title'  => '<button class="button button-primary" id="content-guardian-admin-menu-bar-check-content-btn">Check Content</button>',
        );
        $wp_admin_bar->add_node($args);
    }