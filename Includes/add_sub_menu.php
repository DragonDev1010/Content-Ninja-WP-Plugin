<?php
    function add_sub_menu() {
        add_submenu_page(
            'content_guardian',     // Parent menu slug
            'Overview',             // Page title
            'Overview',             // Menu title
            'manage_options',       // Capability required to access the submenu page
            'content_guardian_overview',    // Menu slug
            'content_guardian_render_overview'   // Callback function to render the submenu page
        );
    
        add_submenu_page(
            'content_guardian',
            'Checker',
            'Checker',
            'manage_options',
            'content_guardian_checker',
            'content_guardian_render_checker'
        );
    
        add_submenu_page(
            'content_guardian',
            'History',
            'History',
            'manage_options',
            'content_guardian_history',
            'content_guardian_render_history'
        );
    
        add_submenu_page(
            'content_guardian',
            'Settings',
            'Settings',
            'manage_options',
            'content_guardian_settings',
            'content_guardian_render_settings'
        );
    
        remove_submenu_page('content_guardian', 'content_guardian');
    }