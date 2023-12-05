<?php 
require_once("../connection/Connection.php");
require_once("../model/userImpl.php");

session_start();
if (isset($_SESSION["usuario"])){
    if(isset($_POST["submit"])){
        $username = isset($_POST["username"]) ? trim($_POST["username"]) : false;
        $mail = isset($_POST["mail"]) ? trim($_POST["mail"]) : false;
        $pass = isset($_POST["password"]) ? trim($_POST["password"]) : false;
        $address = isset($_POST["address"]) ?trim($_POST["address"]) : false;
        $phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : false;
        $floor = isset($_POST["floor"]) ? trim($_POST["floor"]) : false;
        echo $mail;
        var_dump($_SESSION["usuario"]);


        $arrayErrores = array();
        //Hacemos validadores necesarios
        if (!empty($username) && !is_numeric($username)) {
            $usernameValidado = true;
        } else {
            $usernameValidado = false;
            $arrayErrores["username"] = "El username no es valido";
        }

        $stmt = $pdo->prepare("SELECT * FROM users WHERE user_name= (?)");
        $stmt->execute([$username]);
        $rowCount = $stmt->rowCount();

        if ($usernameValidado && $rowCount > 0 && !($username == $_SESSION["usuario"]->user_name)){
            $usernameValidado = false;
            $arrayErrores["username"] = "Este username ya está en uso".$rowCount.$username;
        }

        if (!empty($mail) && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $mailValidado = true;
        } else {
            $mailValidado = false;
            echo $mail;
            $arrayErrores["mail"] = "El mail no es valido".$mail;
        }
        
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = (?)");
        $stmt->execute([$mail]);
        $rowCount = $stmt->rowCount();

        if ($mailValidado && $rowCount > 0 && !($mail == $_SESSION["usuario"]->email)) {
            $mailValidado = false;
            $arrayErrores["mail"] = "Este mail ya ha sido registrado";
        }

        if (!empty($pass)) {
            $passValidado = true;
        } else {
            $passValidado = false;
            $arrayErrores["password"] = "El password no es valido";
        }

        $guardarUsuario = false;
        if(count($arrayErrores) === 0) {
            $guardarUsuario = true;
            
            $passSegura = password_hash($pass, PASSWORD_BCRYPT, ["cost" => 4]);
 
            
            //Insert user on userImpl
            $userEdited = new User($_SESSION["usuario"]->user_id, $username, $passSegura, $address, $phone, $mail, $floor, $_SESSION["usuario"]->x_rol_id);
            $userEdited = updatetUser($pdo, $userEdited);
            $_SESSION["usuario"] = $userEdited;

            if ($stmt) {
                header("Location: ../controller/ProfileController.php");
            } else {
                header("Location: ../errors/Error.php");
            }
        } else {
            $_SESSION["errores"] = $arrayErrores;
            header("Location: ../error/errors.php");
        }
    } else {
        include("../view/EditUserView.php");
    }
} else {
    header("Location: ../controller/RegisterLoginController.php");
}
$pdo=null;
?>