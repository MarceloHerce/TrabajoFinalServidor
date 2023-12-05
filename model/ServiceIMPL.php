<?php
require_once("../model/Service.php");

function selectAllServices($pdo) {
    try {
        //Query
        $statement = $pdo->query("SELECT * FROM services");

        $results = [];
        foreach ($statement->fetchAll() as $s) {
            // Tratar img
            $image = $s["image"];
            $deBlobImg = base64_encode($image);

            $objectS = new Service($s["service_id"], $s["ser_name"], $s["ser_description"], $s["price"], $deBlobImg);
            array_push($results, $objectS);
        }
        return $results;

    } catch (PDOException $e) {
        echo "Error al obtener servicios" . $e;
    }
}

function selectServiceById($pdo, $id) {
    try {
        //Query
        $sql = "SELECT * FROM services WHERE service_id = ?";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch();
        //Validar servicio
        if ($res) {
            // Tratar img
            $image = $res["image"];
            $deBlobImg = base64_encode($image);

            $service = new Service($res["service_id"], $res["ser_name"], $res["ser_description"], $res["price"],$deBlobImg);
            return $service;
        }
    }catch (PDOException $e) {
        echo "Error al obtener servicio" . $e;
    }
}

function insertService($servicio) {
    try {
        //Query
        $sql = "INSERT INTO services (ser_name, ser_description, price, image) VALUES ((?), (?), (?), (?))";

        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(1, $servicio->ser_name);
        $stmt->bindParam(2, $servicio->ser_description);
        $stmt->bindParam(3, $servicio->price);
        $stmt->bindParam(4, $servicio->image);

        $stmt->execute();

        echo "Inserción exitosa";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

function updateService($servicio) {
    try {
        //Query
        $sql = "UPDATE services SET ser_name = (?), ser_description = (?), price = (?), image = (?) WHERE service_id = (?)";

        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(1, $servicio->service_id);
        $stmt->bindParam(2, $servicio->ser_name);
        $stmt->bindParam(3, $servicio->ser_description);
        $stmt->bindParam(4, $servicio->price);
        $stmt->bindParam(5, $servicio->image);

        $stmt->execute();

        echo "Actualización exitosa";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>