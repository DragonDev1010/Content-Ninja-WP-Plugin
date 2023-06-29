<?php
    function content_guardian_render_settings() {
        // Retrieve the saved post type options from wp_options
        $saved_post_types = get_option('selected_post_types', array());

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the checked post types from the submitted form
            $checked_post_types = isset($_POST['post_types']) ? $_POST['post_types'] : array();

            // Save the checked post types to wp_options
            update_option('selected_post_types', $checked_post_types);

            echo 'Settings saved successfully!';
        }
        
        $post_types = get_post_types(array('public' => true), 'objects');
        
        ob_start();
        include(__DIR__.'/setting.html.php');
        $output = ob_get_clean();
        echo $output;
    }