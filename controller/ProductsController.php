<?php 
    require_once("../connection/Connection.php");
    require_once("../model/ProductIMPL.php");
    require("../model/UserImpl.php");
    require("../model/ServiceImpl.php");
    require("../model/Employee.php");

    session_start();
    $selectValue = isset($_GET['select']) ? $_GET['select'] : '';

    if($selectValue=="all"){
        $products = selectAllProducts($pdo);
    }   else {
        $products = selectProductsByCategoryName($pdo, $selectValue);
    }

    if (isset($_GET["price"])){
        $order = $_GET["price"];
        if ($order == "des"){
            $products = orderByPriceDescend($products);
        } else if ($order == "asc"){
            $products = orderByPriceAscend($products);
        }
    }
    if (isset($_GET["name"])){
        $order = $_GET["name"];
        if ($order == "des"){
            $products = orderByNameDescend($products);
        } else if ($order == "asc"){
            $products = orderByNameAscend($products);
        }
    }
   
    $pdo=null;
    require_once("../view/shopView.php");
?>