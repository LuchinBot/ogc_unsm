<?php
$title_page = "Inicio";
?>
<?php include "../../layouts/header_admin.php"; ?>
<?php include "../../layouts/navbar_admin.php"; ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0" style="font-weight: 700; color: #5B627D">Ventana Principal</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= $url ?>public/view/admin">Inicio</a></li>
            <li class="breadcrumb-item active">Null</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <p class="text-secondary">Bienvenido al sistema principal de la Oficina de Gestión de la Calidad de la Universidad Nacional de San Martín.</p>
    </div>
  </section>
</div>
<?php include "../../layouts/footer_admin.php"; ?>
<?php include "../../layouts/scripts.php"; ?>