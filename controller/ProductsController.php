<?php 
    require_once("../connection/Connection.php");
    require_once("../model/ProductIMPL.php");
    $products = selectAllProducts($pdo);
    $pdo=null;
    require_once("../view/shopView.php");
?>