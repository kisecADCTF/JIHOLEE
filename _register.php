<?php

include('utils/constants.php');
include('utils/connect.php');

if (!isset($_POST['submit']))
    exit('Illegal call to this page.');

$username = $_POST['username'];
$username = addslashes($username);
$password = MD5($_POST['password']);
$permission = $_POST['permission'];
$permission = addslashes($permission);

$now = date('Y-m-d H:i:s', time());
$query = "INSERT INTO user(username, password, default_permission, registration_time, money) ";
$query .= "VALUES('$username', '$password', '$permission', '$now', 10000)";

mysqli_query($conn, $query) or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<script>
    alert("Registered completed.");
    window.location.href = "index.html";
</script>
