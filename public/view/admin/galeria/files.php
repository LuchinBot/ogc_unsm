<?php
require('C:\laragon\www\ogc_unsm\src\db\conexion.php');
$url = "http://localhost/ogc_unsm/";


if (isset($_GET['id'])) {

    $stmt = $base->prepare('SELECT * from galeria where idevento = ?');
    $data2 = $stmt->execute(array($_GET['id']));
    $data2 = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
    <?php foreach ($data2 as $v) : ?>
        <div class="col-md-4 border p-0 position-relative">
            <img src="<?= $url . $v->imagen_galeria ?>" style="width: 100%;">
            <div class="float-delete bg-danger" id="<?= $v->idgaleria ?>">
                <i class="fa fa-times text-white"></i>
            </div>
        </div>
    <?php endforeach; ?>
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