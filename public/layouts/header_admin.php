<?php
require('C:\laragon\www\ogc_unsm\src\db\conexion.php');

$url = "http://localhost/ogc_unsm/";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?= $url ?>src/img/logo_ogc.png" type="image/icon">
  <title><?= $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <link href="<?= $url ?>src/css/important.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= $url ?>src/css/adminlte.min.css">
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