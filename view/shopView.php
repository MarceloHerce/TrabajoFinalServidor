<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Este es un ejemplo crud">
    <meta name="keywords" content="html, css, js, proyectos, php">
    <meta name="language" content="EN">
    <meta name="author" content="marcelo.herce@a.vedrunasevillasj.es">
    <meta name="robots" content="index,follow">
    <meta name="revised" content="Tuesday, February 28th, 2023, 23:00pm">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE-edge, chrome1">
    <link rel="stylesheet" href="../view/css/style.css">
    <script type="text/javascript" src="../view/js/main.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="icon" href="../view/src/Logo.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../view/src/Logo.ico" type="image/x-icon">
    <title>Products</title>
</head>
<body>
    <header>
        <?php
            if (!empty($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '?select=') === false) {
                // La URL no contiene ?select= al final, así que lo añadimos
                header('Location: ' . $_SERVER['REQUEST_URI'] . '?select=');
                exit();
            }
        ?>
        <div>
            <img src="../view/src/Logo.png" alt="">
            <h1>ShopIT</h1>
        </div>
        <ul class="nav">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../controller/ProductsController.php">Shop</a></li>
            <li><a href="../controller/ServicesController.php">Services</a></li>
            <li><a href="../controller/AboutUsController.php">About Us</a></li>
            <li><a href="../controller/CartController.php">Cart</a></li>
            <?php if(isset($_SESSION["userLoged"])):?>
                <li><a href="../controller/ProfileController.php">Profile</a></li>
                <?php else:?>
                    <li><a href="../controller/RegisterLoginController.php">Login</a></li>
            <?php endif?>
        </ul>
    </header>
    <main>
        <div class="container">
            <img src="view/src/Servidor_PC 2.png" alt="">
            <img src="view/src/Servidor_CPU 2.png" alt="">
        </div>
        <div class="container">
            <div class="containerC">
                <h3>Categories</h3>
                <div class="container">
                    <a class="" href="?select=all">All</a>
                    <a class="" href="?select=hardware">Hardware</a>
                    <a class="" href="?select=peripherals">Periphericals</a>
                    <a class="" href="?select=key caps">Key Caps</a>
                </div>
            </div>
            <div class="containerC">
                <h3>Order by</h3>
                <div class="container">
                    <a class="" href="<?= $_SERVER['REQUEST_URI']?>&price=des">Higher Price</a>
                    <a class="" href="<?= $_SERVER['REQUEST_URI']?>&price=asc">Lower Price</a>
                    <a class="" href="<?= $_SERVER['REQUEST_URI']?>&name=asc">A-Z</a>
                    <a class="" href="<?= $_SERVER['REQUEST_URI']?>&name=des">Z-A</a>
                </div>
            </div>
        </div>
        <div class="container" id="product_container">
            <?php foreach($products as $pro): ?>
                <div class="pCard">
                    <p><?= $pro->id;?></p>
                    <h2><?= $pro->name;?></h2>
                    <img src="data:image/jpeg;base64,<?=$pro->image; ?>" alt="image">
                    <p><?= $pro->description;?></p>
                    <p><?= $pro->price;?> $</p>
                    <p>Stock: <?= $pro->stock;?></p>
                    <p>Category: <?= $pro->x_category_id;?></p>
                    <a class="btn" href="../controller/AddToCartController.php?id=<?= $pro->id?>&type=<?= $pro->type?>">Add Cart +</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>