<?php

    include("./include.php");
    require("./require.php");

    if(isset($_GET['a']) && isset($_GET['b']))
    {
        $a = $_GET['a'];
        $b = $_GET['b'];
        $c = sum($a, $b);
    }

    echo $str ."'s sum function";
    if(isset($_GET['submit']))
        printf("<br>%d + %d = %d", $a, $b, $c);
    else
    {
        ?>
        <form method="GET" action="" name="form" >
            <input type="text" name="a">
            <input type="text" name="b">
            <input type="submit" name="submit" value="submit">
        </form>
        <?php
    }?>
