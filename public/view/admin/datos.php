<?php
$title = "OGC | UNSM";
include "../../layouts/header_admin.php";

if (isset($_POST['update'])) {
  $a = $_POST['titulo'];
  $b = $_POST['descripcion'];
  $c = $_POST['mision'];
  $d = $_POST['vision'];


  if ($_FILES['portada_1']['name'] != "") {

    //Subir la imagen al servidor
    $imagen = "../../../src/img/uploads/" . $_FILES['portada_1']['name'];
    $imagenUrl = "src/img/uploads/" . $_FILES['portada_1']['name'];
    move_uploaded_file($_FILES['portada_1']['tmp_name'], $imagen);

    $stmt = $base->prepare('UPDATE empresa SET
                            titulo = ?,
                            descripcion=?,
                            mision = ?,
                            vision=?,
                            portada_1=?
                            WHERE idempresa = 1');
    $result = $stmt->execute(array(
      $a,
      $b,
      $c,
      $d,
      $imagenUrl
    ));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

  } 
  if ($_FILES['portada_2']['name'] != "") {
    $imagen = "../../../src/img/uploads/" . $_FILES['portada_2']['name'];
    $imagenUrl = "src/img/uploads/" . $_FILES['portada_2']['name'];
    move_uploaded_file($_FILES['portada_2']['tmp_name'], $imagen);

    $stmt = $base->prepare('UPDATE empresa SET
                            titulo = ?,
                            descripcion=?,
                            mision = ?,
                            vision=?,
                            portada_2=?
                            WHERE idempresa = 1');
    $result = $stmt->execute(array(
      $a,
      $b,
      $c,
      $d,
      $imagenUrl
    ));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

  } 
  if ($_FILES['slider_1']['name'] != "") {
    $imagen = "../../../src/img/uploads/" . $_FILES['slider_1']['name'];
    $imagenUrl = "src/img/uploads/" . $_FILES['slider_1']['name'];
    move_uploaded_file($_FILES['slider_1']['tmp_name'], $imagen);

    $stmt = $base->prepare('UPDATE empresa SET
                            titulo = ?,
                            descripcion=?,
                            mision = ?,
                            vision=?,
                            slider_1=?
                            WHERE idempresa = 1');
    $result = $stmt->execute(array(
      $a,
      $b,
      $c,
      $d,
      $imagenUrl
    ));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

  } 
  if ($_FILES['slider_2']['name'] != "") {
    $imagen = "../../../src/img/uploads/" . $_FILES['slider_2']['name'];
    $imagenUrl = "src/img/uploads/" . $_FILES['slider_2']['name'];
    move_uploaded_file($_FILES['slider_2']['tmp_name'], $imagen);

    $stmt = $base->prepare('UPDATE empresa SET
                            titulo = ?,
                            descripcion=?,
                            mision = ?,
                            vision=?,
                            slider_2=?
                            WHERE idempresa = 1');
    $result = $stmt->execute(array(
      $a,
      $b,
      $c,
      $d,
      $imagenUrl
    ));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  }
  
  if($_FILES['portada_1']['name'] == "" && $_FILES['portada_2']['name'] == "" && $_FILES['slider_1']['name'] == "" && $_FILES['slider_2']['name'] == ""){
    $stmt = $base->prepare('UPDATE empresa SET
                            titulo = ?,
                            descripcion=?,
                            mision = ?,
                            vision=?
                            WHERE idempresa = 1');
    $result = $stmt->execute(array(
      $a,
      $b,
      $c,
      $d,
    ));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
  }

  if ($result) {
    echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/datos";</script>';
  }
}

$stmt = $base->prepare('select * from empresa ');
$data = $stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<?php include "../../layouts/navbar_admin.php"; ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h4 class="m-0" style="font-weight: 700; color: #5B627D">Datos generales</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= $url ?>public/view/admin/datos">Inicio</a></li>
            <li class="breadcrumb-item active">Datos</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Main content -->
  <section class="content mb-5">
    <div class="container-fluid">
      <p class="text-secondary">
        <i class="fa fa-info-circle"></i>
        En esta sección podrás editar la información o datos generales de la empresa, cualquier cambio estará bajo su responsabilidad.
        <a href="<?= $url ?>public/view/nosotros" target="_blank" class="font-weight-bold">Visualizar cambios <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
      </p>

      <form method="post" class="bg-white p-4" enctype="multipart/form-data">
        <div class="form-group">
          <label>Titulo</label>
          <input type="text" name="titulo" class="form-control" value="<?= $data['titulo'] ?>" required>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label>Descripción</label>
            <textarea class="form-control" required name="descripcion" style="height:200px"><?= $data['descripcion'] ?></textarea>
          </div>
          <div class="form-group col-md-4">
            <label>Misión</label>
            <textarea class="form-control" required name="mision" style="height:200px"><?= $data['mision'] ?></textarea>
          </div>
          <div class="form-group col-md-4">
            <label>Visión</label>
            <textarea class="form-control" required name="vision" style="height:200px"><?= $data['vision'] ?></textarea>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Nosotros | Portada 1</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Imagen</span>
              </div>
              <div class="custom-file">
                <input type="file" accept="image/*" class="custom-file-input" name="portada_1">
                <label class="custom-file-label">Cargar imagen</label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label>Nosotros | Portada 2</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Imagen</span>
              </div>
              <div class="custom-file">
                <input type="file" accept="image/*" class="custom-file-input" name="portada_2">
                <label class="custom-file-label">Cargar imagen</label>
              </div>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Slider | 1</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Imagen</span>
              </div>
              <div class="custom-file">
                <input type="file" accept="image/*" class="custom-file-input" name="slider_1" >
                <label class="custom-file-label">Cargar imagen</label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-6">
            <label>Slider | 2</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">Imagen</span>
              </div>
              <div class="custom-file">
                <input type="file" accept="image/*" class="custom-file-input" name="slider_2" >
                <label class="custom-file-label">Cargar imagen</label>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" name="update" class="btn btn-success px-5"><i class="fa-solid fa-rotate me-3"></i> Actualizar</button>
      </form>
    </div>
  </section>
</div>
<script>/*
  $(document).ready(function() {
    $('#summernote').summernote();
  });*/
</script>
<?php include "../../layouts/footer_admin.php"; ?>
<?php include "../../layouts/scripts.php"; ?>