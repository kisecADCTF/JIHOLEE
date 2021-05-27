
<html>
    <head><title>SQL INJECTION - LOGIN</title></head>
    <body>
        <h1>SQL INJECTION - LOGIN</h1>
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
    $sql = "SELECT * FROM user WHERE (id ='$id' AND pwd='$pwd')";
    echo $sql ."<br/>";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($result = mysqli_fetch_array($result))
    {
        if(isset($result['pwd'])){
            echo <<< EOT
        <script>
            alert("SQL Injection success!");
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
    else

        echo <<< EOT
        <script>
            alert("Wrong user or password.");
            window.history.go(-1);
        </script>
EOT;
}
