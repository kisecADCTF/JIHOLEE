<html>
    <head><title>CSRF - registry</title></head>

    <body>
        <h1>CSRF - registry</h1>
        <form action="" method="POST" >
            ID: <input type="text" name="id" id="id" />
            PASSWORD : <input type="password" name="pwd" id="pwd" />
            <input type="submit" name="submit" />
        </form>
    </body>
</html>
<?php
include ("../dbconnect.php");
if(isset($_POST['id']))
{
    $id = $_POST['id'];
    $pwd = $_POST['pwd'];
    $sql = "INSERT INTO user (id, pwd)";
    $sql .= "VALUES ('$id', '$pwd')";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    header('location:login.php');
}