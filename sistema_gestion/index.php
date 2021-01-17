<?php

session_start();
//user?
if (!isset($_SESSION["id"])) {

	header("location: templates/login.php");
}

include 'model/conexion_db.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mega Envios | Dashboard</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/admitlte.css">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>

  .small-box{
    height: 115px;
  }

</style>

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
        <a href="index.php" class="nav-link">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="templates/solicitar_cliente.php" class="nav-link">Buscar Clientes</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="templates/transferencias.php" class="nav-link">Informe de Transferencias</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="controller/cerrarSesion.php" class="nav-link">Cerrar Sesión</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="img/img-01.png" alt="Mega Envios" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Mega Envios</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/img-01.png" class="img-circle elevation-2" alt="User Image">
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
            <a href="templates/transferencias.php" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Informe de transferencias
              </p>
            </a>
          </li>
         <?php if ($_SESSION['cargo'] == 1) {?>
          <li class="nav-item has-treeview">
            <a href="templates/crear_cliente.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <!--<i class="far fa-circle nav-icon"></i>-->
              <p>
                Control de Clientes
              </p>
            </a>
         <?php }?>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <!--<i class="far fa-circle nav-icon"></i>-->
              <p>
                Actualizar tasa del Día
              </p>
            </a>
          </li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<!-- Main content -->
    <section class="content-wrapper">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php
$result = mysqli_query($conn, "SELECT * FROM tasa where id = 1");
while ($row = mysqli_fetch_array($result)) {
	?>
                <h3><?php echo $row["valor"]; ?></h3>
              <?php
}?>

                <p style="font-size: 14px">VALOR TASA 1 DEL DÍA</p>
              </div>
              <div class="icon">
                <i class="ion-social-usd-outline"></i>
              </div>
              <a href="#editEmployeeModal" data-toggle="modal" class="small-box-footer"><?php echo "Actualizar" ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
<?php
$result = mysqli_query($conn, "SELECT * FROM tasa where id = 2");
while ($row = mysqli_fetch_array($result)) {
	?>
            <h3><?php echo $row["valor"]; ?></h3>

                <p style="font-size: 14px">VALOR TASA 2 DEL DÍA</p>
      <?php }?>
              </div>
              <div class="icon">
                <i class="ion-social-usd-outline"></i>
              </div>
              <a href="#editEmployeeModal2" data-toggle="modal" class="small-box-footer"> Actualizar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
<?php
$result = mysqli_query($conn, "SELECT * FROM tasa where id = 3");
while ($row = mysqli_fetch_array($result)) {
	?>
             <h3><?php echo $row["valor"]; ?></h3>

                <p style="font-size: 14px">VALOR TASA 3 DEL DÍA</p>
      <?php }?>
              </div>
              <div class="icon">
                <i class="ion-social-usd-outline"></i>
              </div>
              <a href="#editEmployeeModal3" data-toggle="modal" class="small-box-footer">Actualizar<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <?php if ($_SESSION['cargo'] == 1) {?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Admin</h3>

                <p>CONTROL DE CLIENTES</p>
              </div>
              <div class="icon">
                <i class="ion-social-usd"></i>
              </div>
              <a href="templates/crear_cliente.php" class="small-box-footer">IR <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php }?>
          <!-- ./col -->

  <!--- CARTERA DE CLIENTES -->
   <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Clientes</h3>

                <p style="font-size: 16px">Buscar Clientes</p>
              </div>
              <div class="icon">
                <i class="ion-person"></i>
              </div>
              <a href="templates/solicitar_cliente.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
  <!-- GENERAR SOLICITUD -->
     <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Generar</h3>

                <p style="font-size: 16px"> Solicitud de Transferencia</p>
              </div>
              <div class="icon">
                <i class="ion-document-text"></i>
              </div>
              <a href="templates/solicitar_cliente.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
       </div>

  </div>


<?php

include 'model/transferencias_model.php';

?>
 <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                        <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Ingresos detallados al día de Hoy</strong>
                    </p>
                    <div class="progress-group">
                      Banesco
                      <span class="float-right"><b><?php
if ($banesco == 0) {
	echo "no se encuentran ingresos";
} else {
	echo $banesco;
}

?></b> Bss. </span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-gray" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Mercantil
                      <span class="float-right"><b><?php
