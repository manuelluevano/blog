<?php
include_once("../../includes/templates/header.php");

//  incluir la conexion a la base de datos 
require "../config/database.php";
$db = conectarDB();
?>

<body>

    <div class="contenedor padding">


        <a class=" btn info" href="AndroidTemas.php">Ir a Temas</a>
        <a class="btn info" href="FormCreatePost.php">Crear Tema</a>

    </div>


    <!-- traer imagen minimizada -->
    <!-- <picture>
  <source
    srcset="../../build/img/WhatsApp Image 2022-04-07 at 11.57.38 AM.avif"
    type="image/avif"
  />
  <source
    srcset="../../build/img/WhatsApp Image 2022-04-07 at 11.57.38 AM.webp"
    type="image/webp"
  />
  <img
    loading="lazy"
    src="../../build/img/WhatsApp Image 2022-04-07 at 11.57.38 AM.jpeg"
    alt=""
  />
</picture> -->



</body>


<?php
include_once("../../includes/templates/footer.php");
?>