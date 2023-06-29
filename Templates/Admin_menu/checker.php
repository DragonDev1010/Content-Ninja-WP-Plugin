<?php
    function content_guardian_render_checker() {
        ob_start();
        include(__DIR__.'/checker.html.php');
        $output = ob_get_clean();
        echo $output;
    }
?>