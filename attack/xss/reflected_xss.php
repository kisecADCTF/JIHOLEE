<html>
    <head><title>Reflected XSS</title></head>
    <body>
        <form action="" method="GET">
            <input type="text" name="text" />
            <input type="submit" name="submit" />
        </form>
    </body>
</html>
<?php

    $text = $_GET['text'];

    echo $text;

?>