<?php
$title_page = "Galería";

include "../../../layouts/header_admin.php";

if (isset($_POST['add'])) {
    $id = $_POST['idevento'];


    if (isset($_FILES['imagenes'])) {

        foreach ($_FILES['imagenes']['tmp_name'] as $key => $tmp_name) {

            $imagen = "../../../../src/img/uploads/" . $_FILES['imagenes']['name'][$key];
            $imagenUrl = "src/img/uploads/" . $_FILES['imagenes']['name'][$key];
            move_uploaded_file($_FILES['imagenes']['tmp_name'][$key], $imagen);

            $stmt = $base->prepare('INSERT INTO galeria(idevento,imagen_galeria) values(?,?)');
            $result = $stmt->execute(array($id, $imagenUrl));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/galeria";</script>';
    }
}
if (isset($_POST['edit'])) {
    $id = $_POST['idevento'];


    if (isset($_FILES['imagenes']) && !empty($_FILES['imagenes']['name'][0])) {
        foreach ($_FILES['imagenes']['tmp_name'] as $key => $tmp_name) {
            $imagen = "../../../../src/img/uploads/" . $_FILES['imagenes']['name'][$key];
            $imagenUrl = "src/img/uploads/" . $_FILES['imagenes']['name'][$key];
            move_uploaded_file($_FILES['imagenes']['tmp_name'][$key], $imagen);

            $stmt = $base->prepare('INSERT INTO galeria(idevento,imagen_galeria) values(?,?)');
            $result = $stmt->execute(array($id, $imagenUrl));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/galeria";</script>';
    }
}

$stmt = $base->prepare('SELECT e.idevento,e.titulo_evento from galeria as g inner join evento as e on(e.idevento=g.idevento) where g.estado_galeria=1 group by g.idevento, e.titulo_evento ORDER BY g.idevento');
$data = $stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_OBJ);

$stmt = $base->prepare('SELECT * from evento where estado_evento=1');
$data2 = $stmt->execute();
$data2 = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
<?php include "../../../layouts/navbar_admin.php"; ?>
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
                        <li class="breadcrumb-item"><a href="<?= $url ?>public/view/admin/">Inicio</a></li>
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
                <a href="<?= $url ?>eventos" target="_blank" class="font-weight-bold text-warning">aquí <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
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
                                <th>Titulo evento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1;
                            foreach ($data as $v1) : ?>
                                <tr>
                                    <td class="text-center"><?= $count ?></td>
                                    <td><?= $v1->titulo_evento ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-id" data-bs-toggle="modal" data-bs-target="#ModalEdit" id="<?= $v1->idevento ?>"><i class="fa-solid fa-pen-to-square"></i></button>
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
                            <div class="form-group">
                                <label>Evento</label>
                                <select class="select2" name="idevento" style="width: 100%;" required title="Campo requerido">
                                    <?php foreach ($data2 as $v2) : ?>
                                        <option value="<?= $v2->idevento ?>"><?= $v2->titulo_evento ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="formFile2" class="form-label">Imagenes del evento</label>
                                    <input class="form-control" multiple="true" accept="image/*" name="imagenes[]" type="file" id="formFile2" required title="Campo requerido, debe contener un foto de buena calidad">
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
    <div class="modal-dialog modal-lg modal-dialog-centered">
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

<?php include "../../../layouts/footer_admin.php"; ?>
<?php include "../../../layouts/scripts.php"; ?>