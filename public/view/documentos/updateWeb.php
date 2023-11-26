<?php
include "../../layouts/header_admin.php";

if (isset($_GET['idHide'])) {
    $stmt = $base->prepare('UPDATE documento SET estado_documento = 0 WHERE iddocumento = ?');
    $result = $stmt->execute(array($_GET['idHide']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<script type="text/javascript">window.location="' . $url . 'public/view/documento";</script>';

} elseif (isset($_GET['idShow'])) {
    $stmt = $base->prepare('UPDATE documento SET estado_documento = 1 WHERE iddocumento = ?');
    $result = $stmt->execute(array($_GET['idShow']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<script type="text/javascript">window.location="' . $url . 'public/view/documentos";</script>';

} else {
    echo '<script type="text/javascript">window.location="' . $url . 'public/view/documentos";</script>';
}
