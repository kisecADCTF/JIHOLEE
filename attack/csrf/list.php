<html>
    <head><title>CSRF - list</title></head>
    <body>

    <?php
        include ("../dbconnect.php");
        session_start();
        $sql = "SELECT * FROM board";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($result))
        {
            echo "<a href=post_view.php?no=". $row['no'] .">". $row['title'] ."</a><br/>";
        }
    ?>
    <form action="./post.php" >
        <input type="submit" value="POST" />
    </form>
    </body>
</html>

