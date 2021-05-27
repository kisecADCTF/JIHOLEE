<?php

if(isset($_GET['no']))
{
    $no = $_GET['no'];
    include "../dbconnect.php";
    session_start();
    $sql = "SELECT * FROM board WHERE (no = '$no')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if($result = mysqli_fetch_array($result))
    {
        $writer = $result['id'];
        $title = $result['title'];
        $content = $result['content'];
        echo "<h2>Title: ". $title ."</h2>";
        echo "<h3>Writer:". $writer."</h3>";
        echo "<h4>Content: ". $content ."</h4><br/>";
    }

}
