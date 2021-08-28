<?php

include 'connection.php';

if (isset($_POST['action_id'])) {

    switch ($_POST['action_id']) {
        case "AddEmployee":
            $sQueryGetLastId = "SELECT emp_no FROM employees ORDER BY emp_no DESC LIMIT 1";

            $resultQuery = $oConnection->query($sQueryGetLastId)->fetch();

            $result =  $resultQuery['emp_no'];

            $sQuery = "INSERT INTO employees (emp_no,birth_date, first_name, last_name, gender,
            hire_date) VALUES (:id,:birthDate, :firstName, :lastName, :gender, :hireDate)";
            $oStatement = $oConnection->prepare($sQuery);

            $oData = array(
                'id' => intval($result) + 1,
                'birthDate' => $_POST['empBirthDate'],
                'firstName' => $_POST['empFirstName'],
                'lastName' => $_POST['empLastName'],
                'gender' => $_POST['empGender'],
                'hireDate' =>  $_POST['empHireDate']
            );

            if ($oStatement->execute($oData)) {
                echo "Uspjesno spremljen klijent!";
            } else {
                echo "Nije spremljen klijent!";
            }
            break;

        case "UpdateEmployee":
            $sQuery = "UPDATE employees
            SET birth_date=:birthDate, first_name=:firstName, last_name=:lastName, gender=:gender,
                hire_date=:hireDate WHERE emp_no=:id ";
            $oStatement = $oConnection->prepare($sQuery);

            $oData = array(
                'id' => $_POST['empId'],
                'birthDate' => $_POST['empBirthDate'],
                'firstName' => $_POST['empFirstName'],
                'lastName' => $_POST['empLastName'],
                'gender' => $_POST['empGender'],
                'hireDate' =>  $_POST['empHireDate']
            );

            if ($oStatement->execute($oData)) {
                echo "Uspjesno ažuriran klijent!";
            } else {
                echo "Nije ažuriran klijent!";
            }

            break;


        case "DeleteEmployee":

            $sQuery = "DELETE FROM employees WHERE emp_no=:Id ";
            $oStatement = $oConnection->prepare($sQuery);
            $oData = array(
                'Id' => $_POST['empId']
            );
            if ($oStatement->execute($oData)) {
                echo "Uspjesno obrisan klijent!";
            } else {
                echo "Nije obrisan klijent!";
            }
            break;

        case "AddDepartment":

            $sQueryGetLastId = "SELECT dept_no FROM departments ORDER BY dept_no DESC LIMIT 1";

            $resultQuery = $oConnection->query($sQueryGetLastId)->fetch();
            $result =  $resultQuery['dept_no'];
            $num = intval(substr($result, 1)) + 1;
            $digits = strlen($num);

            if ($digits == 1) {
                $num = sprintf('%03d', $num);
            }
            if ($digits == 2) {
                $num = sprintf('%02d', $num);
            }

            $combine = "d" . $num;

            $sQuery = "INSERT INTO departments (dept_no, dept_name) VALUES (:id,:deptName)";
            $oStatement = $oConnection->prepare($sQuery);

            $oData = array(
                'id' => $combine,
                'deptName' => $_POST['depName']
            );

            if ($oStatement->execute($oData)) {
                echo "Uspjesno dodan odjel!";
            } else {
                echo "Nije dodan odjel!";
            }

            break;

        case "UpdateDepartment":

            $sQuery = "UPDATE departments
            SET dept_name=:deptName WHERE dept_no=:id ";
            $oStatement = $oConnection->prepare($sQuery);

            $oData = array(
                'id' => $_POST['depId'],
                'deptName' => $_POST['depName']
            );

            if ($oStatement->execute($oData)) {
                echo "Uspjesno ažuriran odjel!";
            } else {
                echo "Nije ažuriran odjel!";
            }


            break;

        case "DeleteDepartment":

            $sQuery = "DELETE FROM departments WHERE dept_no=:id ";
            $oStatement = $oConnection->prepare($sQuery);
            $oData = array(
                'id' => $_POST['depId']
            );

            if ($oStatement->execute($oData)) {
                echo "Uspjesno obrisan odjel!";
            } else {
                echo "Nije obrisan odjel!";
            }
            break;
    }
}
