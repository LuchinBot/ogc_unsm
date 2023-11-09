<?php
$title_page = "Personal";

include "../../../layouts/header_admin.php";

if (isset($_POST['add'])) {
    $a = $_POST['idpersona_natural'];
    $b = $_POST['idcargo'];
    $c = $_POST['facebook'];
    $d = $_POST['linkedin'];

    if ($_FILES['foto']['name'] != "") {
        $imagen = "../../../../src/img/uploads/" . $_FILES['foto']['name'];
        $imagenUrl = "src/img/uploads/" . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $imagen);

        $stmt = $base->prepare('INSERT INTO personal(idpersona_natural,idcargo,foto,facebook,linkedin) values(?,?,?,?,?)');
        $result = $stmt->execute(array($a, $b, $imagenUrl, $c, $d));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/personal";</script>';
    }
}
if (isset($_POST['edit'])) {
    $id = $_POST['idpersonal'];
    $a = $_POST['idpersona_natural'];
    $b = $_POST['idcargo'];
    $c = $_POST['facebook'];
    $d = $_POST['linkedin'];

    if ($_FILES['foto']['name'] != "") {
        $imagen = "../../../../src/img/uploads/" . $_FILES['foto']['name'];
        $imagenUrl = "src/img/uploads/" . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $imagen);

        $stmt = $base->prepare('UPDATE personal SET idpersona_natural =?,idcargo=?,foto=?,facebook=?,linkedin=? where idpersonal = ?');
        $result = $stmt->execute(array($a, $b, $imagenUrl, $c, $d, $id));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        $stmt = $base->prepare('UPDATE personal SET idpersona_natural =?,idcargo=?,facebook=?,linkedin=? where idpersonal = ?');
        $result = $stmt->execute(array($a, $b, $c, $d, $id));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
    echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/personal";</script>';
}

$stmt = $base->prepare('SELECT * from personal as p
inner join persona_natural as pn on (pn.idpersona_natural=p.idpersona_natural)
inner join cargo as c on (c.idcargo=p.idcargo)');
$data = $stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_OBJ);

$stmt = $base->prepare('SELECT pn.idpersona_natural,pn.dni,pn.nombres,pn.apellidos from persona_natural pn left join personal as p
on (p.idpersona_natural = pn.idpersona_natural ) where p.idpersona_natural IS NULL');
$data2 = $stmt->execute();
$data2 = $stmt->fetchAll(PDO::FETCH_OBJ);

$stmt = $base->prepare('SELECT * from cargo where estado = 1');
$data3 = $stmt->execute();
$data3 = $stmt->fetchAll(PDO::FETCH_OBJ);

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
                                <th class="text-center">Foto</th>
                                <th>Nombres y apellidos</th>
                                <th>Cargo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1;
                            foreach ($data as $v1) : ?>
                                <tr>
                                    <td class="text-center"><?= $count ?></td>
                                    <td class="text-center img-table"><img src="<?= $url . $v1->foto ?>" style="width:40px; height:40px; border-radius:50px"></td>
                                    <td><?= $v1->nombres . ' ' . $v1->apellidos ?></td>
                                    <td><?= $v1->descripcion ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-id" data-bs-toggle="modal" data-bs-target="#ModalEdit" id="<?= $v1->idpersonal ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <?php if ($v1->estado == 1) { ?>
                                            <a href="updateWeb?idHide=<?= $v1->idpersonal ?>" class="btn text-white bg-warning"><i class="fa-solid fa-eye"></i></a>
                                        <?php } else { ?>
                                            <a href="updateWeb?idShow=<?= $v1->idpersonal ?>" class="btn text-white bg-danger"><i class="fa-solid fa-eye-slash"></i></a>
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
                                <label>Persona Natural</label>
                                <select class="select2" name="idpersona_natural" style="width: 100%;" required title="Campo requerido">
                                    <?php foreach ($data2 as $v2) : ?>
                                        <option value="<?= $v2->idpersona_natural ?>"><?= $v2->dni . ' - ' . $v2->nombres . ' ' . $v2->apellidos ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Cargo</label>
                                <select class="select2" name="idcargo" style="width: 100%;" required title="Campo requerido">
                                    <?php foreach ($data3 as $v3) : ?>
                                        <option value="<?= $v3->idcargo ?>"><?= $v3->descripcion ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="formFile2" class="form-label">FOTO</label>
                                    <input class="form-control" accept="image/*" name="foto" type="file" id="formFile2" required title="Campo requerido, debe contener un foto de buena calidad">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="url" name="facebook" class="form-control" placeholder="" required title="Campo requerido, debe contener una URL">
                            </div>
                            <div class="form-group">
                                <label>Linkedin</label>
                                <input type="url" name="linkedin" class="form-control" placeholder="" required title="Campo requerido, debe contener una URL">
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

<?php include "../../../layouts/footer_admin.php"; ?>
<?php include "../../../layouts/scripts.php"; ?>