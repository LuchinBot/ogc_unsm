<?php
$title_page = "Documentos";

include "../../layouts/header_admin.php";

if (isset($_POST['add'])) {
    $a = $_POST['idgrupo_documento'];
    $b = $_POST['nombre_documento'];

    if ($_FILES['pdf_documento']['name'] != "") {
        $imagen = "../../../src/file/" . $_FILES['pdf_documento']['name'];
        $imagenUrl = "src/file/" . $_FILES['pdf_documento']['name'];
        move_uploaded_file($_FILES['pdf_documento']['tmp_name'], $imagen);

        $stmt = $base->prepare('INSERT INTO documento(idgrupo_documento,nombre_documento,pdf_documento) values(?,?,?)');
        $result = $stmt->execute(array($a, $b, $imagenUrl));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo '<script type="text/javascript">window.location="' . $url . 'public/view/documentos";</script>';
    }
}
if (isset($_POST['edit'])) {
    $id = $_POST['iddocumento'];
    $a = $_POST['idgrupo_documento'];
    $b = $_POST['nombre_documento'];

    if ($_FILES['pdf_documento']['name'] != "") {
        $imagen = "../../../src/file/" . $_FILES['pdf_documento']['name'];
        $imagenUrl = "src/file/" . $_FILES['pdf_documento']['name'];
        move_uploaded_file($_FILES['pdf_documento']['tmp_name'], $imagen);

        $stmt = $base->prepare('UPDATE documento SET idgrupo_documento =?,nombre_documento=?,pdf_documento=? where iddocumento = ?');
        $result = $stmt->execute(array($a, $b, $imagenUrl, $id));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $stmt = $base->prepare('UPDATE documento SET  idgrupo_documento =?,nombre_documento=? where iddocumento = ?');
        $result = $stmt->execute(array($a, $b, $id));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    echo '<script type="text/javascript">window.location="' . $url . 'public/view/documentos";</script>';
}

$stmt = $base->prepare('SELECT * from documento as d
inner join grupo_documento as gd on (gd.idgrupo_documento=d.idgrupo_documento)
inner join tipo_documento as td on (td.idtipo_documento=gd.idtipo_documento)');
$data = $stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_OBJ);

$stmt = $base->prepare('SELECT * from grupo_documento as gd left join tipo_documento as td on (td.idtipo_documento=gd.idgrupo_documento)');
$data2 = $stmt->execute();
$data2 = $stmt->fetchAll(PDO::FETCH_OBJ);



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
                <a href="<?= $url ?>personal" target="_blank" class="font-weight-bold text-warning">aquí <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
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
                                <th>Nombre</th>
                                <th>Tipo y Grupo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1;
                            foreach ($data as $v1) : ?>
                                <tr>
                                    <td class="text-center"><?= $count ?></td>
                                    <td><a href="<?= $url.$v1->pdf_documento?>" target="_blank"><?= $v1->nombre_documento ?></a></td>
                                    <td><?= $v1->nombre_tipo_documento . ' | ' . $v1->nombre_grupo_documento ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-id" data-bs-toggle="modal" data-bs-target="#ModalEdit" id="<?= $v1->iddocumento ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <?php if ($v1->estado_documento== 1) { ?>
                                            <a href="updateWeb?idHide=<?= $v1->iddocumento ?>" class="btn text-white bg-warning"><i class="fa-solid fa-eye"></i></a>
                                        <?php } else { ?>
                                            <a href="updateWeb?idShow=<?= $v1->iddocumento ?>" class="btn text-white bg-danger"><i class="fa-solid fa-eye-slash"></i></a>
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
                            <div class="form-group">
                                <label>Tipo y Grupo de documento</label>
                                <select class="select2" name="idgrupo_documento" style="width: 100%;" required title="Campo requerido">
                                    <?php foreach ($data2 as $v2) : ?>
                                        <option value="<?= $v2->idgrupo_documento ?>"><?= $v2->nombre_tipo_documento . ' | ' . $v2->nombre_grupo_documento ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nombre del documento</label>
                                <input type="text" name="nombre_documento" class="form-control" placeholder="" required title="Campo requerido, debe el nombre del documento">
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="formFile2" class="form-label">PDF</label>
                                    <input class="form-control" accept="application/pdf" name="pdf_documento" type="file" id="formFile2" required title="Campo requerido, debe contener un pdf">
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