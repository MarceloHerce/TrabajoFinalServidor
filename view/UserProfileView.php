<?php 

if(!isset($user)){
    header("Location: ../controller/LoginFormController.php");
}
?>
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
    <title>Profile</title>
</head>
<body>
    <header>
        <div>
            <img src="../view/src/Logo.png" alt="">
            <h1>ShopIT</h1>
        </div>
        <ul class="nav">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../controller/ProductsController.php?select=all">Shop</a></li>
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
    <div class="containerC" id="profile_container">
        <div class="" style="">
            <div class="">
                <p class="">Username: <?= $user->user_name; ?></p>
                <p class="">Email: <?= $user->email; ?></p>
                <p class="">Phone: <?= $user->phone?></p>
                <p class="">Address: <?= $user->address; ?></p>
                <p class="">Floor: <?= $user->floor; ?></p>
            </div>
        </div>
        <a class="btn" href="../controller/EditUserDataController.php">Edit Profile</a>
        <a class="btn" href="../controller/LogoutController.php">Logout</a>
    </div>
    
    <div class="containerC" >
        <h3>Old Orders</h3>
        <div class="accordion">
            <?php foreach ($oldCarts as $cart): ?>
                <div class="accordion-item">
                    <input type="checkbox" id="cart<?= $cart->order_id ?>">
                    <label for="cart<?= $cart->order_id ?>" class="accordion-header">
                        <div class="header-content">
                            <p class="">Cart id: <?= $cart->order_id?></p>
                            <p class="">Date: <?= $cart->order_date?></p>
                        </div>
                    </label>
                    <div class="accordion-content">
                        <?php $totalPrice = 0; ?>
                        <?php foreach ($cart->items as $item): ?>
                            <?php $totalPrice+= $item["item"]->price*$item["quantity"]; ?>
                            <div class="pCard">
                                <div class=""><img src="data:image/jpeg;base64,<?= $item["item"]->image; ?>" class="card-img-top" alt="image"></div>
                                <div class="">
                                    <h5 class=""><?= $item["item"]->name; ?></h5>
                                    <p class=""><?= $item["item"]->description; ?></p>
                                    <p class=""><?= $item["item"]->price*$item["quantity"]."€" ?></p>
                                    <p class="">Quantity: <?= $item["quantity"]; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <p>Total Price: <?= $totalPrice."€" ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>