if ($mercantil == 0) {
	echo "no se encuentran ingresos";
} else {
	echo $mercantil;
}

?></b> Bss. </span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Otros (Vzla)
                      <span class="float-right"><b><?php
if ($otros == 0) {
	echo "no se encuentran ingresos";
} else {
	echo $otros;
}

?></b> Bss. </span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Tarjeta UALA
                      <span class="float-right"><b><?php
if ($uala == 0) {
	echo "no se encuentran ingresos";
} else {
	echo $uala;
}

?></b> $</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Mercado Pago
                      <span class="float-right"><b><?php
if ($mercado_pago == 0) {
	echo "no se encuentran ingresos";
} else {
	echo $mercado_pago;
}

?></b> $</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Banco Santander</span>
                      <span class="float-right"><b><?php

if ($santander == 0) {
	echo "no se encuentran ingresos";
} else {
	echo $santander;
}

?></b> $</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Banco BBVA
                      <span class="float-right"><b><?php
if ($bbva == 0) {
	echo "no se encuentran ingresos";
} else {
	echo $bbva;
}
?></b> $</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Efectivo
                      <span class="float-right"><b><?php
if ($efectivo == 0) {
	echo "no se encuentran ingresos";
} else {
	echo $efectivo;
}
?></b> $</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 50%"></div>
                      </div>
                    </div>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>

<!-- Editar tasa 1 -->
  <div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="update_form">
          <div class="modal-header">
            <h4 class="modal-title">Actualizar Primera Tasa</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="id_u" name="id" class="form-control" required>
            <div class="form-group">
              <label>Nuevo valor de Tasa</label>
              <input type="text" id="name_u" name="valor" class="form-control" required>
            </div>
          <input type="hidden" value="2" name="type">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <button type="button" class="btn btn-info" id="update">Actualizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<!-- Editar tasa 2 -->
  <div id="editEmployeeModal2" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="update_form2">
          <div class="modal-header">
            <h4 class="modal-title">Actualizar Segunda Tasa</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="id_u" name="id" class="form-control" required>
            <div class="form-group">
              <label>Nuevo valor de Tasa</label>
              <input type="text" id="valor2" name="valor2" class="form-control" required>
            </div>
          <input type="hidden" value="4" name="type">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <button type="button" class="btn btn-info" id="update2">Actualizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- Editar tasa 3 -->
  <div id="editEmployeeModal3" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="update_form3">
          <div class="modal-header">
            <h4 class="modal-title">Actualizar Tercera Tasa</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="id_u" name="id" class="form-control" required>
            <div class="form-group">
              <label>Nuevo valor de Tasa</label>
              <input type="text" id="valor3" name="valor3" class="form-control" required>
            </div>
          <input type="hidden" value="5" name="type">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <button type="button" class="btn btn-info" id="update3">Actualizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

</body>

<!--<script src="jquery/jquery-3.3.1.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->

<script>

  $(document).on('click','#update',function(e) {
    var data = $("#update_form").serialize();
    $.ajax({
      data: data,
      type: "post",
      url: "model/tasa2.php",
      success: function(dataResult){
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){
            $('#editEmployeeModal').modal('hide');
            alert('Moficación Exitosa !');
                        location.reload();
          }
          else if(dataResult.statusCode==201){
             alert(dataResult);
          }
      }
    });
  });

$(document).on("click", "#update2", function() {
var data = $("#update_form2").serialize();
    $.ajax({
      data: data,
      type: "post",
      url: "model/tasa2.php",
      success: function(dataResult){
      //  alert(dataResult);
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){
            $('#editEmployeeModal').modal('hide');
            alert('Moficación Exitosa !');
                        location.reload();
          }
          else if(dataResult.statusCode==201){
             alert(dataResult);
          }
      }
    });
  });

$(document).on("click", "#update3", function() {
var data = $("#update_form3").serialize();
    $.ajax({
      data: data,
      type: "post",
      url: "model/tasa2.php",
      success: function(dataResult){
      //  alert(dataResult);
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){
            $('#editEmployeeModal').modal('hide');
            alert('Moficación Exitosa !');
                        location.reload();
          }
          else if(dataResult.statusCode==201){
             alert(dataResult);
          }
      }
    });
  });

</script>

</html>
