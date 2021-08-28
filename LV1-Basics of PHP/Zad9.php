<?php
    function DisplayMatrix($rows, $colums, $arr){
        $output_matrix = array(array(0,0,0), array(0,0,0), array(0,0,0));
        for($i = 0; $i < $rows;$i++)
        {
            for($j = 0; $j < $colums; $j++){
                foreach($arr as $pos){
                    for($k = 0; $k < count($pos); $k++){
                        $output_matrix[$pos[0]][$pos[1]] = $pos[2];
                    }
                }
            }
        }
        for($i = 0; $i < $rows; $i++){
            for($j = 0; $j < $colums; $j++){
                echo $output_matrix[$i][$j]." ";
            }
            echo "<br>";
        }
    }
    DisplayMatrix(3, 3, array(array(0,0,5), array(1,1,2) , array(1,2,3) , array(2,2,5)));
?>