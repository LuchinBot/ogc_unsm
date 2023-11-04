<?php
$title = "OGC | UNSM";
include "../../layouts/header_admin.php";

if (isset($_POST['add'])) {
  $a = $_POST['idpersona_natural'];
  $b = $_POST['idcargo'];
  $c = $_POST['facebook'];
  $d = $_POST['linkedin'];

  if ($_FILES['foto']['name'] != "") {
    $imagen = "../../../src/img/uploads/" . $_FILES['foto']['name'];
    $imagenUrl = "src/img/uploads/" . $_FILES['foto']['name'];
    move_uploaded_file($_FILES['foto']['tmp_name'], $imagen);

    $stmt = $base->prepare('INSERT INTO personal(idpersona_natural,idcargo,foto,facebook,linkedin) values(?,?,?,?,?)');
    $result = $stmt->execute(array($a, $b, $imagenUrl, $c, $d));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
      echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/personal";</script>';
    }
  }
}

$stmt = $base->prepare('SELECT p.idpersonal, p.estado,pn.nombres,pn.apellidos,c.descripcion from personal as p
inner join persona_natural as pn on (pn.idpersona_natural=p.idpersona_natural)
inner join cargo as c on (c.idcargo=p.idcargo)');
$data = $stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_OBJ);

$stmt = $base->prepare('SELECT pn.idpersona_natural,pn.dni,pn.nombres,pn.apellidos from persona_natural pn left join personal as p
on (p.idpersona_natural = pn.idpersona_natural ) where p.idpersona_natural IS NULL');
$data2 = $stmt->execute();
$data2 = $stmt->fetchAll(PDO::FETCH_OBJ);

$stmt = $base->prepare('SELECT * from cargo where estado = 1');
$data3 = $stmt->execute();
$data3 = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
<?php include "../../layouts/navbar_admin.php"; ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h4 class="m-0" style="font-weight: 700; color: #5B627D">Personal</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= $url ?>public/view/admin/personal">Inicio</a></li>
            <li class="breadcrumb-item active">Personal</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Main content -->
  <section class="content mb-5">
    <div class="container-fluid">
      <p class="text-secondary">
        <i class="fa fa-info-circle"></i>
        En esta sección podrás editar la información o datos generales de la empresa, cualquier cambio estará bajo su responsabilidad.
        <a href="<?= $url ?>public/view/personal" target="_blank" class="font-weight-bold">Visualizar cambios <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
      </p>

      <div class="row bg-white p-4">
        <div class="col pr-5 mr-5 border-right">
          <table id="myTable" class="display">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th>Nombres y apellidos</th>
                <th>Cargo</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data as $v1) : ?>
                <tr>
                  <td class="text-center"><?= $v1->idpersonal ?></td>
                  <td><?= $v1->nombres . ' ' . $v1->apellidos ?></td>
                  <td><?= $v1->descripcion ?></td>
                  <td>
                    <button type="button" class="btn text-white bg-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                    <?php if ($v1->estado == 1) { ?>
                      <a href="ajax/updatePersonal?idHide=<?=$v1->idpersonal?>" class="btn text-white bg-warning"><i class="fa-solid fa-eye"></i></a>
                    <?php } else { ?>
                      <a href="ajax/updatePersonal?idShow=<?=$v1->idpersonal?>" class="btn text-white bg-danger"><i class="fa-solid fa-eye-slash"></i></a>
                    <?php } ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="col">
          <form method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Persona Natural</label>
              <select class="select2" name="idpersona_natural" style="width: 100%;">
                <?php foreach ($data2 as $v2) : ?>
                  <option value="<?= $v2->idpersona_natural ?>"><?= $v2->dni . ' - ' . $v2->nombres . ' ' . $v2->apellidos ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Cargo</label>
              <select class="select2" name="idcargo" style="width: 100%;">
                <?php foreach ($data3 as $v3) : ?>
                  <option value="<?= $v3->idcargo ?>"><?= $v3->descripcion ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Foto</label>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text">Imagen</span>
                </div>
                <div class="custom-file">
                  <input type="file" accept="image/*" class="custom-file-input" name="foto">
                  <label class="custom-file-label">Cargar imagen</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Facebook</label>
              <input type="text" name="facebook" class="form-control" placeholder="" required>
            </div>
            <div class="form-group">
              <label>Linkedin</label>
              <input type="text" name="linkedin" class="form-control" placeholder="" required>
            </div>
            <button type="submit" name="add" class="btn btn-success px-5"><i class="fa-solid fa-location-crosshairs me-3"></i> Agregar</button>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include "../../layouts/footer_admin.php"; ?>
<?php include "../../layouts/scripts.php"; ?>