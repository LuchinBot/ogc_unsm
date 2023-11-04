<?php
$title = "OGC | UNSM";
?>
<?php include "../../layouts/header_admin.php"; ?>
<?php include "../../layouts/navbar_admin.php"; ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h4 class="m-0" style="font-weight: 700; color: #5B627D">Nuestras Noticias</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= $url ?>public/view/admin/noticias">Inicio</a></li>
            <li class="breadcrumb-item active">Noticias</li>
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
        En esta sección podrás editar las noticias de la empresa, cualquier cambio estará bajo su responsabilidad.
        <a href="<?= $url ?>public/view/noticias" target="_blank" class="font-weight-bold">Visualizar cambios <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
      </p>

      
    </div>
  </section>
</div>
<script>
  $(document).ready(function() {
    $('#summernote').summernote();
  });
</script>
<?php include "../../layouts/footer_admin.php"; ?>
<?php include "../../layouts/scripts.php"; ?>