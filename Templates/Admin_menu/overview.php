<?php
  function content_guardian_render_overview() {
    ob_start();
    include(__DIR__.'/overview.html.php');
    $output = ob_get_clean();
    echo $output;
  }