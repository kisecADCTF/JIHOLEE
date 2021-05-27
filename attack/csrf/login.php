
<html>
    <head><title>CSRF - LOGIN</title></head>
    <body>
        <h1>CSRF - LOGIN</h1>
        <form action="" method="POST" >
            ID : <input type="text" name="id" id="id" />
            <br/>
            PASSWORD : <input type="password" name="pwd" id="pwd" />
            <br/>
            <input type="submit" name="submit" value="LOGIN" />
        </form>
        <form action="regist.php">
            <input type="submit" value="registry" />
        </form>
    </body>
</html>
<?php
include("../dbconnect.php");
if(isset($_POST['id']))
{
    $id = $_POST['id'];
    $id = addslashes($id);
    $pwd = $_POST['pwd'];
    $sql = "SELECT * FROM user WHERE id ='$id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($result = mysqli_fetch_array($result))
    {
        if($result['pwd'] == $pwd){
            session_start();
            $_SESSION = $result;
            header('location:list.php');
        }
        else
            echo <<< EOT
        <script>
            alert("Wrong user or password.");
            window.history.go(-1);
        </script>
EOT;
    }
    else

        echo <<< EOT
        <script>
            alert("Wrong user or password.");
            window.history.go(-1);
        </script>
EOT;
}
