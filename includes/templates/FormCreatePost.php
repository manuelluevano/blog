<?php
include_once("../../includes/templates/header.php");

//  incluir la conexion a la base de datos 
require "../config/databases.php";
$db = conectarDB();

// var_dump($db);

// echo "<pre>";
// var_dump($_SERVER);
// echo "</pre>";

// validar formulario (no se encuentre vacio)
$errores = [];

// variables globales 
$tema = '';
$descripcion = '';
// Obteniendo la fecha actual con hora, minutos y segundos en PHP
$fecha = date('Y-m-d');




// validar entrada de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // echo "<pre>";
  // var_dump($_SERVER);
  // echo "</pre>";

  $tema = $_POST['tema'];
  $descripcion = $_POST['descripcion'];


  //validar formualrio
  if (!$tema) {
    $errores[] = "El tema es obligatorio";
  }
  if (!$descripcion) {
    $errores[] = "la descripcion es obligatoria";
  }



  // echo "<pre>";
  // var_dump($errores);
  // echo "</pre>";

  // exit;

  // revisar que el arreglo de errores este vacio
  if (empty($errores)) {
    // insertar en la base de datos
    $query = "INSERT INTO android (tema, descripcion, fecha) VALUES ('$tema', '$descripcion','$fecha')";

    // probar el query
    echo $query;

    $resltado = mysqli_query($db, $query);

    if ($resltado) {
      echo "Datos insertados correctamente";
    }
  }
}

?>

<body>

  <a href="/" class="btn">Regresar</a>

  <?php foreach ($errores as $error) : ?>
    <div class="error">
      <?php echo $error ?>
    </div>
  <?php endforeach; ?>


  <form action="" method="POST" enctype="multipart/form-data" class="padding">

    <fieldset>

      <label for="">Tema:</label>
      <input type="text" name="tema" id="tema" class="" value="<?php echo $tema ?>">

      <label for="">Descripcion:</label>
      <textarea name="descripcion" id="descripcion" cols="30" rows="10" class=""><?php echo $descripcion ?></textarea>

      <div class="files">

        <label for="">Documentos:</label>
        <input type="file" class="" id="archivo[]" name="archivo[]" multiple="">


        <label for="">Imagenes:</label>
        <input type="file" class="" id="archivo[]" name="archivo[]" multiple="">

      </div>

      <label for="">Fecha de Envio</label>
      <input type="text" name="fecha" value="<?php echo $fecha ?>">

      <input type="submit" value="Enviar Datos" class="btn">
    </fieldset>


  </form>

</body>

<?php
include_once("../../includes/templates/footer.php");
?>