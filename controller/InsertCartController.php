<?php 
require_once("../connection/Connection.php");
require("../model/orderImpl.php");

session_start();
if (!isset($_SESSION["userLoged"])){
    header("Location: ../controller/RegisterLoginController.php");
} else {
    insertOrders($pdo);
    header("Location: ../controller/ProfileController.php");
}

$pdo = null;

//$_SESSION["lastPage"] = $_SERVER['HTTP_REFERER'];
/*if(!isset($_SESSION["userLoged"])){
    header("Location: ../controller/LoginFormController.php");
}*/

?>