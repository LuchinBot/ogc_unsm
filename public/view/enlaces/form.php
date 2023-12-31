<?php
require('../../layouts/database/connection.php');


if (isset($_GET['id'])) {

    //Listado
    $stmt = $base->prepare('SELECT * from enlace where idenlace = ?');
    $data = $stmt->execute(array($_GET['id']));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //var_dump($data);


?>
    <form method="post" id="validateForm" enctype="multipart/form-data">
        <div class="modal-body">
            <input class="form-control" name="idenlace" type="text" value="<?= $data['idenlace'] ?>" hidden>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Titulo</label>
                    <input type="text" name="titulo_enlace" class="form-control" value="<?= $data['titulo_enlace'] ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Icono</label>
                    <input type="file" accept="image/*" name="icono_enlace" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label>URL del enlace de interes</label>
                <input type="url" name="url_enlace" class="form-control" value="<?= $data['url_enlace'] ?>" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" name="edit" class="btn btn-primary">Enviar</button>
        </div>
    </form>

<?php } ?>
