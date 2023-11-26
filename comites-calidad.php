<?php
setlocale(LC_TIME, 'es_ES');
$title = "Comités de Calidad | OGC";
include "public/layouts/header.php";


$stmt = $base->prepare('select * from comite where estado_comite=1');
$data = $stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_OBJ);



?>
<?php include "public/layouts/navbar.php"; ?>

<div class="container d-flex py-4">
    <div class="row d-flex">
        <div class="col-md-9 pe-5">
            <div class="position-relative">
                <h1 class="pb-3 fw-bold bb-title">Comités de Calidad</h1>
            </div>
            <p class="pe-5">
                El Comité de Calidad de la escuela profesional o programa de posgrado es el responsable de conducir el proceso de autoevaluación con fines de acreditación nacional; su conformación y funciones son establecidas por la Directiva n.° 001-2021-OCCAA (Resolución Rectoral n.° 012598-2021), dando cumplimiento al artículo 266 del Estatuto de la UNMSM: "La autoevaluación académica, institucional y administrativa es obligatoria en las carreras profesionales y en los programas de posgrado".
                Para iniciar su autoevaluación y lograr la acreditación nacional bajo el Modelo de Acreditación para Programas de Estudios de Educación Superior Universitaria, el Comité de Calidad se inscribe ante el Sineace, para que se le asigne el CUI (Código Único de Identificación). A los tres meses, emite el primer reporte de avances y, posteriormente, presenta reportes cada seis meses hasta la emisión del Informe final de autoevaluación, de acuerdo con lo establecido en el Capítulo II del Reglamento para la autoevaluación, evaluación externa y acreditación (Resolución n.° 000026-2021-SINEACE).
                En el 2017 (*), San Marcos logra la inscripción de 170 comités de calidad ante el Sineace (65 de escuelas profesionales y 105 de programas de posgrado), cuyo respaldo se ejecutó con el envío de las solicitudes físicas; asimismo, se informó sobre la modificación de los comités mediante documentos (oficios y resoluciones rectorales).
                A partir del año 2020, la inscripción de los comités de calidad y el registro de sus integrantes se realiza desde el Sistema de Gestión de la Información de la Autoevaluación (SIGIA). Al contar con el respectivo CUI y haber registrado a sus miembros, los comités inician la autoevaluación y emiten los reportes de sus avances periódicamente a través del Sistema de Autoevaluación de Universidades (SAE ESU). Cabe señalar que la Universidad busca el registro total de los programas de pregrado y posgrado.
            </p>
        </div>
        <div class="col-md-3">
            <div class="position-relative">
                <h4 class="text-success pb-2 fw-bold bb-title">Nuestros Comités</h4>
            </div>
            <?php foreach ($data as $v) : ?>
                <div class="col mt-3" style="position: relative;">
                    <a href="comite?ver=<?= $v->idcomite ?>&title=<?= $v->nombre_comite ?>" class="d-flex noticia-mini pb-2 border-bottom">
                        <div class="card-body py-0 text-secondary noticia-text fst-italic" style="overflow-wrap: anywhere;">
                            <?= $v->nombre_comite ?>
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