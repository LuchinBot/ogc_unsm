<?php
require('../../layouts/database/connection.php');


if (isset($_GET['id'])) {

    //Listado
    $stmt = $base->prepare('SELECT * from documento as d
    inner join grupo_documento as gd on (gd.idgrupo_documento=d.idgrupo_documento)
    inner join tipo_documento as td on (td.idtipo_documento=gd.idtipo_documento) where d.iddocumento = ?');
    $data = $stmt->execute(array($_GET['id']));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $base->prepare('SELECT * from grupo_documento as gd inner join tipo_documento as td on (td.idtipo_documento=gd.idgrupo_documento)');
    $data2 = $stmt->execute();
    $data2 = $stmt->fetchAll(PDO::FETCH_OBJ);


    //var_dump($data);


?>
    <form class="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <input class="form-control" name="iddocumento" type="text" value="<?= $data['iddocumento'] ?>" hidden>
            <div class="form-group">
                <label class="form-label">Tipo y Grupo de documento</label>
                <select class="select2" name="idgrupo_documento" style="width: 100%;">
                    <?php foreach ($data2 as $v2) {
                        if ($v2->idgrupo_documento == $data['idgrupo_documento']) { ?>
                            <option selected value="<?= $v2->idgrupo_documento ?>"><?= $v2->nombre_tipo_documento . ' | ' . $v2->nombre_grupo_documento ?></option>
                        <?php } else { ?>
                            <option value="<?= $v2->idgrupo_documento ?>"><?= $v2->nombre_tipo_documento . ' | ' . $v2->nombre_grupo_documento ?></option>
                    <?php }
                    }; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Nombre del documento</label>
                <input type="text" name="nombre_documento" class="form-control" value="<?= $data['nombre_documento'] ?>" required title="Campo requerido, debe el nombre del documento">
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="formFile2" class="form-label">PDF</label>
                    <input class="form-control" accept="application/pdf" name="pdf_documento" type="file" id="formFile2">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" name="edit" class="btn btn-primary">Enviar</button>
        </div>
    </form>

<?php } ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();

    });
</script>