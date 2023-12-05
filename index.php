<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/style.css">
    <script type="text/javascript" src="view/js/main.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="icon" href="view/src/Logo.ico" type="image/x-icon">
    <link rel="shortcut icon" href="view/src/Logo.ico" type="image/x-icon">
    <title>ShopIT</title>
</head>
<body>
    <header>
        <div>
            <img src="view/src/Logo.png" alt="">
            <h1>ShopIT</h1>
        </div>
        <ul class="nav">
            <li><a href="#">Home</a></li>
            <li><a href="controller/ProductsController.php?select=all">Shop</a></li>
            <li><a href="controller/ServicesController.php">Services</a></li>
            <li><a href="controller/AboutUsController.php">About Us</a></li>
            <li><a href="controller/CartController.php">Cart</a></li>
            <?php if(isset($_SESSION["usuario"])):?>
                <li><a href="controller/ProfileController.php">Profile</a></li>
                <?php else:?>
                    <li><a href="controller/RegisterLoginController.php">Login</a></li>
            <?php endif?>
        </ul>
    </header>
    <main>
        <div class="index_img">
            <img src="view/src/Servidor_PC 2.png" alt="">
            <img id="cpuIndex" src="view/src/Servidor_CPU 2.png" alt="">
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>