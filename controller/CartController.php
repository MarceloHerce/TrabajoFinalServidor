<?php 
require_once("../connection/Connection.php");

session_start();

if(isset($_GET["empty"])){
    setcookie('cartCokie', '', time() - (24 * 60 * 60 * 2 + 1), '/');
}
if(isset($_GET["id"]) && isset($_GET["type"])){
    $articleId = $_GET["id"];
    $articleType = $_GET["type"];
    $articles = unserialize(base64_decode($_COOKIE["cartCokie"]));

    function deleteArticleByKeys(&$articles, $value1, $value2) {
        $cont = 0;
        foreach ($articles as $art) {

            if ($art["type"] === $value1 && $art["id"] === $value2) {
                //Eliminar articulo del carrito
                array_splice($articles, $cont, 1);
                $cookieItems = base64_encode(serialize($articles));
                setcookie("cartCokie", $cookieItems, time() + (24 * 60 * 60 * 2), "/");
                header("Location: ../view/cartView.php");
            }
            $cont++;
        }
    }
    deleteArticleByKeys($articles, $articleType, $articleId);
    header("Location ../view/cartView.php");
}else {

}


include_once("../view/cartView.php");
$pdo = null;


?>