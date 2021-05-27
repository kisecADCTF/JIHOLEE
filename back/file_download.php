<?php
    $file_name = "cef.pak";
    $path = "./upload/$file_name";
    $file_size = filesize($path);

    header("Pragma: public");
    header("expires: 0");
    header("Content-Type: application/octet-stream");
    header("Content-Transfer-Encoding: binary");
    header("Content-Length:" .$file_size);
    header("Content-Disposition: attachment; filename=" .$file_name);

    ob_clean();
    flush();
    readfile($path);
?>