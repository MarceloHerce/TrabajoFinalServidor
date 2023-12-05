<?php
require("../model/User.php");

// Seleccionar todos los usuarios
function selectUserById($pdo, $userId){
    try {
        // Query
        $sql = "SELECT * FROM users WHERE user_id = (?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$userId]);
        $res = $stmt->fetch();
        // Si existe el user
        if ($res) {
            // Crear objeto
            $user = new User($res["user_id"], $res["user_name"], $res["user_password"], $res["address"],
            $res["phone"], $res["email"], $res["floor"], $res["x_rol_id"]);
            return $user;
        }
    }catch (PDOException $e) {
        echo "Error al obtener usuario" . $e;
    }
}

function insertUser($pdo, User $user){
    try {
        // sentencia
        $sql = "INSERT INTO users VALUES(0, (?), (?), (?), (?), (?), (?), 1);";
        $stmt= $pdo->prepare($sql);
        // $stmt->bindParam(1,$user->user_name);
        // $stmt->bindParam(2,$user->user_password);
        // $stmt->bindParam(3,$user->address);
        // $stmt->bindParam(4,$user->phone);
        // $stmt->bindParam(5,$user->email);
        // $stmt->bindParam(6,$user->floor);
        $stmt->execute([$user->user_name, $user->user_password, $user->address, $user->phone, $user->email, $user->floor]);
        return $stmt;
    }catch (PDOException $e) {
        echo "Error al obtener usuario" . $e;
    }
}
function updatetUser($pdo, User $user){
    try {
        $sql = "UPDATE users SET user_name = ((?)), user_password = (?), address = ((?)), phone = ((?)), email = ((?)), floor = ((?)) WHERE user_id = $user->user_id;";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$user->user_name,$user->user_password,$user->address,$user->phone,$user->email,$user->floor]);
        return $user;
    }catch (PDOException $e) {
        echo "Error al obtener usuario" . $e;
    }
}
?>