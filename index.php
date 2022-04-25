<?php
include_once("includes/templates/header.php");


$resultado = $_GET['resultado'] ?? '';

?>

<main>


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