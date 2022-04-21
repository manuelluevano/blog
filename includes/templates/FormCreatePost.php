<?php
include_once("../../includes/templates/header.php");
?>

<body>

  <form action="" method="POST" enctype="multipart/form-data">
    <label for="">Ingresar Tema</label>
    <input type="text">
    <textarea name="" id="" cols="30" rows="10" placeholder="Informacion acerca del tema"></textarea>

    <div class="form-group">
      <label class="col-sm-2 control-label">Archivos</label>
      <div class="col-sm-8">
        <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
      </div>

      <button type="submit" class="btn btn-primary">Cargar</button>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Imagenes</label>
      <div class="col-sm-8">
        <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
      </div>

      <button type="submit" class="btn btn-primary">Cargar</button>
    </div>

  </form>

</body>

<?php
include_once("../../includes/templates/footer.php");
?>