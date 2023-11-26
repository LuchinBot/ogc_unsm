<?php
setlocale(LC_TIME, 'es_ES');
$title = "Comités de Calidad | OGC";
include "public/layouts/header.php";


$stmt = $base->prepare('select * from tipo_documento where estado_tipo_documento=1');
$data = $stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_OBJ);


?>
<?php include "public/layouts/navbar.php"; ?>

<div class="container d-flex py-4">
    <div class="row d-flex">
        <div class="col-md-9 pe-5">
            <div class="position-relative">
                <h1 class="pb-3 fw-bold bb-title">Documentos</h1>
            </div>
            <p class="pe-5">
                La gestión académica y administrativa en nuestra universidad requiere de documentos orientadores para que el personal técnico y directivo de los órganos de dirección, asesoría y apoyo realicen sus labores y tareas asignadas.
            </p>
            <p>
                Es por ello que, para una eficiente toma de decisiones en la gestión institucional innovadora, eficiente, eficaz, transparente, democrática y con responsabilidad social, San Marcos ha elaborado reglamentos y normas que permanentemente se modifican de acuerdo con las directivas nacionales.
            </p>
        </div>
        <div class="col-md-3">
            <div class="position-relative">
                <h4 class="text-success pb-2 fw-bold bb-title">Nuestros documentos</h4>
            </div>
            <?php foreach ($data as $v) : ?>
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
<?php include "public/layouts/scripts.php"; ?>