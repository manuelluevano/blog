<?php
include_once("includes/templates/header.php");

require "includes/config/database.php";
$db = conectarDB();

$resultado = $_GET['resultado'] ?? '';


// si la session no existe, la iniciamoss
if (!isset($_SESSION)) {
  // incluir las funciones
  require 'includes/templates/funciones.php';
  // autentica usuario
  $auth = usuaioAutenticado();
}


?>

<main>

  <div class="contenedor padding">


    <?php if (!$auth) : ?>
      <a class="btn info" href="login.php">Iniciar Sesion</a>
    <?php endif; ?>
    <?php if ($auth) : ?>

      <a class="btn info" href="includes/templates/FormCreatePost.php">Crear Tema</a>
    <?php endif; ?>

  </div>

  <?php
  if ($resultado === '1') : ?>
    <div class="mensaje">
      <p>Registro insertado correctamente</p>
    </div>
  <?php endif; ?>


</main>

<?php
include_once("includes/templates/footer.php");
?>