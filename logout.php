<?php
$url = "http://localhost/ogc_unsm/";

session_start();
session_destroy();
echo '<script>window.location.href = "' . $url . '";</script>';
?>