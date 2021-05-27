<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$setcolor = 'black';
if(isset($_GET['color']))
    $color = $_GET['color'];
include($color.'.php');
?>
<html>
<body style="background: <?=$setcolor?>;">
<form action='' method='get'>
    <select name='color'>
        <option value='red'>red</option>
        <option value='blue'>blue</option>
        <option value='green'>green</option>
        <option value='white'>white</option>
    </select>
    <br>
    <input type='submit'>
</form>
<h2 style="color: <?=$setcolor?>;">
    Find the key file!
</h2>
</body>
</html>