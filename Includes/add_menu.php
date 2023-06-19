<?php
    // function content_guardian_add_menu_page() {
    function add_menu() {
      global $submenu;
      add_menu_page(
          'Content Guardian',     // Page title
          'Content Guardian',     // Menu title
          'manage_options',       // Capability required to access the menu page
          'content_guardian',     // Menu slug
          '',   // Callback function to render the menu page
          'dashicons-shield',     // Icon URL or dashicon class
          2                       // Position in the menu
      );
    }