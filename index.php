<?php
$title = "OGC | UNSM";
include "public/layouts/header.php";
$active1 = "active";

$stmt = $base->prepare('SELECT * from nosotros ');
$data = $stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = $base->prepare('SELECT * from enlace where estado_enlace = 1');
$data2 = $stmt->execute();
$data2 = $stmt->fetchAll(PDO::FETCH_OBJ);

$stmt = $base->prepare('SELECT * from carrusel where estado_carrusel = 1 order by idcarrusel asc limit 1');
$slider1 = $stmt->execute();
$slider1 = $stmt->fetch(PDO::FETCH_ASSOC);
if ($slider1) {
    $idcarrusel = $slider1['idcarrusel'];

    $stmt = $base->prepare('SELECT * from carrusel where estado_carrusel = 1 AND idcarrusel != ? ');
    $slider2 = $stmt->execute(array($idcarrusel));
    $slider2 = $stmt->fetchAll(PDO::FETCH_OBJ);
}

$stmt = $base->prepare('SELECT * from noticia where estado_noticia=1 order by idnoticia desc limit 2');
$noticia1 = $stmt->execute();
$noticia1 = $stmt->fetchAll(PDO::FETCH_OBJ);

$stmt = $base->prepare('SELECT * from noticia where estado_noticia=1 order by idnoticia asc limit 2');
$noticia2 = $stmt->execute();
$noticia2 = $stmt->fetchAll(PDO::FETCH_OBJ);

$stmt = $base->prepare('SELECT * from evento where estado_evento=1 order by idevento asc limit 3');
$eventos = $stmt->execute();
$eventos = $stmt->fetchAll(PDO::FETCH_OBJ);



?>
<?php include "public/layouts/navbar.php"; ?>

<section class="h-100 mb-3">
    <div class="container-fluid p-0">
        <div id="carouselExampleInterval" class="carousel slide carousel-fade slider" data-bs-ride="carousel" style="height: 450px; overflow: hidden;">
            <div class="carousel-inner">
                <?php if ($slider1) { ?>
                    <div class="carousel-item active position-relative">
                        <img src="<?= $url . $slider1['imagen_carrusel']; ?>" class="d-block w-100" alt="...">
                        <div class="container-fluid float-slider">
                            <div class="container float-slider-text text-uppercase">
                                <h1><?= $slider1['titulo_carrusel'];  ?></h1>
                                <p><?= $slider1['descripcion_carrusel'];  ?></p>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($slider2 as $v) : ?>
                        <div class="carousel-item position-relative">
                            <img src="<?= $url . $v->imagen_carrusel ?>" class="d-block w-100" alt="...">
                            <div class="container-fluid float-slider">
                                <div class="container float-slider-text text-uppercase">
                                    <h1><?= $v->titulo_carrusel ?></h1>
                                    <p><?= $v->descripcion_carrusel ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon me-5" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon ms-5" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>
<section class="mt-5">
    <div class="container d-flex col-12">
        <div class="col-8 pe-5">
            <div class="position-relative">
                <h4 class="pb-3 fw-bold bb-title">Noticias</h4>
            </div>
            <div id="carouselExample" class="carousel slide carousel-fade">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="d-flex gap-1 me-1">
                            <?php foreach ($noticia1 as $v) : ?>
                                <?php
                                $datetime = new DateTime($v->post_noticia);
                                $fecha_formateada = $datetime->format('j \d\e F \d\e Y \a \l\a\s H:i:s');
                                ?>
                                <div class="col-6 border d-flex" style="background: url('<?= $url . $v->imagen_noticia ?>') center center no-repeat;background-size: cover; height:200px">
                                    <a href="noticia?ver=<?= $v->idnoticia ?>&title=<?= $v->titulo_noticia ?>" class="d-flex justify-content-center align-items-center position-relative" style="background-color: rgba(0, 0, 0, 0.5);min-width:100%">
                                        <div class="p-5 text-center fw-light text-white fst-italic">
                                            <?= $v->titulo_noticia ?><br>
                                        </div>
                                        <div class="float-mas py-2 px-3">
                                            Leer más +
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex gap-1 me-1">
                            <?php foreach ($noticia2 as $v) : ?>
                                <?php
                                $datetime = new DateTime($v->post_noticia);
                                $fecha_formateada = $datetime->format('j \d\e F \d\e Y \a \l\a\s H:i:s');
                                ?>
                                <div class="col-6 border d-flex" style="background: url('<?= $url . $v->imagen_noticia ?>') center center no-repeat;background-size: cover; height:200px">
                                    <a href="<?= $url ?>noticia?ver=<?= $v->idnoticia ?>" class="d-flex justify-content-center align-items-center position-relative" style="background-color: rgba(0, 0, 0, 0.5);">
                                        <div class="p-5 text-center fw-light text-white fst-italic">
                                            <?= $v->titulo_noticia ?><br>
                                        </div>
                                        <div class="float-mas py-2 px-3">
                                            Leer más +
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev position-relative" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon me-5" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next position-relative" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon ms-5" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-4">
            <div class="position-relative">
                <h4 class="pb-3 fw-bold d-flex justify-content-between bb-title">
                    <span>Próximos Eventos</span>
                    <span><a href="eventos"><i class="fa fa-plus text-success fs-6"></i></a></span>
                </h4>
            </div>
            <ul class="events m-0 p-0" style="list-style:none">
                <?php foreach ($eventos as $v) : ?>
                    <?php
                    $datetime = new DateTime($v->post_evento);
                    $dia = $datetime->format('j');
                    $mes = $datetime->format('F');
                    ?>
                    <li class="event mb-2">
                        <a href="evento?ver=<?= $v->idevento ?>&title=<?= $v->titulo_evento ?>" class="d-flex border rounded p-1">
                            <div class="d-flex text-dark p-2 flex-column justify-content-center align-items-center border text-center" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;">
                                <span style="font-size:30px"><?=$dia?></span>
                                <span><?=$mes?></span>
                            </div>
                            <div class="card-text ps-4 text-secondary" style="font-size:15px">
                                <p><?= $v->titulo_evento ?></p>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
<section>
    <div class="container-fluid mt-4 py-1 p-0" style="background: #00C564">
        <div class="container py-4">
            <h4 class="text-white">Enlaces de interés</h4>
            <hr class="text-white">
            <div class="container text-center p-0">
                <div class="row flex-wrap">
                    <?php foreach ($data2 as $v1) : ?>
                        <div class="col-md-4 p-2">
                            <div class="col rounded">
                                <a href="<?= $v1->url_enlace ?>" target="_blank" style="text-transform: uppercase !important;">
                                    <div class="w-100 bg-white py-3 fw-bold text-success">
                                        <img src="<?= $url . $v1->icono_enlace ?>" style="width:30px" class="me-1">
                                        <span><?= $v1->titulo_enlace ?></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</section>
<?php include "public/layouts/footer.php"; ?>
<?php include "public/layouts/scripts.php"; ?>
