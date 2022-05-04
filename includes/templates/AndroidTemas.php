<?php
include_once("../../includes/templates/header.php");

//  incluir la conexion a la base de datos 
require "../config/database.php";
$db = conectarDB();


// ESCRIBIR EL QUERY DE INFO
$query = "SELECT * FROM info";


// CONSULTAR LA BASE DE DATOS
$resultado = mysqli_query($db, $query);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2 class="centrar">Temas</h2>
    <div class="temas contenedor">



        <?php
        while ($info = mysqli_fetch_assoc($resultado)) : ?>
            <div class="tema">

                <div class="tituloImagen">
                    <div class="img">

                        <img src="/imagenes/<?php echo $info['img'] ?>" alt="">

                    </div>
                    <div class="centrado">
                        <h4><?php echo $info['tema'] ?></h4>
                    </div>
                </div>


                <div class="footer">
                    <p><?php echo substr($info['descripcion'], 0, 100) . '...' ?></p>
                    <a class="btn info btn-large" href="view.php?id=<?php echo $info['id'] ?>">Ver Mas</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

</body>

</html>


<?php
include_once("../../includes/templates/footer.php");
?>