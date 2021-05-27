<?php

    if(!$_GET['num']){
        echo"
            <form action='' mehod='GET'>
            <input type='text' name='num'>
            <input type='submit' name='submit' value='submit'>
            </form>";
    } else{
        if((int)$_GET['num'] == 5368)
            echo "Next is b80fa55b1234f1935cea559d9efbc39a.php";
        else
            echo "FAIL";
    }
?>
