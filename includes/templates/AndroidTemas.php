<?php
include_once("../../includes/templates/header.php");

//  incluir la conexion a la base de datos 
require "../config/database.php";
$db = conectarDB();


// ESCRIBIR EL QUERY DE INFO
$query = "SELECT * FROM info";
$query2 = "SELECT * FROM imagenes";


// CONSULTAR LA BASE DE DATOS
$resultado = mysqli_query($db, $query);
$resultado2 = mysqli_query($db, $query2);



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

                        <!-- insertamos las imagenes de la otra tabla  -->
                        <?php $info2 = mysqli_fetch_assoc($resultado2)  ?>

                        <img src="/imagenes/<?php echo $info2['imagen'] ?>" alt="">

                    </div>
                    <div class="centrado">
                        <h4><?php echo $info['tema'] ?></h4>
                    </div>
                </div>


                <div class="footer">
                    <p><?php echo substr($info['descripcion'], 0, 50) . '...' ?></p>
                    <a class="btn info" href="view.php?id=<?php echo $info['id'] ?>">Ver Mas</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

</body>

</html>


<?php
include_once("../../includes/templates/footer.php");
?>