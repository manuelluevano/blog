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


  // Sanitizar las entradas de datos
  $tema = mysqli_real_escape_string($db, $_POST['tema']);

  $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);



  $archivo = $_FILES['archivo'];
  $imagen = $_FILES['imagen'];


  echo "<pre>";
  var_dump($archivo);
  echo "</pre>";



  //validar formualrio
  if (!$tema) {
    $errores[] = "El tema es obligatorio";
  }
  if (!$descripcion) {
    $errores[] = "la descripcion es obligatoria";
  }




  // revisar que el arreglo de errores este vacio
  if (empty($errores)) {

    // SUBIDA DE ARCHIVOS

    // CREAR CARPETA PARA GUARDAR ARCHIVOS
    $carpetaImagenes = '../../imagenes/';

    if (!is_dir($carpetaImagenes)) {
      mkdir($carpetaImagenes);
    }

    // RECORRER EL ARRAY 'tmp_name' PARA GUARDAR TODOS LOS ARCHIVOS


    // GENERAR UN NOMBRE UNICO A LAS IMAGENES
    $nombreImagen = md5(uniqid(rand(), true));

    var_dump($nombreImagen);

    // SUBIR LA IMAGEN
    move_uploaded_file($archivo['tmp_name'], $carpetaImagenes . $nombreImagen . '.jpg');



    // insertar en la base de datos
    $query = "INSERT INTO android (tema, descripcion, fecha) VALUES ('$tema', '$descripcion','$fecha')";

    // probar el query
    echo $query;

    $resultado = mysqli_query($db, $query);

    if ($resultado) {


      // redireccionar
      header('Location: /index.php?resultado=1');
    }
  }
}

?>

<body>

  <div class="padding">
    <a href="/" class="btn">Regresar</a>
  </div>

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
        <input type="file" class="" id="archivo" name="archivo" multiple="" name="archivo">


        <label for="">Imagenes:</label>
        <input type="file" class="" id="imagen" name="imagen" multiple="" name="imagen">

      </div>

      <label for="">Fecha de Envio</label>
      <input type=" text" disabled name="fecha" value="<?php echo $fecha ?>">

      <input type="submit" value="Enviar Datos" class="btn">
    </fieldset>


  </form>

</body>

<?php
include_once("../../includes/templates/footer.php");
?>