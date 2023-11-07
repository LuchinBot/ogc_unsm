<?php
include "../../../layouts/header_admin.php";

if (isset($_GET['idHide'])) {
    $stmt = $base->prepare('UPDATE personal SET estado = 0 WHERE idpersonal = ?');
    $result = $stmt->execute(array($_GET['idHide']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/personal";</script>';

} elseif (isset($_GET['idShow'])) {
    $stmt = $base->prepare('UPDATE personal SET estado = 1 WHERE idpersonal = ?');
    $result = $stmt->execute(array($_GET['idShow']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/personal";</script>';

} else {
    echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/personal";</script>';
}
