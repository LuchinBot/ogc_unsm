<?php
include "../../../layouts/header_admin.php";

if (isset($_GET['idHide'])) {
    $stmt = $base->prepare('UPDATE evento SET estado_evento = 0 WHERE idevento = ?');
    $result = $stmt->execute(array($_GET['idHide']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/eventos";</script>';

} elseif (isset($_GET['idShow'])) {
    $stmt = $base->prepare('UPDATE evento SET estado_evento = 1 WHERE idevento = ?');
    $result = $stmt->execute(array($_GET['idShow']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/eventos";</script>';

} else {
    echo '<script type="text/javascript">window.location="' . $url . 'public/view/admin/eventos";</script>';
}
