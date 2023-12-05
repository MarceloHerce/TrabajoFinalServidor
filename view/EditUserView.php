<?php 

if(!isset($user)){
    header("Location: ../controller/ProfileCotroller.php");
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
    <title>Edit Profile</title>
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
    <div id="update" class="container">
        <h3 class="">Edit User</h3>
        <form id="updateForm" class="" action="../controller/EditUserDataController.php" method="post">
            <fieldset class="" id="register-card">

                <div class=" ">
                    <label for="username" class=" ">Username:</label>
                    <div class=" ">
                        <input type="text" id="username" class=" " name="username" required />
                    </div>
                </div>

                <div class=" ">
                    <label for="mail" class=" ">Email:</label>
                    <div class=" ">
                        <div class="">
                            <div class=" ">@</div>
                        </div>
                        <input type="email" id="mail" class=" " name="mail"
                            pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" />
                    </div>
                </div>

                <div class=" ">
                    <label for="password" class=" ">Password:</label>
                    <div class=" ">
                        <input type="password" id="password" class=" " name="password" required
                            title="Debe contener al menos un número y una mayúscula y una minúscula, y al menos 8 o más carácteres" />
                    </div>
                </div>

                <div class=" ">
                    <label for="address" class=" ">Address:</label>
                    <div class=" ">
                        <input type="text" id="address" class=" " name="address" required />
                    </div>
                </div>

                <div class=" ">
                    <label for="floor" class=" ">Floor:</label>
                    <div class=" ">
                        <input type="text" id="floor" class="" name="floor" required />
                    </div>
                </div>

                <div class="">
                    <label for="phone" class="">Phone:</label>
                    <div class=" ">
                        <input type="tel" id="phone" class="" name="phone" required />
                    </div>
                </div>

                <div class="">
                    <input  class="" type="submit" value="Edit User" name="submit"/>
                </div>

            </fieldset>
        </form>
    </div>
</body>
</html>