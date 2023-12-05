<?php 
require_once("../connection/Connection.php");

session_start();

if(isset($_GET["empty"])){
    setcookie('cartCokie', '', time() - (86400 * 2 + 1), '/');
}
if(isset($_GET["id"]) && isset($_GET["type"])){
    $itemId = $_GET["id"];
    $itemType = $_GET["type"];
    $items = unserialize(base64_decode($_COOKIE["cartCokie"]));

    function deleteItemByKeys(&$items, $value1, $value2) {
        $cont = 0;
        foreach ($items as $item) {

            if ($item["type"] === $value1 && $item["id"] === $value2) {
                echo "D";
                //Unset del item y posiciones
                array_splice($items, $cont, 1);
                //$items[$cont] = $item;
                $cookieItems = base64_encode(serialize($items));
                setcookie("cartCokie", $cookieItems, time() + (86400 * 2), "/");
                header("Location: ../view/cartView.php");
                // Found the associative array
            }
            $cont++;
        }
    }
    deleteItemByKeys($items, $itemType, $itemId);
    header("Location ../view/cartView.php");
}else {

}


include_once("../view/cartView.php");
$pdo = null;


?>