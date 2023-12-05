<?php 
require_once("../model/Order.php");
require_once("../model/userImpl.php");
require_once("../model/productImpl.php");
require_once("../model/serviceImpl.php");

function selectOrderById($pdo, $id){
    try {
        // Query
        $sql = "SELECT * FROM products WHERE product_id = ?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch();
        // Validar order
        if ($res) {
            $product = new Order($res["product_id"], $res["pro_name"], $res["pro_description"], $res["price"],
            $res["stock"], $res["image"], $res["x_category_id"]);
            return $product;
        }
    }catch (PDOException $e) {
        echo "No se ha podido completar la transaccion";
    }
}

function selectOrdersByUserId($pdo, $id) {
    // Query
    $sql = "SELECT * FROM orders WHERE x_user_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $orders = [];
    // Insertar las ordenes del usuario
    while ($res = $stmt->fetch()) {
        $order = new Order ($res["order_id"],$res["x_user_id"],$res["order_date"]);
        $orderItems = selectItemsByOrderId($pdo, $order->order_id);
        $order->items = $orderItems;
        array_push($orders, $order);
    }
    return $orders;
}

function selectItemsByOrderId($pdo, $id) {
    // Query
    $sql = "SELECT * FROM orderDetails WHERE x_order_id = ('$id')";
    $stmt= $pdo->prepare($sql);
    $stmt->execute();
    $items = [];

    // Seleccionar productos o servicios
    while ($res = $stmt->fetch()) {
        if($res["x_product_id"] != null) {
            $item = selectProductById($pdo, $res["x_product_id"]);
        } else {
            $item = selectServiceById($pdo, $res["x_service_id"]);
        }
        $item = ["item"=> $item, "quantity"=> $res["quantity"]];
        array_push($items, $item);
    }
    return $items;
}

// Funcion de cart tipo 1 producto tipo 2 servicio
function getCartItemByTypeId($pdo, $type, $id) {
    if ($type == 1) {
            return selectProductById($pdo, $id);
        } elseif ($type == 2) {
            return selectServiceById($pdo, $id);
    } else {
        echo "Tipo de item no valido";
    }
}

function insertOrders($pdo) {
    try{
        // Iniciar transacción
        $pdo->beginTransaction();

        //Insert de order
        $sql = "INSERT INTO orders VALUES (0, ?, NOW())";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$_SESSION["usuario"]->user_id]);

        //Seleccionar la id del carrito
        $sql = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $lastOrderId = $stmt->fetch()['order_id'];

        //Cookie
        $cookie = unserialize(base64_decode($_COOKIE['cartCokie']));
        foreach($cookie as $item){
            //insertar productos del carrito
            insertIntoOrderDetails($pdo, $item, $lastOrderId);
        }
        $pdo->commit();
        setcookie('cartCokie', '', time() - (86400 * 2 + 1), '/');
        $pdo = null;
    } catch (PDOException $e)  {
        // Roolback
        $pdo->rollBack();
    }
    
}
function insertIntoOrderDetails($pdo, $item, $orderId) {
    $sql = "INSERT INTO orderdetails VALUES (0, (?), (?), (?), (?))";
    $stmt= $pdo->prepare($sql);
    if ($item["type"] == 1) {
        $stmt->bindValue(1, $orderId);
        $stmt->bindValue(2, $item["id"]);
        $stmt->bindValue(3, null, PDO::PARAM_NULL);
        $stmt->bindValue(4, $item["quantity"]);
        $stmt->execute();
    } elseif ($item["type"] == 2){
        $stmt->bindValue(1, $orderId);
        $stmt->bindValue(2, null, PDO::PARAM_NULL);
        $stmt->bindValue(3, $item["id"]);
        $stmt->bindValue(4, $item["quantity"]);
        $stmt->execute();
    }
}

?>