<?php
    $x = 7;
    for($i = 1; $i <= $x; $i++){
        echo "# ";
        $check = 1;
        while($check < $i+1){
            echo $check." ";
            $check++;
        }
        echo "<br>";
    }
?>