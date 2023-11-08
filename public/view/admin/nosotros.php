<?php
$title_page = "Nosotros";
include "../../layouts/header_admin.php";

if (isset($_POST['update'])) {
  $a = $_POST['titulo'];
  $b = $_POST['descripcion_nosotros'];
  $c = $_POST['mision'];
  $d = $_POST['vision'];


  if (!empty($_FILES['portada']['name'])) {

    //Subir la imagen al servidor
    $imagen = "../../../src/img/uploads/" . $_FILES['portada']['name'];
    $imagenUrl = "src/img/uploads/" . $_FILES['portada']['name'];
    move_uploaded_file($_FILES['portada']['tmp_name'], $imagen);

    $stmt = $base->prepare('UPDATE nosotros SET titulo = ?, descripcion_nosotros=?,mision = ?, vision=?, portada=? WHERE idnosotros = 1');
    $result = $stmt->execute(array($a, $b, $c, $d, $imagenUrl));
  }
  if (!empty($_FILES['organigrama']['name'])) {
    $imagen = "../../../src/img/uploads/" . $_FILES['organigrama']['name'];
    $imagenUrl = "src/img/uploads/" . $_FILES['organigrama']['name'];
    move_uploaded_file($_FILES['organigrama']['tmp_name'], $imagen);

    $stmt = $base->prepare('UPDATE nosotros SET titulo = ?, descripcion_nosotros=?, mision = ?, vision=?, organigrama=? WHERE idnosotros = 1');
    $result = $stmt->execute(array($a, $b, $c, $d, $imagenUrl));
  }

  $stmt = $base->prepare('UPDATE nosotros SET titulo = ?, descripcion_nosotros=?, mision = ?,vision=? WHERE idnosotros = 1');
  $result = $stmt->execute(array($a, $b, $c, $d));
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($result) {
    echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/datos";</script>';
  }
}

$stmt = $base->prepare('select * from nosotros ');
$data = $stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<?php include "../../layouts/navbar_admin.php"; ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col-sm-6">
          <h5 class="m-0 text-dark" style="font-weight: 600;"><?= $title_page ?></h5>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= $url ?>public/view/admin/">Inicio</a></li>
            <li class="breadcrumb-item active"><?= $title_page ?></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Main content -->
  <section class="content me-2">
    <div class="container-fluid m-2 p-0 pb-2 bg-white">
      <p class="text-secondary bg-dark border-bottom px-4 py-2">
        <i class="fa fa-info-circle text-warning"></i>
        Todos los cambios los puedes verificar
        <a href="<?= $url ?>nosotros" target="_blank" class="font-weight-bold text-warning">aquí <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
      </p>

      <form method="post" id="validateForm" class="bg-white px-4 py-2" enctype="multipart/form-data" action="javascript: alert('submited')">
        <fieldset>
          <div class="form-group">
            <label>Titulo <span class="text-danger">*</span></label>
            <input type="text" name="titulo" class="form-control" value="<?= $data['titulo'] ?>" required title="Campo requerido">
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Descripción <span class="text-danger">*</span></label>
              <textarea class="form-control" minlength="50" maxlength="255" required title="Campo requerido" name="descripcion_nosotros" style="height:200px"><?= $data['descripcion_nosotros'] ?></textarea>
            </div>
            <div class="form-group col-md-4">
              <label>Misión <span class="text-danger">*</span></label>
              <textarea class="form-control" minlength="30" maxlength="255" required title="Campo requerido" name="mision" style="height:200px"><?= $data['mision'] ?></textarea>
            </div>
            <div class="form-group col-md-4">
              <label>Visión <span class="text-danger">*</span></label>
              <textarea class="form-control" minlength="30" maxlength="255" required title="Campo requerido" name="vision" style="height:200px"><?= $data['vision'] ?></textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <div class="mb-3">
                <label for="formFile1" class="form-label">Portada <span class="text-danger">*</span></label>
                <input class="form-control" accept="image/*" name="portada" type="file" id="formFile1">
              </div>
            </div>
            <div class="form-group col-md-6">
              <div class="mb-3">
                <label for="formFile2" class="form-label">Organigrama <span class="text-danger">*</span></label>
                <input class="form-control" accept="image/*" name="organigrama" type="file" id="formFile2">
              </div>
            </div>
          </div>
          <button type="submit" name="update" class="btn btn-success px-3 fw-bolder"><i class="fa-solid fa-rotate me-1"></i> Actualizar <?= $title_page ?></button>
        </fieldset>

      </form>
    </div>
  </section>
</div>
<script>
  /*
  $(document).ready(function() {
    $('#summernote').summernote();
  });*/
</script>
<?php include "../../layouts/footer_admin.php"; ?>
<?php include "../../layouts/scripts.php"; ?>