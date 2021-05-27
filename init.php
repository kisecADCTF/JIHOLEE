<?php

include("utils/connect.php");

if ($_GET['confirm'] != true and $_GET['drop'] != true)
    exit("Illegal call to this page");

if ($_GET['drop'] == 'true') {
    mysqli_query($conn, "DROP VIEW top_cache") or die(mysqli_error($conn));
    mysqli_query($conn, "DROP TABLE post_reply") or die(mysqli_error($conn));
    mysqli_query($conn, "DROP TABLE post") or die(mysqli_error($conn));
    mysqli_query($conn, "DROP TABLE rule") or die(mysqli_error($conn));
    mysqli_query($conn, "DROP TABLE board") or die(mysqli_error($conn));
    mysqli_query($conn, "DROP TABLE user") or die(mysqli_error($conn));
}
if ($_GET['confirm'] == 'true') {
        mysqli_query($conn, "CREATE TABLE user (
        user_ID INT NOT NULL AUTO_INCREMENT,
        username VARCHAR(20) NOT NULL,
        password VARCHAR(32) NOT NULL,
        default_permission TINYINT NOT NULL,
        registration_time DATETIME NOT NULL,
        money INT default NULL,
        
        UNIQUE(username),
        PRIMARY KEY (user_ID),
        UNIQUE INDEX (username, password)
    )") or die(mysqli_error($conn));

        mysqli_query($conn, "CREATE TABLE board (
        board_ID TINYINT NOT NULL AUTO_INCREMENT,
        board_name VARCHAR(50) NOT NULL,
        
        UNIQUE(board_name),
        PRIMARY KEY (board_ID)
    )")
        or die(mysqli_error($conn));

        mysqli_query($conn, "CREATE TABLE rule (
        user_ID INT NOT NULL,
        board_ID TINYINT NOT NULL,
        permission TINYINT NOT NULL,
        
        PRIMARY KEY (user_ID, board_ID),
        FOREIGN KEY (user_ID) REFERENCES user(user_ID),
        FOREIGN KEY (board_ID) REFERENCES board(board_ID)
    )")
        or die(mysqli_error($conn));

        mysqli_query($conn, "CREATE TABLE post (
        post_ID INT NOT NULL AUTO_INCREMENT,
        user_ID INT NOT NULL,
        board_ID TINYINT NOT NULL,
        post_name VARCHAR(50),
        create_time DATETIME NOT NULL,
        last_update DATETIME NOT NULL,
        content TEXT NOT NULL,
        upload_file TEXT default NULL,
        secret boolean default NULL,
        
        PRIMARY KEY (post_ID),
        FOREIGN KEY (user_ID) REFERENCES user(user_ID),
        FOREIGN KEY (board_ID) REFERENCES board(board_ID)
    )")
        or die(mysqli_error($conn));

        mysqli_query($conn, "CREATE TABLE post_reply (
        reply_ID INT NOT NULL AUTO_INCREMENT,
        user_ID INT NOT NULL,
        post_ID INT NOT NULL,
        create_time DATETIME NOT NULL,
        content TEXT NOT NULL,
        
        PRIMARY KEY (reply_ID),
        FOREIGN KEY (post_ID) REFERENCES post(post_ID)
    )")
        or die(mysqli_error($conn));

        mysqli_query($conn, "CREATE VIEW top_cache (post_ID, reply_count) AS
    SELECT post_ID, count(*) FROM post_reply GROUP BY post_ID LIMIT 10")
        or die(mysqli_error($conn));

        $now = date('Y-m-d H:i:s', time());
        $query = "INSERT INTO user ";
        $query .= "VALUES(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 4, '$now', 1000000)";
        mysqli_query($conn, $query) or die(mysqli_error($conn));
}
?>

<!DOCTYPE html>
<script>
    alert("Database has been reset.");
    window.location.href = "index.html"
</script>
