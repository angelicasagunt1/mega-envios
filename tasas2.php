
<?php

session_start();
//user?
if (!isset($_SESSION["id"])) {

  header("location: templates/login.php");
}

include 'model/conexion_db.php';
include 'model/transferencias_model.php';


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mega Envíos | CSM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Mercantil</span>
                                <span class="info-box-text"><a href="#editEmployeeModal" data-toggle="modal" class="small-box-footer"><?php echo "Actualizar" ?> <i class="fas fa-arrow-circle-right"></i></a></span>

                <span class="info-box-number"><?php
$result = mysqli_query($conn, "SELECT * FROM tasa where id = 1");
while ($row = mysqli_fetch_array($result)) {
  ?>
        <?php echo $row["valor"]; ?>             

        <?php
}?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Banesco</span>
                <span class="info-box-number"><?php
$result = mysqli_query($conn, "SELECT * FROM tasa where id = 2");
while ($row = mysqli_fetch_array($result)) {
  ?>
        <?php echo $row["valor"]; ?>             

        <?php
}?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Otros Bancos</span>
                <span class="info-box-number"><?php
$result = mysqli_query($conn, "SELECT * FROM tasa where id = 3");
while ($row = mysqli_fetch_array($result)) {
  ?>
        <?php echo $row["valor"]; ?>             

        <?php
}?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div> 
        <!-- /.row -->



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
