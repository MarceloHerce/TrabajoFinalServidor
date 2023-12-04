<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/style.css">
    <script type="text/javascript" src="../view/js/main.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <title>Products</title>
</head>
<body>
<header>
        <div>
            <img src="../view/src/Logo.png" alt="">
            <h1>ShopIT</h1>
        </div>
        <ul class="nav">
            <li><a href="../index.php">Home</a></li>
            <li><a href="./controller/ProductsController.php">Shop</a></li>
            <li><a href="">About Us</a></li>
            <li><a href="">Cart</a></li>
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
        <div class="container" id="product_container">
            <?php foreach($products as $pro): ?>
                <div class="pCard">
                    <!-- <p>?= $pro->product_id;?></p> -->
                    <h2><?= $pro->pro_name;?></h2>
                    <img src="data:image/jpeg;base64,<?=$pro->image; ?>" alt="image">
                    <p><?= $pro->pro_description;?></p>
                    <p><?= $pro->price;?> $</p>
                    <p>Stock: <?= $pro->stock;?></p>
                    <p>Category: <?= $pro->x_category_id;?></p>
                    <a href="">Add Cart +</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>