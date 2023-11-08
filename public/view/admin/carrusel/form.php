<?php
require('C:\laragon\www\ogc_unsm\src\db\conexion.php');
$url = "http://localhost/ogc_unsm/";


if (isset($_GET['id'])) {

    //Listado
    $stmt = $base->prepare('SELECT * from carrusel where idcarrusel = ?');
    $data = $stmt->execute(array($_GET['id']));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($data);


?>
    <form class="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <input class="form-control" name="idcarrusel" type="text" value="<?= $data['idcarrusel'] ?>" hidden>
            <div class="form-group">
                <label>Titulo</label>
                <input type="text" name="titulo_carrusel" class="form-control" value="<?= $data['titulo_carrusel'] ?>" placeholder="" required>
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <textarea class="form-control" minlength="10" maxlength="50" required name="descripcion_carrusel" style="height:100px"><?= $data['descripcion_carrusel'] ?></textarea>
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="formFile2" class="form-label">Imagen</label>
                    <input class="form-control" accept="image/*" name="imagen_carrusel" type="file" id="formFile2">
                    <small class="text-secondary">la imagen debe tener esta dimensión: <strong>1400 x 607 pixeles</strong></small>
                </div>
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="formFile2" class="form-label">Imagen Actual</label>
                    <img src="<?=$url.$data['imagen_carrusel'] ?>" style="width: 100%;">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" name="edit" class="btn btn-primary">Enviar</button>
        </div>
    </form>

<?php } ?>