<?php
$title = "OGC | UNSM";
$active1 = "active";
$active2 = "";
$active3 = "";
include "public/layouts/header.php";

$stmt = $base->prepare('select * from nosotros ');
$data = $stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $base->prepare('select * from enlace where estado_enlace = 1');
$data2 = $stmt->execute();
$data2 = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
<?php include "public/layouts/navbar.php"; ?>

<section class="h-100 mb-3">
    <div class="container-fluid p-0">
        <div id="carouselExampleInterval" class="carousel slide carousel-fade slider" data-bs-ride="carousel" style="height: 450px; overflow: hidden;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= $url ?>src/img/default/slider1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" >
                    <img src="<?= $url?>src/img/default/slider2.jpg"  class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
<section class="mt-5">
    <div class="container d-flex col-12">
        <div class="col-8 pe-5">
            <h4 class="text-success fw-bold">Noticias</h4>
            <hr class="text-secondary">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex gap-1 me-1">
                            <div class="col-6 border d-flex justify-content-center align-items-center" style="height:200px;box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;">
                                <a href="https://enlinea.sunedu.gob.pe/">
                                    <div class="w-100 bg-white py-3 fw-bold text-success">
                                        <span>Noticia 1.1</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 border d-flex justify-content-center align-items-center" style="height:200px;box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;">
                                <a href="https://enlinea.sunedu.gob.pe/">
                                    <div class="w-100 bg-white py-3 fw-bold text-success">
                                        <span>Noticia 2</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex gap-1 me-1">
                            <div class="col-6 border d-flex justify-content-center align-items-center" style="height:200px;box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;">
                                <a href="https://enlinea.sunedu.gob.pe/">
                                    <div class="w-100 bg-white py-3 fw-bold text-success">
                                        <span>Noticia 3</span>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 border d-flex justify-content-center align-items-center" style="height:200px;box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;">
                                <a href="https://enlinea.sunedu.gob.pe/">
                                    <div class="w-100 bg-white py-3 fw-bold text-success">
                                        <span>Noticia 4</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <i class="carousel-control-prev-icon text-secondary fa fa-angle-left fs-1" aria-hidden="true"></i>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <i class="carousel-control-next-icon text-secondary fa fa-angle-right fs-1" aria-hidden="true"></i>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-4">
            <h4 class="text-success fw-bold d-flex justify-content-between">
                <span>Próximos Eventos</span>
                <span><a href="#"><i class="fa fa-plus text-success fs-6"></i></a></span>
            </h4>
            <hr class="text-secondary">
            <ul class="events m-0 p-0" style="list-style:none">
                <li class="event mb-2">
                    <a href="#" class="d-flex border rounded p-1">
                        <div class="d-flex text-dark p-2 flex-column justify-content-center align-items-center border text-center" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">
                            <span style="font-size:30px">12</span>
                            <span>Noviembre</span>
                        </div>
                        <div class="card-text ps-4 text-secondary" style="font-size:15px">
                            <p>Simposio Internacional "La Calidad de la Educación Universitaria en debate: Licenciamiento y Acreditación"</p>
                        </div>
                    </a>
                </li>
                <li class="event mb-2">
                    <a href="#" class="d-flex border rounded p-1">
                        <div class="d-flex text-dark p-2 flex-column justify-content-center align-items-center border text-center" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">
                            <span style="font-size:30px">12</span>
                            <span>Noviembre</span>
                        </div>
                        <div class="card-text ps-4 text-secondary" style="font-size:15px">
                            <p>Simposio Internacional "La Calidad de la Educación Universitaria en debate: Licenciamiento y Acreditación"</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid my-4 py-1 p-0" style="background: #00C564">
        <div class="container py-4">
            <h4 class="text-white">Enlaces de interés</h4>
            <hr class="text-white">
            <div class="container text-center p-0">
                <div class="row flex-wrap">
                    <?php foreach($data2 as $v1):?>
                        <div class="col-md-4 p-2">
                        <div class="col rounded">
                            <a href="<?=$v1->url_enlace?>" target="_blank">
                                <div class="w-100 bg-white py-3 fw-bold text-success">
                                    <?=$v1->icono_enlace?>
                                    <span><?=$v1->titulo_enlace?></span>
                                </div>
                            </a>
                        </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>

</section>
<?php include "public/layouts/footer.php"; ?>
<?php include "public/layouts/scripts.php"; ?>