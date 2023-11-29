<?php
$title_page = "Comites de Calidad";

include "../../layouts/header_admin.php";

if (isset($_POST['add'])) {
    $a = $_POST['idcomite'];
    $b = $_POST['idfacultad'];
    $c = $_POST['idpersona_natural'];
    $d = $_POST['nombre_programa'];
    //$e = $_POST['pdf_programa'];
    $f = $_POST['cui_programa'];
    $g = $_POST['reportes_programa'];
    /*$h = isset($_POST['2021_1_programa']) ? 'on' : 'off';
    $i =  isset($_POST['2021_2_programa']) ? 'on' : 'off';
    $j =  isset($_POST['2022_1_programa']) ? 'on' : 'off';
    $k =  isset($_POST['2022_2_programa']) ? 'on' : 'off';
    $l =  isset($_POST['2023_1_programa']) ? 'on' : 'off';
    $m =  isset($_POST['2023_2_programa']) ? 'on' : 'off';
    $n =  isset($_POST['2024_1_programa']) ? 'on' : 'off';
    $o =  isset($_POST['2024_2_programa']) ? 'on' : 'off';*/
    $p = $_POST['observacion_programa'];
    $q = $_POST['resolucion_programa'];

    if ($_FILES['pdf_programa']['name'] != "") {
        $imagen = "../../../src/file/" . $_FILES['pdf_programa']['name'];
        $e = "src/file//" . $_FILES['pdf_programa']['name'];
        move_uploaded_file($_FILES['pdf_programa']['tmp_name'], $imagen);

        $stmt = $base->prepare('INSERT INTO programa(idcomite,idfacultad,idpersona_natural,nombre_programa,pdf_programa,cui_programa,
        reportes_programa,observacion_programa,resolucion_programa)
        values(?,?,?,?,?,?,?,?,?)');
        $result = $stmt->execute(array($a, $b, $c, $d, $e, $f, $g, $p,$q));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo '<script type="text/javascript">window.location="' . $url . 'public/view/comites-calidad";</script>';
    }
}
if (isset($_POST['edit'])) {
    $id = $_POST['idprograma'];
    $a = $_POST['idcomite'];
    $b = $_POST['idfacultad'];
    $c = $_POST['idpersona_natural'];
    $d = $_POST['nombre_programa'];
    //$e = $_POST['pdf_programa'];
    $f = $_POST['cui_programa'];
    $g = $_POST['reportes_programa'];
    /*$h = isset($_POST['2021_1_programa']) ? 'on' : 'off';
    $i =  isset($_POST['2021_2_programa']) ? 'on' : 'off';
    $j =  isset($_POST['2022_1_programa']) ? 'on' : 'off';
    $k =  isset($_POST['2022_2_programa']) ? 'on' : 'off';
    $l =  isset($_POST['2023_1_programa']) ? 'on' : 'off';
    $m =  isset($_POST['2023_2_programa']) ? 'on' : 'off';
    $n =  isset($_POST['2024_1_programa']) ? 'on' : 'off';
    $o =  isset($_POST['2024_2_programa']) ? 'on' : 'off';*/
    $p = $_POST['observacion_programa'];
    $q = $_POST['resolucion_programa'];

    if ($_FILES['pdf_programa']['name'] != "") {
        $imagen = "../../../src/file/" . $_FILES['pdf_programa']['name'];
        $e = "src/file//" . $_FILES['pdf_programa']['name'];
        move_uploaded_file($_FILES['pdf_programa']['tmp_name'], $imagen);

        $stmt = $base->prepare('UPDATE programa SET idcomite =?,idfacultad=?,idpersona_natural=?,nombre_programa=?,
        pdf_programa=?, cui_programa=?,reportes_programa=?,observacion_programa=?,resolucion_programa=? where idprograma = ?');
        $result = $stmt->execute(array($a, $b, $c, $d, $e, $f, $g, $p,$q, $id));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $stmt = $base->prepare('UPDATE programa SET idcomite =?,idfacultad=?,idpersona_natural=?,nombre_programa=?,
        cui_programa=?,reportes_programa=?,observacion_programa=?,resolucion_programa=? where idprograma = ?');
        $result = $stmt->execute(array($a, $b, $c, $d, $f, $g, $p,$q, $id));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    echo '<script type="text/javascript">window.location="' . $url . 'public/view/comites-calidad";</script>';
}

$stmt = $base->prepare('SELECT * from programa as p
inner join comite as c on (c.idcomite=p.idcomite)
inner join facultad as f on (f.idfacultad=p.idfacultad)');
$data = $stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_OBJ);

$stmt = $base->prepare('SELECT* from comite where estado_comite = 1');
$data2 = $stmt->execute();
$data2 = $stmt->fetchAll(PDO::FETCH_OBJ);

$stmt = $base->prepare('SELECT * from facultad where estado_facultad = 1');
$data3 = $stmt->execute();
$data3 = $stmt->fetchAll(PDO::FETCH_OBJ);

$stmt = $base->prepare('SELECT * from persona_natural');
$data4 = $stmt->execute();
$data4 = $stmt->fetchAll(PDO::FETCH_OBJ);
?>
<?php include "../../layouts/navbar_admin.php"; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h5 class="m-0 text-dark" style="font-weight: 600;"><?= $title_page ?></h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $url ?>public/view/">Inicio</a></li>
                        <li class="breadcrumb-item active"><?= $title_page ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content me-2">
        <div class="container-fluid m-2 p-0 pb-2 bg-white">
            <p class="text-secondary bg-dark border-bottom px-4 py-2">
                <i class="fa fa-info-circle text-warning"></i>
                Todos los cambios los puedes verificar
                <a href="<?= $url ?>comites-calidad" target="_blank" class="font-weight-bold text-warning">aquí <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            </p>
            <div class="d-flex justify-content-center">
                <p>
                    <button class="btn bg-dark m-0" type="button" id="btn_collapseTable" disabled>
                        <i class="fa-solid fa-list me-2"></i>Listado de <?= $title_page ?>
                    </button>
                    <button class="btn bg-dark m-0 " type="button" id="btn_collapseNew">
                        <i class="fa-regular fa-square-plus me-2"></i>Agregar <?= $title_page ?>
                    </button>
                </p>
            </div>
            <div class="row p-4">
                <div class="collapse show" id="collapseTable">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Facultad</th>
                                <th class="text-center">Programa</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1;
                            foreach ($data as $v1) : ?>
                                <tr>
                                    <td class="text-center"><?= $count ?></td>
                                    <td class="text-center img-table"><?= $v1->nombre_facultad ?></td>
                                    <td class="text-center"><?= $v1->nombre_programa ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-id" data-bs-toggle="modal" data-bs-target="#ModalEdit" id="<?= $v1->idprograma ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <?php if ($v1->estado_programa == 1) { ?>
                                            <a href="updateWeb?idHide=<?= $v1->idprograma ?>" class="btn text-white bg-warning"><i class="fa-solid fa-eye"></i></a>
                                        <?php } else { ?>
                                            <a href="updateWeb?idShow=<?= $v1->idprograma ?>" class="btn text-white bg-danger"><i class="fa-solid fa-eye-slash"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php $count++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="collapse" id="collapseNew">
                    <form method="post" id="validateForm" enctype="multipart/form-data">
                        <fieldset>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Comite</label>
                                    <select class="select2" name="idcomite" style="width: 100%;" required title="Campo requerido">
                                        <?php foreach ($data2 as $v2) : ?>
                                            <option value="<?= $v2->idcomite ?>"><?= $v2->nombre_comite ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label>Facultad</label>
                                    <select class="select2" name="idfacultad" style="width: 100%;" required title="Campo requerido">
                                        <?php foreach ($data3 as $v3) : ?>
                                            <option value="<?= $v3->idfacultad ?>"><?= $v3->nombre_facultad ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label>Nombre del programa</label>
                                    <input type="text" name="nombre_programa" class="form-control" placeholder="" required title="Campo requerido, debe contener el nombre del programa">
                                </div>
                                <div class="form-group col-4">
                                    <div class="mb-3">
                                        <label for="formFile2" class="form-label">PDF del programa</label>
                                        <input class="form-control" accept="application/pdf" name="pdf_programa" type="file" id="formFile2" required title="Campo requerido, debe contener un pdf">
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label>Resolución</label>
                                    <input type="text" name="resolucion_programa" class="form-control" placeholder="" required title="Campo requerido, debe contener la resolución del programa">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-3">
                                    <label>Representante</label>
                                    <select class="select2" name="idpersona_natural" style="width: 100%;" required title="Campo requerido">
                                        <?php foreach ($data4 as $v2) : ?>
                                            <option value="<?= $v2->idpersona_natural ?>"><?= $v2->dni . ' - ' . $v2->nombres . ' ' . $v2->apellidos ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-3 form-group">
                                    <label>Cargo</label>
                                    <input type="text" name="cui_programa" class="form-control" placeholder="" required title="Campo requerido, debe contener el Cargo del representante">
                                </div>
                                <div class="col-3 form-group">
                                    <label>Email</label>
                                    <input type="email" name="reportes_programa" class="form-control" placeholder="" required title="Campo requerido, debe contener el email del representante">
                                </div>
                                <div class="form-group col-3">
                                    <label>Teléfono</label>
                                    <input type="phone" name="observacion_programa" class="form-control" placeholder="" title="Campo requerido, debe contener el teléfono del representante">
                                </div>
                            </div>

                            <button type="submit" name="add" class="btn btn-success px-3 fw-bolder"><i class="fa-solid fa-rotate me-1"></i> Actualizar <?= $title_page ?></button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!--Modales-->
<div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="ModalEdit" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar <?= $title_page ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="body-wrapper">

            </div>
        </div>
    </div>
</div>

<?php include "../../layouts/footer_admin.php"; ?>
<?php include "../../layouts/scripts.php"; ?>