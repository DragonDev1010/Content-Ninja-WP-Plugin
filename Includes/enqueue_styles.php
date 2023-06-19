<?php
    function enqueue_styles() {
        wp_enqueue_style('content-guardian-styles', plugin_dir_url(__FILE__) . '../assets/css/styles.css');
    }