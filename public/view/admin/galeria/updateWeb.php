<?php
$title_page = "";
include "../../../layouts/header_admin.php";

if (isset($_GET['id'])) {
    $stmt = $base->prepare('DELETE FROM galeria WHERE idgaleria = ?');
    $result = $stmt->execute(array($_GET['id']));
}
?>
