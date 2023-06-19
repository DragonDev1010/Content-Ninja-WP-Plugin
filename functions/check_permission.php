<?php
    function check_permission() {
        $enabled_types = get_option('selected_post_types');
        $current_type = get_post_type();

        if(
            $enabled_types && 
            is_array($enabled_types) && 
            in_array($current_type, $enabled_types) &&
            current_user_can('edit_posts')
        ) {
            return true;
        } else {
            return false;
        }
    }