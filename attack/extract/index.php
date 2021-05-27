<a href="?view-source">view-source</a>
<?php

if(isset($_GET['view-source'])){
    show_source(__FILE__);
}

include "define.php"; //string in the define.php

extract($_GET);

if($str == $string){
    echo $flag;
}
?>