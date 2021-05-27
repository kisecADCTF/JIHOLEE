<html>
    <head>
        <title>Stored XSS Testing</title>
    </head>
    <body>
        <form action="" method="POST" >
            <input type="text" name="text" />
            <input type="submit" name="submit" "/>
        </form>
    </body>

</html>
<?php
    $file_path = './stored.txt';
    $fp = fopen($file_path, 'r');
    readfile($file_path);
    if(isset($_POST['text']))
    {
        /*
        if(preg_match('/<script>/', $_POST['text']))
        {
            echo "XSS FAIL";
            exit;
        }
        */
        $fp = fopen($file_path, 'w');
        flock($fp, LOCK_EX);
        fwrite($fp, $_POST['text']  .chr(13).chr(10), strlen($_POST['text']));
        flock($fp, LOCK_UN);
        fclose($fp);
        header("Refresh:0");
    }