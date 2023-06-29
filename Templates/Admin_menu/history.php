<?php
    function content_guardian_render_history() {
        ob_start();
        include(__DIR__.'/history.html.php');
        $output = ob_get_clean();
        echo $output;
    }
