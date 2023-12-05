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
    <title>Document</title>
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
    <?php 
    require_once("../connection/Connection.php");
    require_once("../model/orderImpl.php");    
    ?>

    <?php if (isset($_COOKIE['cartCokie'])):?>
        <?php
            $decodedData = unserialize(base64_decode($_COOKIE['cartCokie']));
            $items = [];
            foreach($decodedData as $item){
                if($item["type"] == 1){
                    $prod = selectProductById($pdo, $item["id"]);
                    $item = [
                        "item"=>$prod,
                        "quantity"=>$item["quantity"]
                    ];
                    array_push($items, $item);
                } else {
                    $serv = selectServiceById($pdo, $item["id"]);
                    $item = [
                        "item"=>$serv,
                        "quantity"=>$item["quantity"]
                    ];
                    array_push($items, $item);
                }
            }
        ?>
    <?php else:?>
        <div class="container">
            <h4>The cart is empty 😅</h4>
            <a href="../controller/ProductsController.php?select=all"><h4>Buy something!!</h4></a>
        </div>
    <?php endif?>
    <!-- View Cart Items -->
    
        <div class="containerC">
            <?php if (isset($_COOKIE['cartCokie'])): ?>
                <?php $totalPrice = 0;?>
                    <?php foreach ($items as $item): ?>
                        <?php
                            $pro = $item["item"];
                            $totalPrice+= $item["quantity"]*$pro->price;
                        ?>
                        <div class="container">
                            <div class="pCard" >
                                <div class=""><img src="data:image/jpeg;base64,<?= $pro->image?>" class="card-img-top" alt="image"></div>
                                
                                <div class="containerC">
                                    <h3 class=""><?= $pro->name; ?></h3>
                                    <p class=""><?= $pro->description; ?></p>
                                    <p class=""><?= $pro->price*$item["quantity"]."€" ?></p>
                                    <p class=""><?= "Quantity: ".$item["quantity"] ?></p>
                                    <a class="btn" href="../controller/CartController.php?id=<?= $pro->id?>&type=<?= $pro->type?>">X</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <p><?= "Total price: ".$totalPrice."€"?></p>
                    <div class="container">
                        <a class="btn" href="../controller/CartController.php?empty">Empty Cart</a>
                        <a class="btn" href="../controller/InsertCartController.php">Checkout</a>
                    </div>
                    
            <?php endif ?>
        </div>
    
</body>
</html>