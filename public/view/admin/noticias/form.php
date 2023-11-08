<?php
require('C:\laragon\www\ogc_unsm\src\db\conexion.php');
$url = "http://localhost/ogc_unsm/";


if (isset($_GET['id'])) {

    //Listado
    $stmt = $base->prepare('SELECT * from noticia where idnoticia = ?');
    $data = $stmt->execute(array($_GET['id']));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($data);


?>
    <form class="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <input class="form-control" name="idnoticia" type="hidden" value="<?= $data['idnoticia'] ?>">

            <div class="form-group">
                <label>Titulo</label>
                <input type="text" name="titulo_noticia" class="form-control" placeholder="" value="<?= $data['titulo_noticia'] ?>" required>
            </div>
            <div class="form-group">
                <label>Subtitulo</label>
                <input type="text" name="subtitulo_noticia" class="form-control" placeholder="" value="<?= $data['subtitulo_noticia'] ?>" required>
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <textarea class="form-control" id="summernote2" required name="descripcion_noticia"><?= $data['descripcion_noticia'] ?></textarea>
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="formFile2" class="form-label">Imagen</label>
                    <input class="form-control" accept="image/*" name="imagen_noticia" type="file" id="formFile2">
                    <small class="text-secondary">la imagen debe tener esta dimensión: <strong>1400 x 607 pixeles</strong></small>
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
    $('#summernote2').summernote({
        placeholder: 'Escribe aquí la descripción de la noticia...',
        height: 400,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>