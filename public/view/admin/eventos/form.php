<?php
require('C:\laragon\www\ogc_unsm\src\db\conexion.php');
$url = "http://localhost/ogc_unsm/";


if (isset($_GET['id'])) {

    //Listado
    $stmt = $base->prepare('SELECT * from evento where idevento = ?');
    $data = $stmt->execute(array($_GET['id']));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($data);


?>
    <form method="post" id="validateForm" enctype="multipart/form-data">
        <div class="modal-body">
            <input class="form-control" name="idevento" type="hidden" value="<?= $data['idevento'] ?>">

            <div class="form-group">
                <label>Titulo</label>
                <input type="text" name="titulo_evento" class="form-control" placeholder="" value="<?= $data['titulo_evento'] ?>" required title="Campo requerido">
            </div>
            <div class="form-group">
                <label>Subtitulo</label>
                <input type="text" name="subtitulo_evento" class="form-control" placeholder="" value="<?= $data['subtitulo_evento'] ?>" required title="Campo requerido">
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <textarea class="form-control" id="summernote2" required title="Campo requerido" name="descripcion_evento"><?= $data['descripcion_evento'] ?></textarea>
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="formFile2" class="form-label">Imagen</label>
                    <input class="form-control" accept="image/*" name="imagen_evento" type="file" id="formFile2">
                    <small class="text-secondary">la imagen debe tener esta dimensión: <strong>1400 x 607 pixeles</strong></small>
                </div>
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="formFile2" class="form-label">Imagen Actual</label>
                    <img src="<?= $url . $data['imagen_evento'] ?>" style="width: 100%;">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" name="edit" class="btn btn-primary">Enviar</button>
        </div>
    </form>

<?php } ?>
<script src="<?= $url ?>src/plugins/summernote/summernote-bs4.min.js"></script>

<script>
    $(document).ready(function() {

        $('#summernote2').summernote({
            placeholder: 'Escribe aquí la descripción de la evento...',
            height: 400,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>