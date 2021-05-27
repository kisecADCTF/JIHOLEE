<html>
    <head><title>CSRF - post</title></head>
    <body>
        <h1>CSRF - post</h1>
        <form action="" method="POST">
            <input type="text" name="title" width="100%" />
            <br/>
            <textarea name="content"></textarea>
            <br/>
            <input type="submit" name="submit" value="post" />
        </form>
    </body>
</html>
<?php

if(isset($_POST['title'])) {
    include ("../dbconnect.php");
    session_start();
    $id = $_SESSION['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    echo $id. $title. $content;

    $sql = "INSERT INTO board ( id, title, content)";
    $sql .= "VALUES ('$id', '$title', '$content')";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    header("location:list.php");
}