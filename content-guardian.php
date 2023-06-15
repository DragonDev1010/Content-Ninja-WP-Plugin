<?php
/**
 * Plugin Name: Content Guardian
 * Description: Adds the Content Guardian option to the post settings bar.
 * Version: 1.0
 */

// Add the Content Guardian option to the settings bar
function content_guardian_enqueue_styles() {
  wp_enqueue_style('content-guardian-styles', plugin_dir_url(__FILE__) . 'assets/css/styles.css');
}
add_action('admin_enqueue_scripts', 'content_guardian_enqueue_styles');

function content_guardian_enqueue_scripts() {
  wp_enqueue_script('content-guardian-script', plugin_dir_url(__FILE__) . 'assets/js/script.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'content_guardian_enqueue_scripts');
add_action('admin_enqueue_scripts', 'content_guardian_enqueue_scripts');

function add_content_guardian_option() {
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
add_action('add_meta_boxes', 'add_content_guardian_option');

// Render the Content Guardian metabox
function render_content_guardian_metabox($post) {
  // Output the button with a label "Check Content"
  echo '<button type="button" id="editor-setting-check-content-button" class="button button-primary">Check Content</button>';

  // Add JavaScript code to handle the button click event
  ?>
  <script type="text/javascript">
      // document.addEventListener('DOMContentLoaded', function() {
      //     // Handle the click event of the "Check Content" button
      //     var checkContentButton = document.getElementById('check-content-button');
      //     checkContentButton.addEventListener('click', function() {
      //         // Get the content of the editor
      //         var editorContent = wp.data.select('core/editor').getEditedPostContent();

      //         // Make an AJAX request to send the content to the 3rd party API
      //         var xhr = new XMLHttpRequest();
      //         xhr.open('POST', 'http://localhost:3000/check-content', true);
      //         xhr.setRequestHeader('Content-Type', 'application/json');
      //         xhr.onreadystatechange = function() {
      //             if (xhr.readyState === XMLHttpRequest.DONE) {
      //                 if (xhr.status === 200) {
      //                     // Handle the API response here
      //                     console.log(xhr.responseText);
      //                 } else {
      //                     // Handle errors here
      //                     console.error(xhr.statusText);
      //                 }
      //             }
      //         };
      //         xhr.send(JSON.stringify({ content: editorContent }));
      //     });
      // });
  </script>
  <?php
}

// Add "Content Guardian" menu item to the admin bar
function add_content_guardian_menu_item($wp_admin_bar) {
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
add_action('admin_bar_menu', 'add_content_guardian_menu_item', 999);

function add_custom_js_to_post_page() {
  if (is_admin() && get_current_screen()->base === 'post') {
      echo '<script>
          function myCustomFun() {
              // Your custom function logic goes here
              console.log("Post Page Custom Function");
          }
      </script>';
  }
}
add_action('admin_footer', 'add_custom_js_to_post_page');
