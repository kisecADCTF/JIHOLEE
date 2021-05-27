<?php
include ("../dbconnect.php");

mysqli_query($conn, "DROP TABLE board") or die(mysqli_error($conn));
mysqli_query($conn, "DROP TABLE user") or die(mysqli_error($conn));

mysqli_query($conn, "CREATE TABLE user (
        user_ID INT NOT NULL AUTO_INCREMENT,
        id VARCHAR(20) NOT NULL,
        pwd VARCHAR(32) NOT NULL,
        PRIMARY KEY (user_ID),
        UNIQUE (id)
    )") or die(mysqli_error($conn));

mysqli_query($conn, "CREATE TABLE board (
        no TINYINT NOT NULL AUTO_INCREMENT,
        id VARCHAR(20) NOT NULL,
        title VARCHAR(50) NOT NULL,
        content VARCHAR(1000) NOT NULL,
        PRIMARY KEY (no)
    )")
or die(mysqli_error($conn));
header('location:login.php');
