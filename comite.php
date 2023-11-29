<?php
if (isset($_GET['ver'])) {
    setlocale(LC_TIME, 'es_ES');
    $title = $_GET['title'];
    include "public/layouts/header.php";

    $stmt = $base->prepare('select * from comite where idcomite=?');
    $data = $stmt->execute(array($_GET['ver']));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);


    $stmt = $base->prepare('select * from comite where estado_comite=1');
    $data1 = $stmt->execute();
    $data1 = $stmt->fetchAll(PDO::FETCH_OBJ);


    $stmt = $base->prepare('SELECT p.idfacultad, f.nombre_facultad FROM programa AS p INNER JOIN facultad AS f ON(f.idfacultad=p.idfacultad)  WHERE p.idcomite = ? GROUP BY p.idfacultad;');
    $programas = $stmt->execute(array($_GET['ver']));
    $programas = $stmt->fetchAll(PDO::FETCH_OBJ);

    $stmt = $base->prepare('SELECT * FROM programa as p inner join persona_natural as pn on(pn.idpersona_natural=p.idpersona_natural) where p.idcomite=?');
    $programas2 = $stmt->execute(array($_GET['ver']));
    $programas2 = $stmt->fetchAll(PDO::FETCH_OBJ);

    $stmt = $base->prepare('SELECT * FROM facultad');
    $facultades = $stmt->execute();
    $facultades = $stmt->fetchAll(PDO::FETCH_OBJ);


?>
    <?php include "public/layouts/navbar.php"; ?>
    <div class="container-fluid" style="background: #fff">
        <div class="container d-flex py-4">
            <div class="row d-flex">
                <div class="position-relative">
                    <h1 class="pb-3 fw-bold bb-title"><?= $data['nombre_comite'] ?></h1>
                </div>
                <?php foreach ($programas as $i) { ?>
                    <h2 class="text-center mt-5 mb-2 text-uppercase">Facultad de <?= $i->nombre_facultad ?></h2>
                    <table class="table table-bordered border-primary w-100">
                        <thead style="background-color: #F5F5F5;">
                            <tr>
                                <th class="text-center">Responsable</th>
                                <th class="text-center">Programa</th>
                                <th class="text-center">Resolución</th>
                                <th class="text-center">Cargo</th>
                                <th class="text-center">DNI</th>
                                <th class="text-center">Correo</th>
                                <th class="text-center">Celular</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($facultades as $j) {
                                foreach ($programas2 as $k) :
                                    
                                    if ($i->idfacultad == $k->idfacultad && $j->idfacultad == $k->idfacultad) {?>
                                        <tr>
                                            <td class="text-center"><?= $k->nombres . ' ' . $k->apellidos ?></td>
                                            <td class="text-center"><?= $k->nombre_programa ?></td>
                                            <td class="text-center"><a href="<?= $url . $k->pdf_programa ?>"><?= $k->resolucion_programa ?></a></td>
                                            <td class="text-center"><?= $k->cui_programa ?></td>
                                            <td class="text-center"><?= $k->dni ?></td>
                                            <td class="text-center"><?= $k->reportes_programa ?></td>
                                            <td class="text-center"><?= $k->observacion_programa ?></td>
                                        </tr>
                            <?php }
                                endforeach;
                            } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>

        </div>
    </div>

    <?php include "public/layouts/footer.php"; ?>
<?php include "public/layouts/scripts.php";
}
?>