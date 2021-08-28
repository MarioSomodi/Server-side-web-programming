<?php
    $x = "pistol";
    $y = "";
    for($i = strlen($x); $i != -1; $i--){
        $y = $y.$x[$i];
    }
    if($x === $y){
        echo "String je palindrom";
    }
    else{
        echo "String nije palindrom";
    }
?>