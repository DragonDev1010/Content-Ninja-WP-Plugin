<?php
    ob_start();
?>
    <div class="wrap">
        <h1>Content Guardian - Checker</h1>
        <form method="post" action="">
            <textarea name="content_checker" rows="5" cols="50"></textarea>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
<?php
    $html = ob_get_clean();
    echo $html;
?>