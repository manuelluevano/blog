<?php
include_once("../../includes/templates/header.php");


// si la session no existe, la iniciamoss
if (!isset($_SESSION)) {

  // incluir las funciones
  require 'funciones.php';

  // autentica usuario
  $auth = usuaioAutenticado();
}


if (!$auth) {
  header('Location: /login.php');
}



$usuaio = $_SESSION['usuario'];
$username = $_SESSION['username'];

//  incluir la conexion a la base de datos 
require "../config/database.php";
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
$seccion = '';

// Obteniendo la fecha actual con hora, minutos y segundos en PHP
$fecha = date('Y-m-d');

// CONSULTA, OBTENER LOS TEMAS CREADOS
$queryTemas = "SELECT * FROM temas";
$resultadoTemas = mysqli_query($db, $queryTemas);

// obtener el id de los temas creados
$query2 = "SELECT COUNT(id) AS id FROM info";
$resultadoId = mysqli_query($db, $query2);


// validar entrada de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


  // Sanitizar las entradas de datos
  $tema = mysqli_real_escape_string($db, $_POST['tema']);

  $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);

  $seccion = mysqli_real_escape_string($db, $_POST['seccion']);
  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre>";

  // exit;

  // $archivo = $_FILES['archivo']['tmp_name'];
  $imagen = $_FILES['imagen'];
  $archivo = $_FILES['archivo'];



  // echo "<pre>";
  // var_dump($archivo);
  // echo "</pre>";


  // echo "<pre>";
  // var_dump($imagen);
  // echo "</pre>";


  //validar formualrio
  if (!$tema) {
    $errores[] = "Tema obligatorio";
  }
  if (!$descripcion) {
    $errores[] = "Descripcion obligatoria";
  }
  if ($seccion == "Select") {
    $errores[] = "Seccion obligatoria";
  }




  // revisar que el arreglo de errores este vacio
  if (empty($errores)) {

    // SUBIDA DE ARCHIVOS

    // CREAR CARPETA PARA GUARDAR IMAGENES
    $carpetaImagenes = '../../imagenes/';
    // CREAR CARPETA PARA GUARDAR IMAGENES
    $carpetaDocumentos = '../../documentos/';

    if (!is_dir($carpetaImagenes)) {
      mkdir($carpetaImagenes);
    }

    if (!is_dir($carpetaDocumentos)) {
      mkdir($carpetaDocumentos);
    }
    // RECORRER EL ARRAY 'tmp_name' PARA GUARDAR TODOS LOS ARCHIVOS


    // GENERAR UN NOMBRE UNICO A LAS IMAGENES
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";



    var_dump($nombreImagen);



    // SUBIR LA IMAGEN
    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

    // SUBIR EL DOCUMENTO
    move_uploaded_file($archivo['tmp_name'], $carpetaDocumentos . $archivo['name']);

    $nombreDocumento = $archivo['name'];

    $var = 'info';

    //  INSETAR EN LA BASE DE DATOS LA INFORMACION
    $query = "INSERT INTO $var (tema, descripcion, fecha, img, documento, seccion) VALUES ('$tema', '$descripcion','$fecha', '$nombreImagen', '$nombreDocumento', '$seccion')";


    // probar el query
    echo $query;
    // exit;

    $resultado = mysqli_query($db, $query);

    // exit;


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

      <?php foreach ($resultadoId as $r) : ?>
        <h3>Tema Creado #: <?php echo $r['id'] ?> </h3>
      <?php endforeach; ?>


      <label for="">Usuario:</label>
      <input disabled type="info" name="user" id="tema" value="<?php echo $username ?>">


      <label for="">Tema:</label>
      <input type="text" name="tema" id="tema" class="" value="<?php echo $tema ?>">

      <label for="">Descripcion:</label>
      <textarea name="descripcion" id="mytextarea" cols="30" rows="10" class=""><?php echo $descripcion ?></textarea>

      <div class="files">

        <label for="">Documentos (WORD, EXCEL, PDF):</label>
        <input type="file" class="" id="archivo" name="archivo" name="archivo">

        <label for="">Imagen Portada</label>
        <input type="file" class="" id="imagen" name="imagen" name="imagen">

      </div>

      <label for="">Fecha de Envio:</label>
      <input type=" text" disabled name="fecha" value="<?php echo $fecha ?>">

      <label for="">Seccion:</label>
      <select name="seccion" id="">
        <?php foreach ($resultadoTemas as $temas) : ?>
          <option><?php echo $temas['tema'] ?></option>
        <?php endforeach; ?>
      </select>

      <input type="submit" value="Enviar Datos" class="btn correct">
    </fieldset>




  </form>

</body>

<?php
include_once("../../includes/templates/footer.php");
?>