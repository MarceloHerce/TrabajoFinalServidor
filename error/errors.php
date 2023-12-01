<h1>ERROR</h1>
<?php

try {
    require_once "../connection/Connection.php";
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para obtener todas las imágenes de la tabla products
    $sql = "SELECT image FROM products";
    $stmt = $pdo->query($sql);

    // Mostrar las imágenes
    while ($row = $stmt->fetch()) {
        $imageData = $row['image'];
        $base64Image = base64_encode($imageData);

        // Mostrar la imagen en un elemento img
        echo '<img src="data:image/jpeg;base64,' . $base64Image . '" alt="Imagen" /><br>';
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$pdo = null;

?>