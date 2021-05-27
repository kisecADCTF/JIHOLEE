<a href="?view-source">view-source</a>
<?php

if(isset($_GET['view-source'])){
    show_source(__FILE__);
}
$str = "";
include "preg_match_flag.php";
extract($_REQUEST);
if(preg_match("/^.*admin.*$/is", $str)){
    echo "<script>alert('You can\'t login whith admin');</script>";
}
else{
    if(substr($str,0,5) === "admin")
        echo $flag;
    else
        echo "<script>alert('Hello $str');</script>";
}
?>
<form action="" method="POST">
    <input type="text" name="str" id="str" placeholder="Input your name">
    <input type="submit" id="submit" value="Log in">
</form> 