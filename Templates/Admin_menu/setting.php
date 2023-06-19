<?php
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