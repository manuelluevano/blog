<?php
include_once("../../includes/templates/header.php");

//  incluir la conexion a la base de datos 
require "../config/databases.php";
$db = conectarDB();

// var_dump($db);

?>

<body>

  <form action="" method="POST" enctype="multipart/form-data" class=" padding">

    <label for="">Tema:</label>
    <input type="text" name="tema" id="tema" class="">

    <label for="">Descripcion:</label>
    <textarea name="descripcion" id="descripcion" cols="30" rows="10" class=""></textarea>

    <div class="files">

      <label for="">Documentos:</label>
      <input type="file" class="" id="archivo[]" name="archivo[]" multiple="">


      <label for="">Imagenes:</label>
      <input type="file" class="" id="archivo[]" name="archivo[]" multiple="">

    </div>

    <label for="">Fecha de Envio</label>
    <input type="text" disabled value="20/04/1999">

    <input type="submit" value="Enviar Datos" class="btn">


  </form>

</body>

<?php
include_once("../../includes/templates/footer.php");
?>