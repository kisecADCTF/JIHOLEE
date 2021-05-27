<?php

include('../utils/constants.php');
include('../utils/connect.php');
include('../utils/general.php');

if (!isset($_POST['submit']))
	exit('Illegal call to this page.');
if (!($_SESSION['default_permission'] >= PERM_ADMINISTRATOR))
	exit('Not enough permission.');

$board_name = $_POST['board_name'];
$board_name = addslashes($board_name);
$query = "INSERT INTO board(board_name) VALUES ('$board_name')";

mysqli_query($conn, $query) or die(mysqli_error($conn));
$last_page = $_SERVER["HTTP_REFERER"];
header("location:home.php");
?>
