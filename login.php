<?php
require "src/db/conexion.php";
$url = "http://localhost/ogc_unsm/";
session_start();
$display = 0;
if (isset($_SESSION['user'])) {
  echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/";</script>';
}

if (isset($_POST['login'])) {
  $a = $_POST['user'];
  $b = $_POST['password'];

  $stmt = $base->prepare('select * from usuario where username = ? and keypass = ? ');
  $result = $stmt->execute(array($a, $b));
  $result = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($result) {
    $_SESSION['user'] = $result['idusuario'];
    echo '<script>window.location.href = "' . $url . 'public/view/admin/";</script>';
  } else {
    $display = 1;
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= $url ?>src/img/default/logo_unsm_only.png" type="image/icon">
  <title>Logueo | OGC</title>

  <!--Google-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

  <!--Other-->
  <link href="<?= $url ?>src/css/important.css" rel="stylesheet">
  <link href="<?= $url ?>src/plugins/fontawesome/css/fontawesome.min.css" rel="stylesheet">
  <link href="<?= $url ?>src/plugins/fontawesome/css/all.min.css" rel="stylesheet">
  <link href="<?= $url ?>src/plugins/fontawesome/css/solid.min.css" rel="stylesheet">
  <link href="<?= $url ?>src/plugins/fontawesome/css/brands.min.css" rel="stylesheet">
  <link href="<?= $url ?>src/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="wrapper-login">
    <div class="py-3 px-5 bg-white main-login">
      <div class="error-login" style="opacity:<?= $display ?>">
        <div class="error-text">
          <i class="fa-solid fa-triangle-exclamation"></i>
        </div>
      </div>
      <div class="mb-2">
        <img src="<?= $url ?>src/img/default/login.jpg" style="width: 100%;">
      </div>
      <form class="m-t" role="form" method="post">
        <div class="form-inputs" style="display:none">
          <div class="form-group-login">
            <i class="fa-regular fa-user"></i>
            <input type="text" class="form-control-login" name="user" placeholder="usuario" autocomplete="off" />
          </div>
          <div class="form-group-login mb-5">
            <i class="fa-regular fa-eye"></i>
            <input type="password" class="form-control-login" name="password" placeholder="contraseña" autocomplete="off" />
          </div>
        </div>
        <div class="scroll-login">
          <div class="scroll">
            <button type="button" style="background: transparent; border: none" name="login" class="btn-login text-white">
              <i class="fa-solid fa-caret-down"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
<script src="<?= $url ?>src/plugins/popper/popper.min.js"></script>
<script src="<?= $url ?>src/plugins/bootstrap/bootstrap.min.js"></script>
<script src="<?= $url ?>src/plugins/jquery/jquery.min.js"></script>
<script src="<?= $url ?>src/js/public/code.js"></script>

</html>