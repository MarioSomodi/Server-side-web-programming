<?php
    $x = 7;
    if($x % 3 != 0){
        while($x % 3 != 0){
            $x++;
        }
        echo $x;
    }else{
        echo $x;
    }
?>