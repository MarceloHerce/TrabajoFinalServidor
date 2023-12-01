<?php 

function connection($host, $user, $pass, $bd) {
    return new PDO("mysql:host=$host;dbname=$bd", $user, $pass);
}
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__));
    };
try {
    $host = "localhost:3306";
    $user = "root";
    $pass = "root";

    $bd = "techshop";

    $pdo = connection($host, $user, $pass, $bd);
}  catch (PDOException $e) {
    header("Location: ../errors/error.php");
}

?>