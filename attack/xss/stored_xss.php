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
    $patterns = "/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i";//특수문자목록
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
        /*
        if(preg_match('/</',$_POST['text']))
        {
            echo "XSS FAILED";
            exit;
        }
        */
        if(preg_match_all($patterns,$_POST['text']))
        {
            $string=preg_replace($patterns,"",$_POST['text']);//특수문자 치환
            echo $string;
            echo "<br> you can't use script";
            exit;
        }
        $fp = fopen($file_path, 'w');
        flock($fp, LOCK_EX);
        fwrite($fp, $_POST['text']  .chr(13).chr(10), strlen($_POST['text']));
        flock($fp, LOCK_UN);
        fclose($fp);
        header("Refresh:0");
    }