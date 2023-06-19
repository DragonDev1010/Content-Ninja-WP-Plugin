<?php
    // function add_content_guardian_option() {
    function add_meta_box_option() {
        // Render the Content Guardian metabox
        function render_content_guardian_metabox($post) {
            // Output the button with a label "Check Content"
            echo '<button type="button" id="editor-setting-check-content-button" class="button button-primary">Check Content</button>';
        }
        
        // Make sure the user has the necessary capabilities to edit posts
        if (current_user_can('edit_posts')) {
            // Add a new metabox to the side of the post edit page
            add_meta_box(
                'content_guardian_metabox',
                'Content Guardian',
                'render_content_guardian_metabox',
                array('post', 'page'),
                'side',
                'high'
            );
        }
    }
    