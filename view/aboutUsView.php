<?php 
include_once("../connection/Connection.php");

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
    <title>About Us</title>
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
            <?php if(isset($_SESSION["usuario"])):?>
                <li><a href="../controller/ProfileController.php">Profile</a></li>
                <?php else:?>
                    <li><a href="../controller/RegisterLoginController.php">Login</a></li>
            <?php endif?>
        </ul>
    </header>
    <div class="containerC" id="aboutUsText">
        <h3>Navigating Tomorrow's Tech Today, with ShopIT</h3>
        <div>
            <h2>Your Tech Journey Begins </h2>
            <div class="j-text">
                <p>
                    At ShopIT, we believe in  constant innovation 
                    and exceeding  expectations. We strive to be 
                    industry  leaders in technology, providing 
                    solutions  that make a difference. 
                </p>
                <p>
                    Transparency, reliability, and commitment 
                    to customer satisfaction are the 
                    cornerstones of our company.
                </p>
                <p>
                    Whether you're a tech enthusiast, a creative 
                    professional, or a business owner, we have the 
                    right tools to enhance your digital experience.
                </p>
            </div>
        </div>
    </div>
    <div class="container" id="employees_container">
        <?php foreach($employees as $emp): ?>
            <div class="pCard">
                <h2><?= $emp->emp_name;?></h2>
                <img src="data:image/jpeg;base64,<?=$emp->image; ?>" alt="image" id="aboutUsImg">
                <h3><?= $emp->job_title;?></h3>
                
            </div>
        <?php endforeach; ?>
    </div>
    
    <form class="containerForm"action="../model/enviarCorreo.php" method="post">
        <label for="nombre">Name:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="mensaje">Text:</label>
        <textarea id="mensaje" name="mensaje" maxlength="155" required></textarea>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>