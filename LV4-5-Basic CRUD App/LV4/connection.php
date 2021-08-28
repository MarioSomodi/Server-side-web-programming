<?php
include_once('classes.php');

$oConnectParam = new Configuration('127.0.0.1', 'employees','root', '' );


try
{
    $oConnection = new PDO("mysql:host=$oConnectParam->host;dbname=$oConnectParam->dbName", $oConnectParam->username, $oConnectParam->password);
    //echo "Connected to $oConnectParam->dbName at $oConnectParam->host successfully.";
}
catch (PDOException $pe)
{
    die("Could not connect to the database $oConnectParam->dbName :" . $pe->getMessage());
}

?>