<?php
include_once("includes/templates/header.php");

//  incluir la conexion a la base de datos 
require "includes/config/database.php";
$db = conectarDB();

// CREAR QUERY
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $tema = $_POST['tema'];

    // Sanitizar las entradas de datos
    $tema = mysqli_real_escape_string($db, $_POST['tema']);


    // insertamos el tema a la base de datos
    $query = "INSERT INTO temas (tema) VALUES ('$tema')";


    // probar el query
    // echo $query;

    // echo $queryImagenes;


    $resultado = mysqli_query($db, $query);

    if ($resultado) {


        // redireccionar
        header('Location: /index.php?resultado=1');
    }
}


?>


<form action="" method="POST" class="padding">

    <fieldset>

        <h3>Crear Nueva Seccion</h3>

        <label for="">Seccion Nueva:</label>
        <input type="text" name="tema" id="" class="" value="">

        <input type="submit" value="Crear" class="btn correct">
    </fieldset>


</form>


<?php
include_once("includes/templates/footer.php");
?>