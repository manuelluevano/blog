<?php
include_once("includes/templates/header.php");

//  incluir la conexion a la base de datos 
require "includes/config/database.php";
$db = conectarDB();

// CREAR email Y CONTRASEÑA
$email = "Manuel.99";
$password = "12345678";

// HASHEAR PASSWORD USAMOS CHAR(60), YA QUE ES
// EL TAMANO EXACTO DEL HASH

$passwordHash = password_hash($password, PASSWORD_DEFAULT);


// QUERY PARA INSERTAR email Y CONTRASEÑA
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash')";




// INSERTAR EN LA BASE DE DATOS
$resultado = mysqli_query($db, $query);



?>




<?php
include_once("includes/templates/footer.php");
?>