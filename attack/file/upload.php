upload file
<form method="POST" action="" enctype="multipart/form-data">
    <input type = "file" name="uploadfile"/>
    <input type = "submit" value = "upload" name = "upload"/>
</form>
download file
<a href="download.php?upload_file="+test.php>test.php</a>
<?php
$file = 0;
if(isset($_FILES['uploadfile']))
    $file = $_FILES['uploadfile'];
echo $file['name']."</br>";
$path = "./upload/";
if(isset($_POST['upload'])){
    if(move_uploaded_file($file['tmp_name'], $path . $file['name'])){
        echo "upload success!!";
    }
    else{
        echo "upload fail!!";
    }
}
?>