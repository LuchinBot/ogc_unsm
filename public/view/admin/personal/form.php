<?php
require('C:\laragon\www\ogc_unsm\src\db\conexion.php');


if (isset($_GET['id'])) {

    //Listado
    $stmt = $base->prepare('SELECT * from personal as p
    inner join persona_natural as pn on (pn.idpersona_natural=p.idpersona_natural)
    inner join cargo as c on (c.idcargo=p.idcargo) where p.idpersonal = ?');
    $data = $stmt->execute(array($_GET['id']));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $base->prepare('SELECT * from persona_natural pn left join personal as p
    on (p.idpersona_natural = pn.idpersona_natural ) where p.idpersona_natural IS NULL');
    $data2 = $stmt->execute();
    $data2 = $stmt->fetchAll(PDO::FETCH_OBJ);

    $stmt = $base->prepare('SELECT * from cargo where estado = 1');
    $data3 = $stmt->execute();
    $data3 = $stmt->fetchAll(PDO::FETCH_OBJ);

    //var_dump($data);


?>
    <form class="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <input class="form-control" name="idpersonal" type="text" value="<?= $data['idpersonal'] ?>" hidden>
            <div class="form-group">
                <label class="form-label">Persona Natural</label>
                <select class="select2" name="idpersona_natural" style="width: 100%;">
                    <option selected value="<?= $data['idpersona_natural'] ?>"><?= $data['dni'] . ' - ' . $data['nombres'] . ' ' . $data['apellidos'] ?></option>
                    <?php foreach ($data2 as $v2) { ?>
                        <option value="<?= $v2->idpersona_natural ?>"><?= $v2->dni . ' - ' . $v2->nombres . ' ' . $v2->apellidos ?></option>
                    <?php }; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Cargo</label>
                <select class="select2" name="idcargo" style="width: 100%;">
                    <?php foreach ($data3 as $v3) :
                        if ($v3->idcargo == $data['idcargo']) { ?>
                            <option selected value="<?= $v3->idcargo ?>"><?= $v3->descripcion ?></option>
                        <?php } else { ?>
                            <option value="<?= $v3->idcargo ?>"><?= $v3->descripcion ?></option>
                    <?php }
                    endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <div class="mb-3">
                    <label for="formFile2" class="form-label">FOTO</label>
                    <input class="form-control" accept="image/*" name="foto" type="file" id="formFile2">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Facebook</label>
                <input type="url" name="facebook" class="form-control" value="<?= $data['facebook'] ?>" required>
            </div>
            <div class="form-group">
                <label class="form-label">Linkedin</label>
                <input type="url" name="linkedin" class="form-control" value="<?= $data['linkedin'] ?>" required>
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