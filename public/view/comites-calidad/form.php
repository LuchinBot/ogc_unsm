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
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label>Persona Natural</label>
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
                <div class="col-4 form-group">
                    <label>CUI</label>
                    <input type="text" name="cui_programa" class="form-control" value="<?= $data['cui_programa'] ?>" required title="Campo requerido, debe contener el CUI del programa">
                </div>
                <div class="col-4 form-group">
                    <label>Reporte</label>
                    <input type="text" name="reportes_programa" class="form-control" value="<?= $data['reportes_programa'] ?>" required title="Campo requerido, debe contener el reporte del programa">
                </div>
            </div>
            <div class="row p-3">
                <div class="col-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="2021_1_programa" id="flexSwitchCheckChecked1" <?php if ($data['a2021_1_programa'] == 'on') {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                        <label class="form-check-label" for="flexSwitchCheckChecked1">Reporte 2021-1</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="2021_2_programa" id="flexSwitchCheckChecked2" <?php if ($data['a2021_2_programa'] == 'on') {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                        <label class="form-check-label" for="flexSwitchCheckChecked2">Reporte 2021-2</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="2022_1_programa" id="flexSwitchCheckChecked3" <?php if ($data['a2022_1_programa'] == 'on') {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                        <label class="form-check-label" for="flexSwitchCheckChecked3">Reporte 2022-1</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="2022_2_programa" id="flexSwitchCheckChecked4" <?php if ($data['a2022_2_programa'] == 'on') {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                        <label class="form-check-label" for="flexSwitchCheckChecked4">Reporte 2022-2</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="2023_1_programa" id="flexSwitchCheckChecked5" <?php if ($data['a2023_1_programa'] == 'on') {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                        <label class="form-check-label" for="flexSwitchCheckChecked5">Reporte 2023-1</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="2023_2_programa" id="flexSwitchCheckChecked6" <?php if ($data['a2023_2_programa'] == 'on') {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                        <label class="form-check-label" for="flexSwitchCheckChecked6">Reporte 2023-2</label>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="2024_1_programa" id="flexSwitchCheckChecked7" <?php if ($data['a2024_1_programa'] == 'on') {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                        <label class="form-check-label" for="flexSwitchCheckChecked7">Reporte 2024-1</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="2024_2_programa" id="flexSwitchCheckChecked8" <?php if ($data['a2024_2_programa'] == 'on') {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                        <label class="form-check-label" for="flexSwitchCheckChecked8">Reporte 2024-2</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Observaciones</label>
                <textarea name="observacion_programa" class="form-control" title="Campo requerido, debe contener las observaciones del programa"><?= $data['observacion_programa'] ?></textarea>
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