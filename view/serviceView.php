<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/style.css">
    <script type="text/javascript" src="view/js/main.js" defer></script>
    <title>Products</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Shop</a></li>
            <li><a href="">About Us</a></li>
        </ul>
    </header>
    <main>
        <div class="container">
            <img src="view/src/Servidor_PC 2.png" alt="">
            <img src="view/src/Servidor_CPU 2.png" alt="">
        </div>
        <div class="container">
            <button id="all">All categories</button>
            <button id="computer_Parts">Computer Parts</button>
            <button id="peripherals">Peripherals</button>
            <button id="keys">Keys</button>
        </div>
        <?php 
        require_once (__DIR__."\\model\\ProductIMPL.php");
        // require_once ("connection\\Connection.php");
        function connection($host, $user, $pass, $bd) {
            return new PDO("mysql:host=$host;dbname=$bd", $user, $pass);
        }
        
        try {
            $host = "localhost:3306";
            $user = "root";
            $pass = "root";
        
            $bd = "techshop";
        
            $pdo = connection($host, $user, $pass, $bd);
            var_dump($pdo);
            echo "connection";
        }  catch (PDOException $e) {
            header("Location: ../error/errors.php");
        }
        
        // Codigo nornmal
        try {
            // Esto te ayudará a verificar si $pdo se está inicializando correctamente
            echo '<br>';
            var_dump($pdo);
            echo '<br>';
            // Asegúrate de que $pdo no sea null antes de llamar a la función selectAllProducts
            if ($pdo != null) {
                $products = selectAllProducts($pdo);
            } else {
                echo "La conexión PDO es nula.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
        <div class="container" id="product_container">
            <?php foreach($products as $pro): ?>
                <div class="pCard">
                    <p><?= $pro->product_id;?></p>
                    <p><?= $pro->pro_name;?></p>
                    <p><?= $pro->pro_description;?></p>
                    <p><?= $pro->price;?></p>
                    <p><?= $pro->stock;?></p>
                    <p><?= $pro->x_category_id;?></p>
                    <img src="data:image/jpeg;base64,<?=$pro->image; ?>" alt="image">
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>