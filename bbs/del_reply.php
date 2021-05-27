<?php

include('../utils/constants.php');
include('../utils/connect.php');
include('../utils/general.php');

$reply_ID = $_GET['reply_ID'];
$reply_ID = addslashes($reply_ID);
$query = "SELECT * FROM post_reply WHERE reply_ID = '$reply_ID'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$result = mysqli_fetch_array($result);
$post_ID = $result['post_ID'];
$author_ID = $result['user_ID'];
$user_ID = $_SESSION['user_ID'];
$board_ID = GetBoardID($post_ID);
$permission = GetPermission($user_ID, $board_ID);
if (($permission < PERM_MODERATOR) and ($user_ID != $author_ID))
	exit('Not enough permission.');
	
$query = "DELETE FROM post_reply WHERE reply_ID = '$reply_ID'";
mysqli_query($conn, $query) or die(mysqli_error($conn));

$last_page = $_SERVER["HTTP_REFERER"];
header("location:$last_page");
?>
