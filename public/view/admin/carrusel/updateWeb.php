<?php
include "../../../layouts/header_admin.php";

if (isset($_GET['idHide'])) {
    $stmt = $base->prepare('UPDATE carrusel SET estado_carrusel = 0 WHERE idcarrusel = ?');
    $result = $stmt->execute(array($_GET['idHide']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/carrusel";</script>';

} elseif (isset($_GET['idShow'])) {
    $stmt = $base->prepare('UPDATE carrusel SET estado_carrusel = 1 WHERE idcarrusel = ?');
    $result = $stmt->execute(array($_GET['idShow']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/carrusel";</script>';

} else {
    echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/carrusel";</script>';
}
