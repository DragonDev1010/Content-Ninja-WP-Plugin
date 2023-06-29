<?php
    ob_start();
?>
    <p>this is history page.</p>
<?php
    $html = ob_get_clean();
    echo $html;
?>