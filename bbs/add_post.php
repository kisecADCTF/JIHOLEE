<?php



include('../utils/constants.php');
include('../utils/connect.php');
include('../utils/general.php');

if (!isset($_POST['submit']))
    exit('Illegal call to this page.');

$board_ID = $_POST['board_ID'];
$board_ID = addslashes($board_ID);
$user_ID = $_SESSION['user_ID'];
echo $board_ID;

$permission = GetPermission($user_ID, $board_ID);
if ($permission < PERM_USER)
    exit('Not enough permission.');

$post_name = $_POST['title'];
$post_name = addslashes($post_name);
$content = $_POST['content'];
$content = addslashes($content);
$now = date('Y-m-d H:i:s', time());

$file = $_FILES['uploadfile'];
$path = "./upload/";

$file_name = $file['name'];
if(!empty($file_name))
{
    if(!move_uploaded_file($file['tmp_name'], $path. $file_name))
        exit('Uploadfile failed');
}



$query = "INSERT INTO post(user_ID, board_ID, post_name, create_time, last_update, content, upload_file) ";
$query .= "VALUES ('$user_ID', '$board_ID', '$post_name', '$now', '$now', '$content', '$file_name')";

mysqli_query($conn, $query) or die(mysqli_error($conn));
$result = mysqli_query($conn, 'SELECT last_insert_id()');
$post_ID = mysqli_fetch_array($result)['last_insert_id()'];



header("location:post.php?post_ID=$post_ID");


?>


