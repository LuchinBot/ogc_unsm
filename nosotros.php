<?php
$title = "Nosotros | OGC";
include "public/layouts/header.php"; 
$active2 = "active";

$stmt = $base->prepare('select * from nosotros ');
$data = $stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php include "public/layouts/navbar.php"; ?>

<div class="container d-flex py-3 justify-content-center align-items-center">
    <div class="col-6 pe-5">
        <p class="text-uppercase fs-6 text-secondary">Sobre nosotros</p>
        <h2 style="font-size: 50px !important; line-height: 1; font-weight: 800;color: #5B627D;word-wrap: break-word  "><?=$data['titulo']?></h2>
        <p class="mt-3" style="word-wrap: break-word "><?=$data['descripcion_nosotros']?></p>
        <a href="<?= $url ?>public/view/contactos" class="btn bg-success text-white px-5 py-2">
            <i class="fa-solid fa-circle-info me-2"></i> Más información
        </a>
    </div>
    <div class="col-6 p-5">
        <img src="<?= $url.$data['portada'] ?>" style="width: 100%;">
    </div>
</div>
<div class="container-fluid" style="background-color: #F3F5FA;">
    <div class="container py-2 text-center">
        <div class="row">
            <div class="col-md-6 col-ms-6 d-flex p-5">
                <div>
                    <img src="<?= $url ?>src/img/default/mision.png" class="my-3" style="width: 100px;">
                </div>
                <div class="ms-4 text-start">
                    <h4 style="font-weight: 600;color: #5B627D">Nuestra Misión</h4>
                    <p class="py-1" style="overflow-wrap: anywhere;"><?=$data['mision']?></p>
                </div>
            </div>
            <div class="col-md-6 col-ms-6 d-flex p-5">
                <div>
                    <img src="<?= $url ?>src/img/default/vision.png" class="my-3" style="width: 100px;">
                </div>
                <div class="ms-4 text-start">
                    <h4 style="font-weight: 600;color: #5B627D">Nuestra Visión</h4>
                    <p class="py-1" style="overflow-wrap: anywhere;"><?=$data['vision']?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "public/layouts/footer.php"; ?>
<?php include "public/layouts/scripts.php"; ?>