<?php
if (isset($_GET['ver'])) {
    setlocale(LC_TIME, 'es_ES');
    $title = $_GET['title'];
    include "public/layouts/header.php";
    $active4 = "active";

    $stmt = $base->prepare('select * from noticia where idnoticia=?');
    $data = $stmt->execute(array($_GET['ver']));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);


    $datetime = new DateTime($data['post_noticia']);
    $fecha_formateada = $datetime->format('j \d\e F \d\e Y \a \l\a\s H:i:s');

    $stmt = $base->prepare('select * from noticia where estado_noticia=1');
    $data2 = $stmt->execute();
    $data2 = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
    <?php include "public/layouts/navbar.php"; ?>
    <div class="container-fluid" style="background: #F5F5F5">
        <div class="container d-flex py-4">
            <div class="col d-flex">
                <div class="col-9 pe-5 ">
                    <div class="bg-white">
                        <div style="background: url('<?= $url . $data['imagen_noticia'] ?>') center center no-repeat;background-size: cover; height:300px; overflow:hidden" class="position-relative">
                            <div class="float-mas py-2 px-3 fst-italic fw-light">
                                <i class="fa-solid fa-calendar-days"></i> Publicado el <?= $fecha_formateada ?>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="position-relative">
                                <h4 class="text-dark pb-3 fw-bold bb-title"><?= $data['titulo_noticia'] ?></h4>
                            </div>
                            <div class="mt-3 text-secondary">
                                <?= $data['descripcion_noticia'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="position-relative">
                        <h4 class="text-success pb-2 fw-bold bb-title">Noticias antiguas</h4>
                    </div>
                    <?php foreach ($data2 as $v) : ?>
                        <div class="col mt-3" style="position: relative;">
                            <a href="" class="d-flex noticia-mini pb-2 border-bottom">
                                <div class="noticia-img" style="background: url('<?= $url . $v->imagen_noticia ?>') center center no-repeat;background-size: cover;">
                                </div>
                                <div class="card-body py-0 text-secondary noticia-text fst-italic">
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
<?php include "public/layouts/scripts.php";
}
?>