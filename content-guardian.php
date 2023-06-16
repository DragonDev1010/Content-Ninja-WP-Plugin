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
  $post_id = get_the_ID();
  wp_localize_script('content-guardian-script', 'contentGuardianScriptData', array(
    'postId' => $post_id
  ));
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
}

// Add "Content Guardian" menu item to the admin bar
function add_content_guardian_menu_bar_item($wp_admin_bar) {
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
add_action('admin_bar_menu', 'add_content_guardian_menu_bar_item', 999);

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

// Add the top-level menu page
add_action('admin_menu', 'content_guardian_add_menu_page');
function content_guardian_add_menu_page() {
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

// Add the submenus
add_action('admin_menu', 'content_guardian_add_submenus');
function content_guardian_add_submenus() {
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

// Render the submenus
function content_guardian_render_overview() {}
function content_guardian_render_checker() {
?>
    <div class="wrap">
        <h1>Content Guardian - Checker</h1>
        <form method="post" action="">
            <textarea name="content_checker" rows="5" cols="50"></textarea>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
<?php    
}

function content_guardian_render_history() {}

function content_guardian_render_settings() {
    // Retrieve the saved post type options from wp_options
    $saved_post_types = get_option('my_plugin_post_types', array());

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the checked post types from the submitted form
        $checked_post_types = isset($_POST['post_types']) ? $_POST['post_types'] : array();

        // Save the checked post types to wp_options
        update_option('my_plugin_post_types', $checked_post_types);

        echo 'Settings saved successfully!';
    }
    
    $post_types = get_post_types(array('public' => true), 'objects');
?>
    <div class="wrap">
        <h1>Content Guardian - Settings</h1>
        <form method="post" action="">
            <?php wp_nonce_field('my_plugin_post_types_nonce', 'my_plugin_post_types_nonce'); ?>
            <h2>Select post types:</h2>
            <?php foreach ($post_types as $post_type) : ?>
                <label>
                    <input 
                        type="checkbox" 
                        name="post_types[]" 
                        value="<?php echo esc_attr($post_type->name); ?>" 
                        <?php checked(in_array($post_type->name, $saved_post_types)); ?>
                    >
                    <?php echo esc_html($post_type->label); ?>
                </label>
                <br>
            <?php endforeach; ?>
            <br>
            <input type="submit" class="button button-primary" value="Save Settings">
        </form>
    </div>
<?php    
}

