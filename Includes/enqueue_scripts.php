<?php
    function enqueue_scripts() {
        wp_enqueue_script('content-guardian-script', plugin_dir_url(__FILE__) . '../assets/js/script.js', array(), '1.0', true);
        $post_id = get_the_ID();
        wp_localize_script('content-guardian-script', 'contentGuardianScriptData', array(
            'postId' => $post_id
        ));
    }