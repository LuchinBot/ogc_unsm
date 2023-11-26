<?php
if (isset($_GET['ver'])) {
    setlocale(LC_TIME, 'es_ES');
    $title = $_GET['title'];
    include "public/layouts/header.php";

    $stmt = $base->prepare('select * from tipo_documento where idtipo_documento=?');
    $data = $stmt->execute(array($_GET['ver']));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);


    $stmt = $base->prepare('select * from tipo_documento where estado_tipo_documento=1');
    $data1 = $stmt->execute();
    $data1 = $stmt->fetchAll(PDO::FETCH_OBJ);


    $stmt = $base->prepare('select * from grupo_documento where idtipo_documento = ? ');
    $grupos = $stmt->execute(array($_GET['ver']));
    $grupos = $stmt->fetchAll(PDO::FETCH_OBJ);

    $stmt = $base->prepare('select * from documento where estado_documento = 1');
    $documentos = $stmt->execute();
    $documentos = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
    <?php include "public/layouts/navbar.php"; ?>
    <div class="container-fluid" style="background: #fff">
        <div class="container d-flex py-4">
            <div class="row d-flex">
                <div class="col-md-9 pe-5 ">
                    <div class="position-relative">
                        <h1 class="pb-3 fw-bold bb-title"><?= $data['nombre_tipo_documento'] ?></h1>
                    </div>
                    <p class="mt-5">Para la gestión académica, en San Marcos se cuenta con normas, reglamentos, documentos de gestión y de trabajo que conducen la labor y función de los órganos de dirección y asesoría de nuestra universidad.</p>

                    <div class="mt-5">
                        <?php foreach ($grupos as $i) { ?>
                            <div class="border-bottom btn w-100 d-flex" type="button" data-bs-toggle="collapse" data-bs-target="#collapseG<?= $i->idgrupo_documento ?>" aria-expanded="false" aria-controls="collapseG<?= $i->idgrupo_documento ?>">
                                <?= $i->nombre_grupo_documento ?>
                            </div>
                            <div class="collapse" id="collapseG<?= $i->idgrupo_documento ?>">
                                <div class="card card-body m-2" style="background-color: #F5F5F5;">
                                    <?php foreach ($documentos as $j) {
                                        if ($j->idgrupo_documento == $i->idgrupo_documento) { ?>
                                            <a href="<?= $url . $j->pdf_documento ?>" target="_blank" class="d-flex align-items-center"><i class="fa-solid fa-file-pdf me-3"></i> <?= $j->nombre_documento ?></a>
                                    <?php }
                                    } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="position-relative">
                        <h4 class="text-success pb-2 fw-bold bb-title">Nuestros documentos</h4>
                    </div>
                    <?php foreach ($data1 as $v) : ?>
                        <div class="col mt-3" style="position: relative;">
                            <a href="documento?ver=<?= $v->idtipo_documento ?>&title=<?= $v->nombre_tipo_documento ?>" class="d-flex noticia-mini pb-2 border-bottom">
                                <div class="card-body py-0 text-secondary noticia-text fst-italic" style="overflow-wrap: anywhere;">
                                    <?= $v->nombre_tipo_documento ?>
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