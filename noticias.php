<?php
setlocale(LC_TIME, 'es_ES');
$title = "Noticias | OGC";
include "public/layouts/header.php";
$active4 = "active";


$stmt = $base->prepare('select * from noticia where estado_noticia=1 order by idnoticia desc limit 10');
$data = $stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_OBJ);

$stmt = $base->prepare('select * from noticia where estado_noticia=1');
$data2 = $stmt->execute();
$data2 = $stmt->fetchAll(PDO::FETCH_OBJ);



?>
<?php include "public/layouts/navbar.php"; ?>

<div class="container d-flex py-4">
    <div class="col d-flex">
        <div class="col-9 pe-5">
            <?php foreach ($data2 as $v) : ?>
                <div class="col-12 mb-3" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;">
                    <a href="noticia?ver=<?=$v->idnoticia?>&title=<?=$v->titulo_noticia?>" class="d-flex noticia-large">
                        <?php
                        $datetime = new DateTime($v->post_noticia);
                        $fecha_formateada = $datetime->format('j \d\e F \d\e Y \a \l\a\s H:i:s');
                        ?>
                        <div class="noticia-img" style="background: url('<?= $url . $v->imagen_noticia ?>') center center no-repeat;background-size: cover;">
                        </div>
                        <div class="card-body py-2 fst-italic">
                            <small class="text-secondary">Publicado el <?=  $fecha_formateada ?> </small>
                            <h5 class="card-title text-dark fw-light mt-2" style="overflow-wrap: anywhere;"><?= $v->titulo_noticia ?></h5>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-3">
            <div class="position-relative">
                <h4 class="text-success pb-2 fw-bold bb-title">Noticias antiguas</h4>
            </div>
            <?php foreach ($data as $v) : ?>
                <div class="col mt-3" style="position: relative;">
                    <a href="noticia?ver=<?=$v->idnoticia?>&title=<?=$v->titulo_noticia?>" class="d-flex noticia-mini pb-2 border-bottom">
                        <div class="noticia-img" style="background: url('<?= $url . $v->imagen_noticia ?>') center center no-repeat;background-size: cover;">
                        </div>
                        <div class="card-body py-0 text-secondary noticia-text fst-italic" style="overflow-wrap: anywhere;">
                        <?= $v->titulo_noticia ?>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>
</div>

<?php include "public/layouts/footer.php"; ?>
<?php include "public/layouts/scripts.php"; ?>