<?php
    if(isset($_GET['get']))
        echo "GET :" .$_GET['get'] ."<br/>";
    if(isset($_POST['post']))
        echo "POST :" .$_POST['post'] ."<br/>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP GET&POST</title>
</head>
<body>
    <form method="GET" action="">
        GET Input: <input type="text" name="get">
        <input type="submit" value="전송">
    </form>
    <form method="POST" action="">
       POST Input: <input type="text" name="post">
        <input type="submit" value="전송">
    </form>
</body>
</html>