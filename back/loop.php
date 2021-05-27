<?php
    $start = 0;
    $end = 10;
    $idx = $start;

    echo "While <br/>";
    while($idx < $end) {
        echo $idx ."<br/>";
        $idx++;
    }

    echo "For <br/>";
    for ($idx = $start; $idx < $end; $idx++) {
        echo $idx ."<br/>";
    }

    echo "Do While <br/>";
    $idx = 0;
    do {
        echo $idx ."<br/>";
        $idx++;
    } while($idx < $end);

?>