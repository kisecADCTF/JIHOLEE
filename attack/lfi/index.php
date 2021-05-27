<?php
$page = $_GET['page'];

if($page == ''){
    $page = 'main.php';
}

echo "include => " . $page;
echo "<br>";

include $page;
//v29fhasa21dvd/shell.php
?>
