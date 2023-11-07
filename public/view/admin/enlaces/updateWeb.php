<?php
include "../../../layouts/header_admin.php";

if (isset($_GET['idHide'])) {
    $stmt = $base->prepare('UPDATE enlace SET estado_enlace = 0 WHERE idenlace = ?');
    $result = $stmt->execute(array($_GET['idHide']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/enlaces";</script>';

} elseif (isset($_GET['idShow'])) {
    $stmt = $base->prepare('UPDATE enlace SET estado_enlace = 1 WHERE idenlace = ?');
    $result = $stmt->execute(array($_GET['idShow']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/enlaces";</script>';

} else {
    echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/enlaces";</script>';
}
