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

    <h2>Temas: </h2>

    <?php
    while ($info = mysqli_fetch_assoc($resultado)) : ?>
        <h4><?php echo $info['tema'] ?></h4>
        <a href="view.php?id=<?php echo $info['id'] ?>">Ver</a>
    <?php endwhile; ?>

</body>

</html>


<?php
include_once("../../includes/templates/footer.php");
?>