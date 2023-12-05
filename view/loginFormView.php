<?php

if(isset($_SESSION["usuario"])){
    header("Location: ../controller/ProfileController.php");
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

    <!-- Titulo -->
    <title>Login Register</title>

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
    <div class="container">
        <section class="">
            <div class="container">
                <ul class="nav">
                    <li class="">
                        <a href="" id="loginBtn"><h4>Login</h4></a>
                    </li>
                    <li class="">
                        <a href="" id="registerBtn"><h4>Registro</h4></a>
                    </li>
                </ul>
            </div>
            <div class="container">
                <!------------------------------------------ LOGIN ------------------------------------------>
                <div id="login" class="containerForm"> 
                    <?php if(isset($_SESSION["error_login"])):?>
                        <div class="">
                            <?php print_r($_SESSION["error_login"]); ?>
                        </div>
                    <?php endif ?>
                    <?php if(isset($_SESSION["errores"])) :?>
                        <?php foreach ($_SESSION["errores"] as $key => $value) :?>
                            <div class="">
                                <?= $value ?>
                            </div>
                        <?php endforeach ?>
                        <?php 
                            session_unset();
                        ?>
                    <?php endif ?>
                    
                    <?php if(isset($_SESSION["completado"])): ?>
                        <div class="">
                            Registro completado
                        </div>
                        <?php $_SESSION["completado"] = null; ?>
                    <?php endif ?>
                    <?php 
                        if(isset($_SESSION["error_login"])){
                            $_SESSION["error_login"] = null;
                        }
                        if(isset($_SESSION["errores"])){
                            session_unset();
                        }
                    ?>
                    <form action="../controller/LoginController.php" method="POST" class="">
                            
                            <div class="">
                                <label for="mail" class="">Email / User:</label>
                                <div class="">
                                    <input type="text" id="mail" class="" name="mail"/>
                                </div>
                            </div>

                            <div class="">
                                <label for="pass" class="">Password:</label>
                                <div class=" ">
                                    <input type="password" id="pass" class="" name="pass" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                                        title="It must contain at least one number and an uppercase and lowercase letter, and at least 8 or more characters"/>
                                </div>
                            </div>

                            <div class="">
                                <input id="sendBttn2" class="" type="submit" value="Send" name="submit"/>
                            </div>
                    </form>
                </div>
                <!-- REGISTER -->
                <div id="register" class="displayN">
                    <form action="../controller/RegisterController.php" method="POST" class="">
                            <div class="">
                                <label for="username" class="">Username:</label>
                                <div class=" ">
                                    <input type="text" id="username" class="" name="username" required />
                                </div>
                            </div>

                            <div class="">
                                <label for="mail" class="">Email:</label>
                                <div class="">
                                    <div class="">
                                        <div class="">@</div>
                                    </div>
                                    <input type="email" id="mail" class="" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required/>
                                </div>
                            </div>

                            <div class="">
                                <label for="password" class="">Password:</label>
                                <div class=" ">
                                    <input type="password" id="password" class="" name="password" required 
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                                    title="It must contain at least one number and an uppercase and lowercase letter, and at least 8 or more characters"/>
                                </div>
                            </div>

                            <div class="">
                                <label for="address" class="">Address:</label>
                                <div class=" ">
                                    <input type="text" id="address" class="" name="address" required />
                                </div>
                            </div>

                            <div class="">
                                <label for="phone" class="">Phone:</label>
                                <div class=" ">
                                    <input type="tel" id="phone" class="" name="phone" required/>
                                </div>
                            </div>

                            <div class="">
                                <label for="floor" class=" ">Floor:</label>
                                <div class="">
                                    <input type="text" id="floor" class="" name="floor" required />
                                </div>
                            </div>

                            <div class="">
                                <input id="sendBttn" class="" type="submit" value="Send" name="submit"/>
                            </div>
                    </form>
                </div>
            </div>
            
        </section>
    </div>          
    
</body>

</html>