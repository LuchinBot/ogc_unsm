<?php
if (isset($_GET['ver'])) {
    setlocale(LC_TIME, 'es_ES');
    $title = $_GET['title'];
    include "public/layouts/header.php";

    $stmt = $base->prepare('select * from evento where idevento=?');
    $data = $stmt->execute(array($_GET['ver']));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);


    $datetime = new DateTime($data['post_evento']);
    $fecha_formateada = $datetime->format('j \d\e F \d\e Y \a \l\a\s H:i:s');

    $stmt = $base->prepare('select * from evento where estado_evento=1');
    $data2 = $stmt->execute();
    $data2 = $stmt->fetchAll(PDO::FETCH_OBJ);

    $stmt = $base->prepare('select * from galeria where idevento=?');
    $galeria = $stmt->execute(array($_GET['ver']));
    $galeria = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
    <?php include "public/layouts/navbar.php"; ?>
    <div class="container-fluid" style="background: #F5F5F5">
        <div class="container d-flex py-4">
            <div class="col d-flex">
                <div class="col-9 pe-5 ">
                    <div class="bg-white">
                        <div style="background: url('<?= $url . $data['imagen_evento'] ?>') center center no-repeat;background-size: cover; height:300px; overflow:hidden" class="position-relative">
                            <div class="float-mas py-2 px-3 fst-italic fw-light">
                                <i class="fa-solid fa-calendar-days"></i> Publicado el <?= $fecha_formateada ?>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="position-relative">
                                <h4 class="text-dark pb-3 fw-bold bb-title" style="overflow-wrap: anywhere;"><?= $data['titulo_evento'] ?></h4>
                            </div>
                            <div class="mt-3 text-secondary" style="overflow-wrap: anywhere;">
                                <?= $data['descripcion_evento'] ?>
                            </div>
                            <div class="position-relative">
                                <h4 class="text-dark pb-3 fw-bold bb-title">Galería</h4>
                            </div>
                            <div class="row my-3 mx-1 base-image-event">
                                <?php foreach ($galeria as $v) : ?>
                                    <div class="col-md-4 p-0 image-event">
                                        <a href="<?= $url . $v->imagen_galeria ?>" data-fancybox data-caption="">
                                            <img src="<?= $url . $v->imagen_galeria ?>">
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-3">
                    <div class="position-relative">
                        <h4 class="text-success pb-2 fw-bold bb-title">Eventos antiguos</h4>
                    </div>
                    <?php foreach ($data2 as $v) : ?>
                        <div class="col mt-3" style="position: relative;">
                            <a href="noticia?ver=<?=$v->idevento?>&title=<?=$v->titulo_evento?>" class="d-flex noticia-mini pb-2 border-bottom">
                                <div class="noticia-img" style="background: url('<?= $url . $v->imagen_evento ?>') center center no-repeat;background-size: cover;">
                                </div>
                                <div class="card-body py-0 text-secondary noticia-text fst-italic" style="overflow-wrap: anywhere;">
                                    <?= $v->titulo_evento ?>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
    <script>
        Fancybox.bind("[data-fancybox]", {
            // Your custom options
        });
    </script>
    <?php include "public/layouts/footer.php"; ?>
<?php include "public/layouts/scripts.php";
}
?>