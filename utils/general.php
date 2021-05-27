<?php

session_start();
if (!isset($_SESSION['user_ID']))
	exit("Illegal call to this page.");

function ShowUser()
{
	$username = $_SESSION['username'];
	echo("Identity: $username");
}

function ShowUserManagement($permission)
{
	if ($permission >= PERM_MODERATOR)
		echo("<a href=\"../user/manage.php\">Manage</a>");
}

function GetPermission($user_ID, $board_ID)
{
	include('connect.php');
	$query = "SELECT permission FROM rule WHERE (user_ID = '$user_ID' AND board_ID = '$board_ID')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	$permission = 0;
	if(empty($result)){
		$permission = mysqli_fetch_array($result)['permission'];
		if (!empty($permission))
			$permission = $_SESSION['default_permission'];
	} else {
		$permission = $_SESSION['default_permission'];
	}

	return $permission;
}



function GetBoardID($post_ID)
{
	include('connect.php');
	$query = "SELECT board_ID FROM post WHERE post_ID = '$post_ID'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	return mysqli_fetch_array($result)['board_ID'];
}

function GetBoard_name($board_ID)
{
	include('connect.php');
	$query = "SELECT board_name FROM board WHERE board_ID = '$board_ID'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	return mysqli_fetch_array($result)['board_name'];
}

function GetUsername($user_ID)
{
	include('connect.php');
	$query = "SELECT username FROM user WHERE user_ID = '$user_ID'";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	return mysqli_fetch_array($result)['username'];
}

?>
