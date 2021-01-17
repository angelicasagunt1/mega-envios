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



</head>


  
  
 
<!-- Main content -->
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
        <center><b><h1><?php echo $row["valor"]; ?></h1></b></center>              

        <?php
}?>

                 <center><h3><p style="font-size: 14px"><b>MERCANTIL</b></p></h3> </center>
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
            <center><b><h1><?php echo $row["valor"]; ?></h1></b></center>

                <center><p style="font-size: 14px"><b>BANESCO</b></p></center>
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
        <center><b><h1><?php echo $row["valor"]; ?></h1></b></center>              

                <center><b><p style="font-size: 14px;">OTROS BANCOS</p></b><center>



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
