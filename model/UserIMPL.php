<?php
require("../model/User.php");


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
        $stmt->bindParam(1,$user->username);
        $stmt->bindParam(2,$user->password);
        $stmt->bindParam(3,$user->address);
        $stmt->bindParam(4,$user->phone);
        $stmt->bindParam(5,$user->email);
        $stmt->bindParam(6,$user->floor);
        $stmt->bindParam(7,$user->role_id);
        $stmt->execute();
        return $stmt;
    }catch (PDOException $e) {
        echo "Error al obtener usuario" . $e;
    }
}
function updatetUser($pdo, User $user){
    try {
        $sql = "UPDATE users SET user_name = ((?)), user_password = (?), address = ((?)), phone = ((?)), email = ((?)), floor = ((?)) WHERE user_id = $user->user_id;";
        $stmt= $pdo->prepare($sql);

        $stmt->bindParam(1,$user->username);
        $stmt->bindParam(2,$user->password);
        $stmt->bindParam(3,$user->address);
        $stmt->bindParam(4,$user->phone);
        $stmt->bindParam(5,$user->email);
        $stmt->bindParam(6,$user->floor);

        $stmt->execute();
        return $user;
    }catch (PDOException $e) {
        echo "Error al obtener usuario" . $e;
    }
}
?>