<?php
include "../../layouts/header_admin.php";

if (isset($_GET['idHide'])) {
    $stmt = $base->prepare('UPDATE programa SET estado_programa = 0 WHERE idprograma = ?');
    $result = $stmt->execute(array($_GET['idHide']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<script type="text/javascript">window.location="' . $url . 'public/view/comites-calidad";</script>';

} elseif (isset($_GET['idShow'])) {
    $stmt = $base->prepare('UPDATE programa SET estado_programa = 1 WHERE idprograma = ?');
    $result = $stmt->execute(array($_GET['idShow']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<script type="text/javascript">window.location="' . $url . 'public/view/comites-calidad";</script>';

} else {
    echo '<script type="text/javascript">window.location="' . $url . 'public/view/comites-calidad";</script>';
}
