<?php

class Configuration 
{
    public $host = "";
    public $dbName ="";
    public $username = "";
    public $password = "''";

    public function __construct($host, $dbName, $username, $password)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->username = $username;
        $this->password = $password;
    }
    
}


class Department
{
    public $Id = "";
    public $Name = "";

    public function __construct($id, $name)
    {
        $this->Id = $id;
        $this->Name = $name;
    }
}

class Employee
{
    public $Id = "";
    public $BirthDate = "";
    public $FirstName = "";
    public $LastName = "";
    public $Gender = "";
    public $HireDate = "";


    public function __construct($id,$birthDate, $firstName, $lastName, $gender,$hireDate)
    {
        $this->Id = $id;
        $this->BirthDate = $birthDate;
        $this->FirstName = $firstName;
        $this->LastName = $lastName;
        $this->Gender = $gender;
        $this->HireDate = $hireDate;
    }
}
?> 