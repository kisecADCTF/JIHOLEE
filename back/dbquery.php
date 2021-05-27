<?php
    include('./dbconnect.php');
    $query = "SELECT * FROM user";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    if($result = mysqli_query($conn, $query)){
            while($row = mysqli_fetch_array($result)){
                print_r($row);
                echo "</br>";
            }
    }
?>