<?php

session_start();
//user?
if (!isset($_SESSION["id"])) {

	header("location: templates/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Mega Envios | Pagina Principal</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/admitlte.min.css">
  <link rel="stylesheet" href="../css/admitlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-link" data-widget="pushmenu" role="button">
        <svg class="bi bi-list" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 013 11h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5zm0-4A.5.5 0 013 7h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5zm0-4A.5.5 0 013 3h10a.5.5 0 010 1H3a.5.5 0 01-.5-.5z" clip-rule="evenodd"/></svg></li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../index.php" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="solicitar_cliente.php" class="nav-link">Buscar Clientes</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="transferencias.php" class="nav-link">Informe de Transferencias</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../controller/CerrarSesion.php" class="nav-link">Cerrar Sesión</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../img/img-01.png" alt="Mega Envios" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Mega Envios</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../img/img-01.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Usuario: </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="transferencias.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Informe de transferencias
              </p>
            </a>
          </li>
        <?php if ($_SESSION['cargo'] == 1) {?>
           <li class="nav-item has-treeview">
            <a href="crear_cliente.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <!--<i class="far fa-circle nav-icon"></i>-->
              <p>
                Control de Clientes
              </p>
            </a>
         <?php }?>
          </li>
          <li class="nav-item has-treeview">
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <!--<i class="far fa-circle nav-icon"></i>-->
              <p>
                Tasa del Día
              </p>
            </a>
          </li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

        <?=$content?>


</div>


<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="jquery/jquery-3.3.1.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="../js/admitlte.js"></script>

</body>
</html>
