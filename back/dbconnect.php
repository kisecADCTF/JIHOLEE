<?php

    $db_host = "10.10.0.142";
    $db_id = "root";
    $db_pwd = "kisec123";
    $db_name = "user1";
    $db_port = 32001;

	$conn = mysqli_connect($db_host, $db_id, $db_pwd, $db_name, $db_port);

	if(mysqli_connect_errno())
	    die('Connect Error : ' .mysqli_connect_errno());

	//mysqli_close($conn);

?>
