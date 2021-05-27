<?php
    $str1 = "<script>Kisec Kisec</script>";
    $str2 = "ScriPt";
    if(preg_match("([A-Z])\w+", $str1, $match))
        echo "fail<br/>";
    if(!preg_match("/Kisec/", $str2))
        echo $str2 ."은 Kisec과 다릅니다. (2)<br/>";

    $a = preg_replace("/script/", "", $str2);
    echo "변경 후 (1) :". $a ."<br/>";

    $a = preg_replace("/sec/", "sa", $str2);
    echo "변경 후 (2) :". $a ."<br/>";

?>
