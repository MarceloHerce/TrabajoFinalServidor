<?php 
    require_once("../connection/Connection.php");
    require ("../model/userImpl.php");
    session_start();

    if (isset($_POST["mail"]) && isset($_POST["pass"])) {
        $mail = trim($_POST["mail"]);
        $pass = trim($_POST["pass"]);
    }
    if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM users WHERE email = (?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$mail]);
        $res = $stmt->fetch();
        // Si res es false la query ha fallado
        if($res){
            if ($res->execute() && $res->rowCount() === 1) {
                $usuario = $res->fetch();
    
                if (password_verify($pass, $usuario["password"])) {
                    $_SESSION["usuario"] = selectUserById($pdo, $usuario["id"]);
                    $pdo = null;
                    header("Location:  ../controller/ProfileController.php");
                } else {
                    $_SESSION["error_login"] = "Login incorrecto a";
                    $pdo = null;
                    header("Location: ../controller/RegisterLoginController.php");
                }
            } 
        } else {
            $_SESSION["error_login"] = "Login incorrecto";
            $pdo = null;
            header("Location: ../controller/RegisterLoginController.php");
        }
    } else {
        //si el email no es válido significa en principio que el formato no es de mail,
        //por lo que chequea con username (se pueden introducir los dos en el mismo campo del form)

        $sql = "SELECT * FROM users WHERE user_name = ('$mail')";
        //prepare te permite hacer fetch_assoc
        $res = $pdo->prepare($sql);
        
        //execute devuelte true o false
        if ($res->execute() && $res->rowCount() === 1) {
            $usuario = $res->fetch();
            var_dump($usuario);
            if (password_verify($pass, $usuario["user_password"])) {
                $_SESSION["usuario"] = selectUserById($pdo, $usuario["user_id"]);
                $pdo = null;
                header("Location: ../controller/ProfileController.php");
            } else {
                $_SESSION["error_login"] = "Login incorrecto 1";
                $pdo = null;
                header("Location: ../controller/RegisterLoginController.php");
            }
        } else {
            $_SESSION["error_login"] = "Login incorrecto 2";
            $pdo = null;
            header("Location: ../controller/RegisterLoginController.php");
        }
    }
    $pdo = null;
?>