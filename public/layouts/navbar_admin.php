<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fa fa-bars"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fa fa-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?=$url?>logout">
        <i class="fa fa-sign-out"></i>
      </a>
    </li>
  </ul>
</nav>
<aside class="main-sidebar bg-dark elevation-4 p-0">
  <!-- Brand Logo -->
  <a href="<?= $url ?>public/view/admin" class="brand-link border-bottom bg-white">
    <img src="<?= $url ?>src/img/default/logo_ogc_UNSM.svg" alt="OGC Logo" style="opacity: .8; ">
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex border-bottom">
      <div class="image">
        <img src="<?= $url ?>src/img/default/user.jpg" class="img-circle elevation-2 mt-1" alt="User Image">
      </div>
      <div class="info" style="line-height: 1.2;">
        <span href="#" class="d-block text-white" style="font-size: 14px;font-weight: 600"><?=$nameUser.' '.$apellidoUser?></span>
        <span style="font-size: 10px; color: #F1F1F1;font-weight: 200"><?=$userData['descripcion_perfil']?></span>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?= $url ?>public/view/admin/" class="nav-link">
            <i class="nav-icon fa fa-home"></i>
            <p>
              Ventana principal
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $url ?>public/view/admin/nosotros" class="nav-link">
            <i class="nav-icon fa fa-institution"></i>
            <p>
              Nosotros generales
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $url ?>public/view/admin/personal" class="nav-link">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Nuestro Personal
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $url ?>public/view/admin/carrusel" class="nav-link">
            <i class="nav-icon fa fa-image"></i>
            <p>
              Carrusel principal
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $url ?>public/view/admin/noticias" class="nav-link">
            <i class="nav-icon fa fa-newspaper"></i>
            <p>
              Nuestras noticias
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $url ?>public/view/admin/eventos" class="nav-link">
            <i class="nav-icon fa fa-calendar-days"></i>
            <p>
              Nuestros eventos
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $url ?>public/view/admin/galeria" class="nav-link">
            <i class="nav-icon fa-solid fa-photo-film"></i>
            <p>
              Nuestra Galería
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $url ?>public/view/admin/enlaces" class="nav-link">
            <i class="nav-icon fa fa-link"></i>
            <p>
              Nuestros Enlaces
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-gear"></i>
            <p style="font-weight: 400;">
              Mantenimiento
              <i class="right fa fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= $url ?>public/view/admin/" class="nav-link">
                <i class="fa fa-id-card nav-icon"></i>
                <p>Perfiles</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $url ?>public/view/admin/" class="nav-link">
                <i class="fa fa-user nav-icon"></i>
                <p>Usuarios</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $url ?>public/view/admin/" class="nav-link">
                <i class="fa fa-user nav-icon"></i>
                <p>Personas Naturales</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $url ?>public/view/admin/" class="nav-link">
                <i class="fa fa-user nav-icon"></i>
                <p>Cargos</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>