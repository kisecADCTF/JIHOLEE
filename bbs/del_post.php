<?php

include('../utils/constants.php');
include('../utils/connect.php');
include('../utils/general.php');

$post_ID = $_GET['post_ID'];
$post_ID = addslashes($post_ID);
$query = "SELECT * FROM post WHERE post_ID = '$post_ID'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$result = mysqli_fetch_array($result);
$board_ID = $result['board_ID'];
$author_ID = $result['user_ID'];
$user_ID = $_SESSION['user_ID'];
$permission = GetPermission($user_ID, $board_ID);
if (($permission < PERM_MODERATOR) and ($user_ID != $author_ID))
	exit('Not enough permission.');

$query = "DELETE FROM post_reply WHERE post_ID = '$post_ID'";
mysqli_query($conn, $query) or die(mysqli_error($conn));
	
$query = "DELETE FROM post WHERE post_ID = '$post_ID'";
mysqli_query($conn, $query) or die(mysqli_error($conn));

$last_page = $_SERVER["HTTP_REFERER"];
header("location:$last_page");
?>
