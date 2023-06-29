<?php
    ob_start();
?>
    <p>this is overview page.</p>
<?php
    $html = ob_get_clean();
    echo $html;
?>