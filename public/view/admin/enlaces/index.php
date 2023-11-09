<?php
$title_page = "Enlaces";

include "../../../layouts/header_admin.php";

if (isset($_POST['add'])) {
    $a = $_POST['titulo_enlace'];
    $b = $_POST['icono_enlace'];
    $c = $_POST['url_enlace'];

    $stmt = $base->prepare('INSERT INTO enlace(titulo_enlace,icono_enlace,url_enlace) values(?,?,?)');
    $result = $stmt->execute(array($a, $b, $c));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/' . $title_page . '";</script>';

}
if (isset($_POST['edit'])) {
    $id = $_POST['idenlace'];
    $a = $_POST['titulo_enlace'];
    $b = $_POST['icono_enlace'];
    $c = $_POST['url_enlace'];

    $stmt = $base->prepare('UPDATE enlace SET titulo_enlace =?,icono_enlace=?,url_enlace=? where idenlace = ?');
    $result = $stmt->execute(array($a, $b, $c, $id));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/enlaces";</script>';
}

$stmt = $base->prepare('SELECT * from enlace');
$data = $stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_OBJ);


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
                <a href="<?= $url ?>" target="_blank" class="font-weight-bold text-warning">aquí <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
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
                                <th style="width: 5%;" class="text-center">#</th>
                                <th style="width: 10%;" class="text-center">Icono</th>
                                <th>Titulo</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1;
                            foreach ($data as $v1) : ?>
                                <tr>
                                    <td class="text-center"><?= $count ?></td>
                                    <td class="text-center"><?= $v1->icono_enlace ?></td>
                                    <td><?= $v1->titulo_enlace ?></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary btn-id" data-bs-toggle="modal" data-bs-target="#ModalEdit" id="<?= $v1->idenlace ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                                        <?php if ($v1->estado_enlace == 1) { ?>
                                            <a href="updateWeb?idHide=<?= $v1->idenlace ?>" class="btn text-white bg-warning"><i class="fa-solid fa-eye"></i></a>
                                        <?php } else { ?>
                                            <a href="updateWeb?idShow=<?= $v1->idenlace ?>" class="btn text-white bg-danger"><i class="fa-solid fa-eye-slash"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php $count++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="collapse" id="collapseNew">
                    <form method="post" id="validateForm">
                        <fieldset>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Titulo</label>
                                    <input type="text" name="titulo_enlace" class="form-control" placeholder="" required title="Campo requerido">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Icono | <a href="https://fontawesome.com/search?q=institution&o=r&m=free" target="_blank"> ver aquí</a></label>
                                    <input type="text" name="icono_enlace" class="form-control" placeholder="" required title="Campo requerido, debe contener un icono de FontAwesome">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>URL del enlace de interes</label>
                                <input type="url" name="url_enlace" class="form-control" placeholder="" required title="Campo requerido, debe contener una URL">
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
