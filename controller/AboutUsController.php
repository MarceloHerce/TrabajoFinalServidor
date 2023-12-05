<?php 
require_once("../connection/Connection.php");
require("../model/EmployeeImpl.php");

session_start();

$employees = selectAllEmployees($pdo);

$pdo = null;
include_once("../view/aboutUsView.php");


?>