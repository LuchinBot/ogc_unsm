<?php
require('C:\laragon\www\ogc_unsm\src\db\conexion.php');


if (isset($_GET['id'])) {

    //Listado
    $stmt = $base->prepare('SELECT * from enlace where idenlace = ?');
    $data = $stmt->execute(array($_GET['id']));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //var_dump($data);


?>
    <form class="" method="post">
        <div class="modal-body">
            <input class="form-control" name="idenlace" type="text" value="<?= $data['idenlace'] ?>" hidden>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Titulo</label>
                    <input type="text" name="titulo_enlace" class="form-control" value="<?= $data['titulo_enlace'] ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Icono: <a href="https://fontawesome.com/search?q=institution&o=r&m=free" target="_blank">Ver aquí</a></label>
                    <input type="text" name="icono_enlace" class="form-control" value='<?= $data['icono_enlace'] ?>' required>
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
