<?php
require('C:\laragon\www\ogc_unsm\src\db\conexion.php');
$url = "http://localhost/ogc_unsm/";
if (isset($_GET['id'])) {

    //Listado
    $stmt = $base->prepare('SELECT e.idevento,e.titulo_evento from galeria as g inner join evento as e on(e.idevento=g.idevento) where g.idevento=? group by g.idevento, e.titulo_evento ORDER BY g.idevento');
    $data = $stmt->execute(array($_GET['id']));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $base->prepare('SELECT * from galeria where idevento = ?');
    $data2 = $stmt->execute(array($_GET['id']));
    $data2 = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
    <form method="post" id="validateForm" enctype="multipart/form-data">
        <div class="modal-body">
            <input class="form-control" name="idevento" type="hidden" value="<?= $data['idevento'] ?>">

            <div class="form-group">
                <label class="form-label">Evento</label>
                <input class="form-control" name="titulo_evento" type="text" value="<?= $data['titulo_evento'] ?>" readonly>
            </div>
            <div class="form-group">
                <label class="form-label"><i class="fa fa-info-circle"></i> La eliminación de las imagenes es permanente.</label>
                <div class="row m-1 border files_ajax" style="max-height: 300px; overflow-y:scroll; background:#F5F5F5; box-shadow: rgba(0, 0, 0, 0.06) 0px 2px 4px 0px inset;">
                    <?php foreach ($data2 as $v) : ?>
                        <div class="col-md-4 border p-0 position-relative">
                            <img src="<?= $url . $v->imagen_galeria ?>" style="width: 100%;">
                            <div class="float-delete bg-danger" id="<?= $v->idgaleria ?>">
                                <i class="fa fa-times text-white"></i>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="form-group">
                <div class="mb-3">
                    <label for="formFile2" class="form-label">Agregar otras imágenes</label>
                    <input class="form-control" multiple="true" accept="image/*" name="imagenes[]" type="file" id="formFile2">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" name="edit" class="btn btn-primary">Enviar</button>
        </div>
    </form>


    <script>
        $(document).ready(function() {

            $('.float-delete').on('click', function() {
                var id = $(this).attr('id');
                //Petición ajax al servidor{
                $.ajax({
                    type: "POST",
                    url: "updateWeb?id=" + id,
                    success: function(data) {
                        fileUpdates(<?= $_GET['id'] ?>);
                    }
                });
            });

            function fileUpdates(id) {
                $.ajax({
                    type: "GET",
                    url: "files?id=" + id,
                    success: function(data) {
                        $('.files_ajax').html(data);
                    }
                });
            }
        });
    </script>

<?php } ?>