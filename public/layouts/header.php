<?php
require('C:\laragon\www\ogc_unsm\src\db\conexion.php');

$url = "http://localhost/ogc_unsm/";
$active1 = "";
$active2 = "";
$active3 = "";
$active4 = "";
$active5 = "";
?>
<!DOCTYPE html>
<html lang="en" style="height: auto;">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--Icon-->
  <link rel="icon" href="<?= $url ?>src/img/default/logo_unsm_only.png" type="image/icon">
  <title><?= $title ?></title>

  <!--Google-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <!--Page-->
  <link href="<?= $url ?>src/css/styles.css" rel="stylesheet">

  <!--Others-->
  <link href="<?= $url ?>src/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="<?= $url ?>src/plugins/fontawesome/css/fontawesome.min.css" rel="stylesheet">
  <link href="<?= $url ?>src/plugins/fontawesome/css/all.min.css" rel="stylesheet">
  <link href="<?= $url ?>src/plugins/fontawesome/css/solid.min.css" rel="stylesheet">
  <link href="<?= $url ?>src/plugins/fontawesome/css/brands.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

</head>

<body>
  <div class="main">