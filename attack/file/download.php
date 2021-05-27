<?php
$file_name = $_GET['upload_file'];
$file_path = "./upload/". $file_name;
$file_size = filesize($file_path);
header("Pragma: public");
header("expires: 0");
header("Content-Type: application.octet-stream");
header("Content-Transfer-Encoding: binary");
header('Content-Disposition: attachment; filename="'.$file_name.'"');

ob_clean();
flush();
readfile($file_path);