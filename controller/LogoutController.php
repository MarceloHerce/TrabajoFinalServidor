<?php
session_start();

if(isset($_SESSION["userLoged"])){
    session_destroy();
    header("Location: ../index.php");
}

?>