<form action="" method="GET">
    <input type="text" name="pattern" placeholder="input find pattern">
    <input type="text" name="replace" placeholder="input change string">
    <input type="submit">
</form>
<a href="?view-source">view-source</a></br>
<?php

if(isset($_GET['view-source'])){
    show_source(__FILE__);
}
$string = "A Boy was given permission to put his hand into a pitcher to get some filberts. But he took such a great fistful that he could not draw his hand out again. There he stood, unwilling to give up a single filbert and yet unable to get them all out at once. Vexed and disappointed he began to cry. \"My boy,\" said his mother, \"be satisfied with half the nuts you have taken and you will easily get your hand out. Then perhaps you may have some more filberts some other time.\"Do not attempt too much at once.";
$pattern = "";
$replace = "";
if(isset($_REQUEST['pattern']))
    $pattern = $_REQUEST['pattern'];
if(isset($_REQUEST['replace']))
    $replace = $_REQUEST['replace'];

if($pattern == '' && $replace == '')
    echo $string;
else
    echo preg_replace($pattern,$replace,$string);

?>