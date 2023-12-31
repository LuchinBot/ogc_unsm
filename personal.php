<?php
$title = "Personal | OGC";
include "public/layouts/header.php";
$active3 = "active";
$stmt = $base->prepare('select * from personal as p
inner join persona_natural as pn on (pn.idpersona_natural=p.idpersona_natural)
inner join cargo as c on (c.idcargo=p.idcargo) where p.estado = 1');
$data = $stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_OBJ);

$stmt = $base->prepare('select * from nosotros ');
$data2 = $stmt->execute();
$data2 = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php include "public/layouts/navbar.php"; ?>
<div class="container-flui" style="background-color: #F3F5FA;">


    <div class="container py-5 justify-content-center align-items-center">
        <div class="col text-center pt-2">
            <span class="my-3 px-5 rounded text-white personal-title">Staff de Profesionales</span>
        </div>
        <div class="col mt-5 pt-5">
            <div class="container mt-5 text-center">
                <div class="row flex-wrap">
                    <?php foreach ($data as $v1) : ?>
                        <div class="col-md-3 p-3">
                            <div class="personal p-3 bg-white">
                                <div class="profile">
                                    <img src="<?= $url . $v1->foto ?>" class="bg-white">
                                    <p style="overflow-wrap: anywhere; text-transform: capitalize;"><?= $v1->nombres . ' ' . $v1->apellidos ?></p>
                                    <span><?= $v1->descripcion ?></span>
                                </div>
                                <div class="social">
                                    <div class="links" name="<?= $v1->idpersonal ?>">
                                        <div class="a-links" style="display: none;" id="<?= $v1->idpersonal ?>">
                                            <a href="<?= $v1->facebook ?>" target="_blank" class="d-flex text-white"><i class="fa-brands fa-facebook mb-2"></i></a>
                                            <a href="<?= $v1->linkedin ?>" target="_blank" class="d-flex text-white"><i class="fa-brands fa-linkedin"></i></a>
                                        </div>
                                        <div class="i-links"><i class="fa-solid fa-share-nodes"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-5" style="background-color: #fff;margin-top:-100px !important">
    <div class="container">
        <div class="col text-center">
            <span class="my-3 px-5 rounded text-white personal-title">Nuestro Ogranigrama</span>
        </div>
        <div class="col mt-5 pt-5">
            <img src="<?= $url . $data2['organigrama'] ?>" style="width: 100%;">
        </div>
    </div>
</div>
<?php include "public/layouts/footer.php"; ?>
<?php include "public/layouts/scripts.php"; ?>