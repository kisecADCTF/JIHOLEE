<?php
    setcookie('user','nomal',time()+60*60*24);
    if($_COOKIE['user'] == 'admin')
        echo "you are admin";
    else
        echo "you are not admin to be admin!";
?>
