<?php
include "../../layouts/header_admin.php";

if (isset($_GET['idHide'])) {
    $stmt = $base->prepare('UPDATE noticia SET estado_noticia = 0 WHERE idnoticia = ?');
    $result = $stmt->execute(array($_GET['idHide']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<script type="text/javascript">window.location="' . $url . 'public/view/noticias";</script>';

} elseif (isset($_GET['idShow'])) {
    $stmt = $base->prepare('UPDATE noticia SET estado_noticia = 1 WHERE idnoticia = ?');
    $result = $stmt->execute(array($_GET['idShow']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    echo '<script type="text/javascript">window.location="' . $url . 'public/view/noticias";</script>';

} else {
    echo '<script type="text/javascript">window.location="' . $url . 'public/view/noticias";</script>';
}
