<?php
require('../../layouts/database/connection.php');


if (isset($_GET['id'])) {

    //Listado
    $stmt = $base->prepare('SELECT * from programa where idprograma= ?');
    $data = $stmt->execute(array($_GET['id']));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);


    $stmt = $base->prepare('SELECT* from comite where estado_comite = 1');
    $data2 = $stmt->execute();
    $data2 = $stmt->fetchAll(PDO::FETCH_OBJ);

    $stmt = $base->prepare('SELECT * from facultad where estado_facultad = 1');
    $data3 = $stmt->execute();
    $data3 = $stmt->fetchAll(PDO::FETCH_OBJ);

    $stmt = $base->prepare('SELECT * from persona_natural');
    $data4 = $stmt->execute();
    $data4 = $stmt->fetchAll(PDO::FETCH_OBJ);


?>
    <form class="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <input class="form-control" name="idprograma" type="text" value="<?= $data['idprograma'] ?>" hidden>
            <div class="row">
                <div class="form-group col-6">
                    <label>Comite</label>
                    <select class="select2" name="idcomite" style="width: 100%;" required title="Campo requerido">
                        <?php foreach ($data2 as $v2) {
                            if ($v2->idcomite == $data['idcomite']) { ?>
                                <option selected value="<?= $v2->idcomite ?>"><?= $v2->nombre_comite ?></option>
                            <?php } else { ?>
                                <option value="<?= $v2->idcomite ?>"><?= $v2->nombre_comite ?></option>
                        <?php }
                        }; ?>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label>Facultad</label>
                    <select class="select2" name="idfacultad" style="width: 100%;" required title="Campo requerido">
                        <?php foreach ($data3 as $v2) {
                            if ($v2->idfacultad == $data['idfacultad']) { ?>
                                <option selected value="<?= $v2->idfacultad ?>"><?= $v2->nombre_facultad ?></option>
                            <?php } else { ?>
                                <option value="<?= $v2->idfacultad ?>"><?= $v2->nombre_facultad ?></option>
                        <?php }
                        }; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label>Nombre del programa</label>
                    <input type="text" name="nombre_programa" class="form-control" value="<?= $data['nombre_programa'] ?>" required title="Campo requerido, debe contener el nombre del programa">
                </div>
                <div class="form-group col-6">
                    <div class="mb-3">
                        <label for="formFile2" class="form-label">PDF del programa</label>
                        <input class="form-control" accept="application/pdf" name="pdf_programa" type="file" id="formFile2" title="Campo requerido, debe contener un pdf">
                    </div>
                </div>
                <div class="form-group col-6">
                    <label>Resolucion</label>
                    <input type="text" name="resolucion_programa" class="form-control" value="<?= $data['resolucion_programa'] ?>" required title="Campo requerido, debe contener la resolucion del programa">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-3">
                    <label>Representante</label>
                    <select class="select2" name="idpersona_natural" style="width: 100%;" required title="Campo requerido">
                        <?php foreach ($data4 as $v2) {
                            if ($v2->idpersona_natural == $data['idpersona_natural']) { ?>
                                <option selected value="<?= $v2->idpersona_natural ?>"><?= $v2->dni . ' - ' . $v2->nombres . ' ' . $v2->apellidos ?></option>
                            <?php } else { ?>
                                <option value="<?= $v2->idpersona_natural ?>"><?= $v2->dni . ' - ' . $v2->nombres . ' ' . $v2->apellidos ?></option>
                        <?php }
                        }; ?>
                    </select>
                </div>
                <div class="col-3 form-group">
                    <label>Cargo</label>
                    <input type="text" name="cui_programa" class="form-control" value="<?= $data['cui_programa'] ?>" required title="Campo requerido, debe contener el CUI del programa">
                </div>
                <div class="col-3 form-group">
                    <label>Email</label>
                    <input type="email" name="reportes_programa" class="form-control" value="<?= $data['reportes_programa'] ?>" required title="Campo requerido, debe contener el reporte del programa">
                </div>
                <div class="form-group col-3">
                    <label>Teléfono</label>
                    <input type="phone" name="observacion_programa" class="form-control" title="Campo requerido, debe contener el telefono del programa" value="<?= $data['observacion_programa'] ?>">
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