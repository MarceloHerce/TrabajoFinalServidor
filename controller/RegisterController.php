<?php 

if (isset($_POST["submit"])) {
    require_once("../connection/Connection.php");
    require_once ("../model/userImpl.php");
    session_start();

    //Recoger los datos
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $username = isset($_POST["username"]) ? trim($_POST["username"]) : false;
    $mail = isset($_POST["mail"]) ? trim($_POST["mail"]) : false;
    $pass = isset($_POST["password"]) ? trim($_POST["password"]) : false;
    $address = isset($_POST["address"]) ? trim($_POST["address"]) : false;
    $phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : false;
    $floor = isset($_POST["floor"]) ? trim($_POST["floor"]) : false;

    var_dump($_POST);

    $arrayErrores = array();
    //Hacemos validadores necesarios
    if (!empty($username) && !is_numeric($username)) {
        $usernameValidado = true;
    } else {
        $usernameValidado = false;
        $arrayErrores["username"] = "El username no es valido";
    }

    
    /*Prevent SQL Injection*/
    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_name= (?)");
    $stmt->execute([$username]);
    $rowCount = $stmt->rowCount();
    if ($usernameValidado && $rowCount > 0){
        $usernameValidado = false;
        $arrayErrores["username"] = "Este username ya está en uso".$rowCount.$username;
    }

    if (!empty($mail) && filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $mailValidado = true;
    } else {
        $mailValidado = false;
        $arrayErrores["mail"] = "El mail no es valido";
    }
    /*Prevent SQL Injection PENDING*/
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$mail]);
    $rowCount = $stmt->rowCount();

    if ($mailValidado && ($rowCount > 0)) {
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
        //password_verify($pass, $passSegura);
        
        //Insert user on userImpl
        echo $username." ".$passSegura." ".$address." ".$phone." ".$mail." ".$floor;
        $userRegister = new User(0, $username, $passSegura, $address, $phone, $mail, $floor, 2);
        var_dump($userRegister);
        echo $userRegister->user_name;
        $registered = insertUser($pdo, $userRegister);
        /*$sql = "INSERT INTO users VALUES(?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([0, $username, $passSegura, $address, $phone, $mail, $floor,2]);*/

        if ($stmt) {
            $_SESSION["completado"] = "Registro completado";
        } else {
            $_SESSION["errores"]["general"] = "Fallo en el registro";
        }
    } else {
        $_SESSION["errores"] = $arrayErrores;
    }
    $pdo=null;
    var_dump($arrayErrores);
    header("Location: ../controller/RegisterLoginController.php");
}
?>