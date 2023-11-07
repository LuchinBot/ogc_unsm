<?php
require "src/db/conexion.php";
$url = "http://localhost/ogc_unsm/";
session_start();
$display = 0;
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
  <title>Matriz | Dashboard</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <link href="<?= $url ?>src/css/important.css" rel="stylesheet">
  <link href="<?= $url ?>src/css/fontawesome/css/fontawesome.min.css" rel="stylesheet">
  <link href="<?= $url ?>src/css/fontawesome/css/all.min.css" rel="stylesheet">
  <link href="<?= $url ?>src/css/fontawesome/css/solid.min.css" rel="stylesheet">
  <link href="<?= $url ?>src/css/fontawesome/css/brands.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
  <div class="wrapper-login">
    <div class="py-3 px-5 bg-white main-login">
      <div class="error-login" style="opacity:<?= $display ?>">
        <div class="error">
          <i class="fa-solid fa-triangle-exclamation"></i>
        </div>
      </div>
      <div class="mb-2">
        <img src="<?= $url ?>src/img/loginv2.jpg" style="width: 100%;">
      </div>
      <form class="m-t" role="form" method="post">
        <div class="form-inputs" style="display:none">
          <div class="form-group-login">
            <i class="fa-regular fa-user"></i>
            <input type="text" class="form-control-login" name="user" placeholder="USERNAME" autocomplete="off" />
          </div>
          <div class="form-group-login mb-5">
            <i class="fa-regular fa-eye"></i>
            <input type="password" class="form-control-login" name="password" placeholder="XXXXXXXX" autocomplete="off" />
          </div>
        </div>
        <div class="scroll-login">
          <div class="scroll">
            <button type="button" name="login" class="btn-login">
              <i class="fa-solid fa-caret-down"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="<?= $url ?>src/js/jquery-3.7.1.min.js"></script>
<script src="<?= $url ?>src/js/code.js"></script>

</html>