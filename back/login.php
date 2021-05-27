<html>
    <head><title>Login</title></head>
    <body>
        <form actino="" method="POST">
            ID :<input type="text" name="id" /><br/>
            PASSWORD :<input type="password" name="pwd" /><br/>
            <input type="submit" name="submit" value="login" />
        </form>
    </body>
</html>
<?php

if(isset($_POST['id']))
{
    $id = $_POST['id'];
    $pwd = $_POST['pwd'];

    if(preg_match('/^[A-za-z0-9]{5,15}$/', $id))
    {
        if(preg_match('/^(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,20}/', $pwd))
        {
            echo "<script>alert('Success!')</script>";
        }
        else
        {
            echo "<script>alert('Fail!')</script>";
        }
    }
    else
    {
        echo "<script>alert('Fail!')</script>";
    }

}