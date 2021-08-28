<?php
    global $fib;
    $fib = array(
        "1" => 1,
        "2" => 2
    );
    getFib(5);
    function getFib($n){
        if(array_key_exists($n, $GLOBALS['fib']))
        {
            echo($GLOBALS['fib'][$n]);
        }else{
            $n1 = 0;
            $n2 = 1;
            $fibNum = 0;
            for($i = 0; $i < $n-1;$i++){
                $fibNum = $n1 + $n2;
                $n1 = $n2;
                $n2 = $fibNum;
                if(!in_array($fibNum, $GLOBALS['fib'])){
                    array_push($GLOBALS['fib'], array(
                        (string)$n => $fibNum
                    ));
                }
            }
            echo $fibNum;
        }
    }
?>