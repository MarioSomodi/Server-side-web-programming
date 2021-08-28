<?php
    function Multiply3x3($matrix1, $matrix2){
        $output_matrix = [];
        for($i = 0; $i < 3;$i++){
            for($j = 0; $j < 3;$j++){
                for($k = 0; $k < 3; $k++){
                    $output_matrix[$i][$j] = $matrix1[$i][$k] * $matrix2[$k][$j];
                }
            }
        }
        return $output_matrix;
    }
    $matrix1 = array(array(1,2,3), array(4,5,6), array(7,8,9));
    $matrix2 = array(array(1,2,4), array(4,7,6), array(7,23,9));
    $output_matrix = Multiply3x3($matrix1, $matrix2);
    for($i = 0; $i < 3; $i++){
        for($j = 0; $j < 3; $j++){
            echo $output_matrix[$i][$j]." ";
        }
        echo "<br>";
    }
?>