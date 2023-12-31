<div class="top-navbar  container-fluid py-2 px-5 bg-success">
    <div class="container col-12 d-flex">
        <div class="contactos-top col-6 d-flex justify-content-start align-items-center">
            <a href="https://www.facebook.com/unsmperu" class="text-success">
                <div class="contact-a px-1 mx-2 bg-white">
                    <i class="fa-brands fa-facebook"></i>
                </div>
            </a>
            <a href="https://www.facebook.com/unsmperu" class="text-success">
                <div class="contact-a px-1 mx-2 bg-white">
                    <i class="fa-brands fa-twitter"></i>
                </div>
            </a>
            <a href="https://www.facebook.com/unsmperu" class="text-success">
                <div class="contact-a px-1 mx-2 bg-white">
                    <i class="fa-brands fa-youtube"></i>
                </div>
            </a>
            <a href="tel:+51042525540" class="text-success">
                <div class="contact-a px-1 mx-2 bg-white">
                    <i class="fa fa-phone"></i>
                </div>
            </a>
            <span class="text-white informe-navbar">(+51) (042) 52 5540 | informes@unsm.edu.pe</span>
        </div>
        <div class="enlaces-top col-6 d-flex justify-content-end align-items-center">
            <ul class="d-flex m-0 p-0" style="list-style: none !important;">
                <li class="nav-item"><a href="https://unsm.edu.pe/">portal unsm</a></li>
            </ul>
        </div>
    </div>
</div>
<nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary bg-white" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
    <div class="container py-1">
        <a class="navbar-brand d-flex" href="<?= $url ?>">
            <img src="<?= $url ?>src/img/default/logo_ogc_unsm.svg" style="width:100%">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 col-12 justify-content-end">
                <li class="nav-item position-relative me-2">
                    <a class="nav-link <?= $active1 ?>" aria-current="page" href="<?= $url ?>">Home</a>
                </li>
                <li class="nav-item position-relative me-2">
                    <a class="nav-link <?= $active2 ?>" href="<?= $url ?>nosotros">Nosotros</a>
                </li>
                <li class="nav-item position-relative me-2">
                    <a class="nav-link <?= $active3 ?>" href="<?= $url ?>personal">Personal</a>
                </li>
                <li class="nav-item position-relative me-2">
                    <a class="nav-link <?= $active4 ?>" href="<?= $url ?>noticias">Noticias</a>
                </li>
                <?php
                $stmt = $base->prepare('select * from evento where estado_evento=1 order by idevento desc limit 10');
                $evento = $stmt->execute();
                $evento = $stmt->fetchAll(PDO::FETCH_OBJ);

                ?>
                <li class="nav-item position-relative me-2 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Eventos
                    </a>
                    <ul class="dropdown-menu w-100">
                        <?php foreach ($evento as $v) : ?>
                            <li class="w-100"><a class="dropdown-item text-truncate" href="<?= $url ?>evento?ver=<?= $v->idevento ?>&title=<?= $v->titulo_evento ?>"><?= $v->titulo_evento ?></a></li>
                        <?php endforeach; ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="<?= $url ?>eventos">Ver todos</a></li>
                    </ul>
                </li>
                <li class="nav-item position-relative me-2 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Calidad
                    </a>
                    <ul class="dropdown-menu" style="width: 200px;">
                        <li class="w-100"><a class="dropdown-item text-truncate" href="<?= $url ?>comites-calidad">Comités de Calidad</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="w-100"><a class="dropdown-item text-truncate" href="<?= $url ?>documentos">Documentos</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>