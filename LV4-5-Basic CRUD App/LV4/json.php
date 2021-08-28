<?php

include 'connection.php';

if(isset($_GET['json_id']) || isset($_GET['employee_id']))
{
    switch($_GET['json_id'])
    {
        case "get_all_employees":
            ini_set('memory_limit', '2048M');
            $query = "SELECT * FROM employees";
            $oResult = $oConnection->query($query);
            $rows = array();
            while($oRow = $oResult->fetch(PDO::FETCH_BOTH)) {
                $rows[] = $oRow;
                if(sizeof($rows) == 101){
                    break;
                }
                }
            echo json_encode($rows);
            break;

            case "get_all_departments":
                $query = "SELECT * FROM departments ORDER BY dept_no";
                $oResult = $oConnection->query($query);
                $rows = array();
                while($oRow = $oResult->fetch(PDO::FETCH_BOTH)) {
                    $rows[] = $oRow;
                    }
                echo json_encode($rows);
            break;

            case "get_employee_by_id":
                $query = "SELECT * FROM employees WHERE emp_no = ".$_GET['employee_id'];
                $oResult = $oConnection->query($query);
                $rows = array();
                while($oRow = $oResult->fetch(PDO::FETCH_BOTH)) {
                    $rows[] = $oRow;
                    }
                // echo json_encode($rows);
                echo json_encode($rows);

            break;
    }
}



?>