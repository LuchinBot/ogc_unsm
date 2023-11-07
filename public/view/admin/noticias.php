<?php
$title_page = "Noticias";
include "../../layouts/header_admin.php";


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
        <a href="<?= $url ?>public/view/nosotros" target="_blank" class="font-weight-bold text-warning">aquí <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
      </p>


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