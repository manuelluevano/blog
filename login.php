<?php
include_once("includes/templates/header.php");

//  incluir la conexion a la base de datos 
require "includes/config/database.php";
$db = conectarDB();

// variables globales 
$email = '';
$password = '';


// validar formulario (no se encuentre vacio)
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {




    // SANITIZAMOS LAS ENTRADAS DE DATOS
    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));

    // si no se escribe el correo correctamente, devulve 'false'
    // var_dump($email);


    $password = mysqli_real_escape_string($db, $_POST['password']);


    // VALIDAMOS QUE LOS INPUTS TENGAN DATOS
    if (empty($email)) {
        $errores['email'] = 'El email es obligatorio';
    }
    if (empty($password)) {
        $errores['password'] = 'El password es obligatorio';
    }


    if (empty($errores)) {
        // revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($db, $query);

        // var_dump($resultado);

        // exit;

        if ($resultado->num_rows) {
            // VALIDAR QUE LA CONTRASENA SEA CORRECTA
            $usuario = mysqli_fetch_assoc($resultado);
            // var_dump($usuario);

            $auth = password_verify($password, $usuario['password']);

            if ($auth) {
                // USUARIO AUTENTICADO
                session_start();

                // llenar el arreglo de la sesion
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['img'] = $usuario['img'];
                $_SESSION['username'] = $usuario['username'];
                $_SESSION['login'] = true;

                header('Location: /');
            } else {
                // USUARIO NO AUTENTICADO
                $errores[] = 'El email o password son incorrectos';
            }
        } else {
            $errores[] = 'El usuario no existe';
        }
    }
}


?>



<body>
    <div class="padding">
        <a href="/" class="btn info">Regresar</a>
    </div>

    <?php foreach ($errores as $error) : ?>
        <div class="error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>

    <form action="" method="POST" class="padding">

        <fieldset>

            <label for="">Email:</label>
            <input type="text" name="email" value="<?php
                                                    echo $email;
                                                    ?>">


            <label for="">Password:</label>
            <input type="password" name="password" value="<?php echo $password
                                                            ?>">


            <input type="submit" value="Iniciar Sesion" class="btn correct">
        </fieldset>




    </form>
</body>


<?php
include_once("includes/templates/footer.php");
?>