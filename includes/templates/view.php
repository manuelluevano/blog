<?php
include_once("../../includes/templates/header.php");

//  incluir la conexion a la base de datos 
require "../config/database.php";
$db = conectarDB();

// ESCRIBIR EL QUERY DE INFO
$query = "SELECT * FROM info WHERE id = " . $_GET['id'];
$query2 = "SELECT * FROM imagenes WHERE id = " . $_GET['id'];
$query3 = "SELECT * FROM documentos WHERE id = " . $_GET['id'];



// CONSULTAR LA BASE DE DATOS
$resultado = mysqli_query($db, $query);
$resultado2 = mysqli_query($db, $query2);
$resultado3 = mysqli_query($db, $query3);


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
    <div class="contenedor view">

        <?php foreach ($resultado as $r) : ?>
            <div class="encabezado">
                <p>Creacion post: <?php echo $r['fecha'] ?></p>
            </div>
            <h2><?php echo $r['tema'] ?></h2>
            <p><?php echo $r['descripcion'] ?></p>

        <?php endforeach; ?>

        <div class="documentos">

            <?php foreach ($resultado2 as $r2) : ?>
                <img src="/imagenes/<?php echo $r2['imagen'] ?>" alt="NO HAY IMAGEN">
            <?php endforeach; ?>

            <?php foreach ($resultado3 as $r3) : ?>

                <a href="/documentos/<?php echo $r3['documento'] ?>" download=""><i class="fa fa-file-text" aria-hidden="true">
                        <p>Ver Documentos</p>
                    </i>
                </a>
            <?php endforeach; ?>

        </div>
    </div>

</body>

</html>

<?php
include_once("../../includes/templates/footer.php");
?>