<?php
    require_once __DIR__.'/../functions/check_permission.php';

    function add_meta_box_option() {
        $permission_result = check_permission();
        if($permission_result) {
          // Render the Content Guardian metabox
          function render_content_guardian_metabox($post) {
              // Output the button with a label "Check Content"
              echo '<button type="button" id="editor-setting-check-content-button" class="button button-primary">Check Content</button>';
          }
          
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
    