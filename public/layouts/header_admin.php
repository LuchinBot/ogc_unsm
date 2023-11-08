<?php
require('C:\laragon\www\ogc_unsm\src\db\conexion.php');
$Object = new DateTime();  
$Object->setTimezone(new DateTimeZone('America/Lima'));
$DateAndTime = $Object->format("Y-m-d H:i:s");  

$url = "http://localhost/ogc_unsm/";
session_start();

if (!isset($_SESSION['user'])) {
  echo '<script type="text/javascript">window.location="' . $url . 'login";</script>';
} else {
  $stm = $base->prepare('SELECT * FROM usuario as u
  inner join persona_natural as pn on(pn.idpersona_natural = u.idpersona)
  inner join perfil as p on(p.idperfil = u.idperfil) WHERE u.idusuario = ?');
  $userData = $stm->execute(array($_SESSION['user']));
  $userData = $stm->fetch(PDO::FETCH_ASSOC);

  //Obtener nombre y apellido
  $nameUser = explode(" ", $userData['nombres']);
  $nameUser = $nameUser[0];

  $apellidoUser = explode(" ", $userData['apellidos']);
  $apellidoUser = $apellidoUser[0];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?= $url ?>src/img/default/logo_unsm_only.png" type="image/icon">
  <title><?= $title_page ?> | OGC</title>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <link href="<?= $url ?>src/css/important.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= $url ?>src/css/other/adminlte.min.css">
  <link href="<?= $url ?>src/css/fontawesome/css/fontawesome.min.css" rel="stylesheet">
  <link href="<?= $url ?>src/css/fontawesome/css/all.min.css" rel="stylesheet">
  <link href="<?= $url ?>src/css/fontawesome/css/solid.min.css" rel="stylesheet">
  <link href="<?= $url ?>src/css/fontawesome/css/brands.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <!--Administracion-->
  <link rel="stylesheet" href="<?= $url ?>src/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">