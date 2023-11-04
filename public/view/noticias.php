<?php
$title = "Noticias | OGC";
include "../layouts/header.php"; 

$stmt = $base->prepare('select * from empresa ');
$data = $stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<?php include "../layouts/navbar.php"; ?>

<div class="container d-flex py-3 justify-content-center align-items-center">
   
</div>

<?php include "../layouts/footer.php"; ?>
<?php include "../layouts/scripts.php"; ?>