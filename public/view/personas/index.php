<?php
$title_page = "Personas";
include "../../layouts/header_admin.php";

if (isset($_POST['add'])) {
    $a = $_POST['dni'];
    $a = $_POST['dni'];
    $b = $_POST['nombres'];
    $c = $_POST['apellidos'];;
    $d = $_POST['email'];
    $e = $_POST['celular'];
    $f = $_POST['direccion'];


    $stmt = $base->prepare('insert into persona_natural(dni,nombres,apellidos,email, celular,direccion) values(?,?,?,?,?,?)');
    $personas = $stmt->execute(array($a, $b, $c, $d, $e, $f));
    if ($personas) {
        echo '<script type="text/javascript">window.location="' . $url . 'public/view/personas";</script>';
    }
}
if (isset($_POST['edit'])) {
    $id = $_POST['idpersona'];
    $a = $_POST['dni'];
    $b = $_POST['nombres'];
    $c = $_POST['apellidos'];;
    $d = $_POST['email'];
    $e = $_POST['celular'];
    $f = $_POST['direccion'];

    $stmt = $base->prepare('update persona_natural set dni=?,nombres=?,apellidos=?,email=?,celular=?,direccion=? where idpersona_natural = ?');
    $personas = $stmt->execute(array($a, $b, $c, $d, $e, $f, $id));
    if ($personas) {
        echo '<script type="text/javascript">window.location="' . $url . 'public/view/personas";</script>';
    }
}



$stmt = $base->prepare('select * from persona_natural where estado = 1');
$persona = $stmt->execute();
$persona = $stmt->fetchAll(PDO::FETCH_OBJ);

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
                Todos los cambios están bajo su responsabilidad
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
                                <th>DNI</th>
                                <th>Nombres y apellidos</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1;
                            foreach ($persona as $i) : ?>
                                <tr>
                                    <td class="text-center"><?= $count ?></td>
                                    <td><?= $i->dni ?></td>
                                    <td><?= $i->nombres . ' ' . $i->apellidos ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-id" data-bs-toggle="modal" data-bs-target="#ModalEdit" id="<?= $i->idpersona_natural  ?>"><i class="fa-solid fa-pen-to-square"></i></button>
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
                                <div class="col-6 form-group">
                                    <label>Nombres</label>
                                    <input type="text" name="nombres" class="form-control" placeholder="" required title="Campo requerido">
                                </div>
                                <div class="col-6 form-group">
                                    <label>Apellidos</label>
                                    <input type="text" name="apellidos" class="form-control" placeholder="" required title="Campo requerido">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label>N° Documento de Identidad</label>
                                    <input type="text" name="dni" minlength="8" maxlength="8" class="form-control" placeholder="" required title="Campo requerido">
                                </div>
                                <div class="col-6 form-group">
                                    <label>Celular</label>
                                    <input type="text" name="celular" minlength="9" maxlength="9" class="form-control" placeholder="" required title="Campo requerido">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label>Dirección</label>
                                    <input type="text" name="direccion" class="form-control" placeholder="" required title="Campo requerido">
                                </div>
                                <div class="col-6 form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="" required title="Campo requerido">
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
    <div class="modal-dialog modal-dialog-centered">
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