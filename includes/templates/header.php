<?php

// si la session no existe, la iniciamoss
if (!isset($_SESSION)) {
    session_start();
}

// si no existe la session, devolvemos false
$auth = $_SESSION['login'] ?? false;
$user = $_SESSION['usuario'] ?? '';
$username = $_SESSION['username'] ?? '';
$avatar =  $_SESSION['img'] ?? '';
// $avatar = $_SESSION['img'] ?? '';

// var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- font awesome -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../build/css/app.css" />
    <title>Blog</title>
</head>

<body>
    <!-- navegacion -->
    <header>
        <nav>
            <div class="enlaces">
                <a href="/">Inicio</a>
                <a href="includes/templates/android.php">Android</a>

            </div>
            <div class="login">
                <?php if ($username) : ?>

                    <a> <?php echo $username ?></a>
                    <div class="avatar">
                        <img src="/imagenes/7304577f718be53d536cf5c4bdceb8c9.jpg" alt="">
                    </div>
                <?php else : ?>
                    <a href="/login.php">Login</a>
                <?php endif; ?>
                <?php if ($auth) : ?>
                    <a class="sing-in" href="/cerrar-sesion.php">Sing in</a>
                <?php endif; ?>
            </div>

        </nav>
    </header>
    <script src="https://kit.fontawesome.com/04730c9c8a.js" crossorigin="anonymous"></script>