<?php
require('../../layouts/database/connection.php');


if (isset($_GET['id'])) {

    //Listado
    $stmt = $base->prepare('SELECT * from persona_natural where idpersona_natural = ?');
    $data = $stmt->execute(array($_GET['id']));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);


?>
    <form class="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <input class="form-control" name="idpersona" type="text" value="<?= $data['idpersona_natural'] ?>" hidden>
            <div class="row">
                <div class="col-6 form-group">
                    <label>Nombres</label>
                    <input type="text" name="nombres" class="form-control" value="<?= $data['nombres'] ?>" required title="Campo requerido">
                </div>
                <div class="col-6 form-group">
                    <label>Apellidos</label>
                    <input type="text" name="apellidos" class="form-control" value="<?= $data['apellidos'] ?>" required title="Campo requerido">
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label>N° Documento de Identidad</label>
                    <input type="text" name="dni" minlength="8" maxlength="8" class="form-control" value="<?= $data['dni'] ?>" required title="Campo requerido">
                </div>
                <div class="col-6 form-group">
                    <label>Celular</label>
                    <input type="text" name="celular" minlength="9" maxlength="9" class="form-control" value="<?= $data['celular'] ?>" required title="Campo requerido">
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label>Dirección</label>
                    <input type="text" name="direccion" class="form-control" value="<?= $data['direccion'] ?>" required title="Campo requerido">
                </div>
                <div class="col-6 form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $data['email'] ?>" required title="Campo requerido">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" name="edit" class="btn btn-primary">Enviar</button>
        </div>
    </form>

<?php } ?>