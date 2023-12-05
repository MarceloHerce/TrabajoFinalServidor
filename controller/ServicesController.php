<?php 
    require_once("../connection/Connection.php");
    require_once("../model/ProductIMPL.php");
    require("../model/ServiceImpl.php");

    session_start();
    $services = selectAllServices($pdo);
   
    $pdo=null;
    require_once("../view/serviceView.php");
?>