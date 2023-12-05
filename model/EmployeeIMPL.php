<?php
require_once("../model/Employee.php");

function selectAllEmployees($pdo) {
    try {
        //Query
        $statement = $pdo->query("SELECT * FROM employees");

        $results = [];
        // Insertar datos en el array
        foreach ($statement->fetchAll() as $emp) {
            $image = $emp["image"];
            $base64Image = base64_encode($image);
            $objectE = new Employee($emp["employee_id"], $emp["emp_name"], $emp["job_title"], $emp["emp_description"], $base64Image);

            array_push($results, $objectE);
        }
        return $results;
    } catch (PDOException $e) {
        echo "Error al seleccionar empleados" . $e;
    }
}
?>