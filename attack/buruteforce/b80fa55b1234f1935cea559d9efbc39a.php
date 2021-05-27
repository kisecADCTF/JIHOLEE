<?php

    if(!$_POST['num']){
        echo"
            <title>String brute force</title>
            <form action='' method='POST'>
            <input type='text' name='num'>
            <input type='submit' name='submit' value='submit'>
            </form>
            ";
    }
    else{
        if($_POST['num'] == 'ADS')
            echo "Simple Brute force";
        else
            echo "FAIL";
    }

?>