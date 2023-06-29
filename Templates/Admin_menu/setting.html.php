<?php
    ob_start();
?>
    <div class="wrap">
        <h1>Content Guardian - Settings</h1>
        <form method="post" action="">
            <?php wp_nonce_field('selected_post_types_nonce', 'selected_post_types_nonce'); ?>
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
    $html = ob_get_clean();
    echo $html;
?>