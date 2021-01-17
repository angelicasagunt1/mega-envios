<?php

require_once '../model/cuentas_model.php';

include '../model/conexion_db.php';

//require_once '../cambio.php';
$id = $_GET["id"];
$nombre = $_GET["nombre_cliente"];
$apellido = $_GET["apellido"];
//echo $_POST["ab"];
require_once "../model/connect.php";

$ObjData = new database;
$sth = $ObjData->prepare("SELECT num_cuenta, id_cliente, nombre_titular_cuenta, id_cuenta FROM cuenta WHERE id_cliente = :id");
$sth->bindParam(":id", $id);
$sth->execute();
$result = $sth->fetchAll();

$sth2 = $ObjData->prepare("SELECT * FROM medios_de_pago");
$sth2->execute();
$result2 = $sth2->fetchALL();

$sth3 = $ObjData->prepare("SELECT * FROM banco");
$sth3->execute();
$result4 = $sth3->fetchALL();

$sth4 = $ObjData->prepare("SELECT * FROM tasa");
$sth4->execute();
$result5 = $sth4->fetchALL();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />
    <title>Mega-Envios</title>

     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/form_style.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


  </head>
   <style>

 .my_text

 {

  font-family: Arial, Helvetica, sans-serif;
  font-size:  10px !important;
  font-weight:    normal;

  border-collapse: collapse;
  width: 100%;
}

th, td {
  font-family: Arial, Helvetica, sans-serif!important;
  font-size:  13px !important;
  text-align: center;
  padding: 6px!important;
  border:1px solid #ccc;
}

tr:nth-child(even) {background-color: #f2f2f2;}
         

   body
   {
    margin:0;
    padding:0;
    background-color:#f4f6f9;
   }
   .box
   {
    width:2000px;
    padding:10px;
    background-color:#fff;
    border:0px solid #ccc;
    border-radius:0px;
    margin-top:10px;
   }
  </style>
  <body>



<!--
     <header style="height: 70px">
     </header>-->

<?php ob_start()?>

    <section class="content-wrapper">
    <div class="container-fluid">

    <div style="height: 30px;"></div>

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

            <div class="card shadow-lg p-3 mb-5 bg-white ">

        <center><h2> <strong>Cliente: </strong> <?php echo $nombre . " " . $apellido  ?></h2></center>

          <table border=0 class='my_text'>
          <thead>
            <tr id='titulo'>
              <td><strong>Número de Cuenta</strong></td>
              <td><strong>Banco</strong></td>
              <td><strong>Nombre Beneficiario</strong></td>
              <td><strong>Cédula</strong></td>
              <td><strong>Editar</strong></td>
            </tr>
          </thead>
      <tbody>

        <?php
$result3 = mysqli_query($conn, "select * from cuenta as a inner join banco as b on a.id_tipo_banco = b.id_banco where a.id_cliente = $id");
while ($row = mysqli_fetch_array($result3)) {
	?>
      <tr>
          <td><?php echo $row["num_cuenta"]; ?></td>
          <td><b><?php echo $row["tipo_banco"]; ?></b></td>
          <td><?php echo $row["nombre_titular_cuenta"]; ?></td>
          <td><?php echo $row["cedula_titular_cuenta"]; ?></td>
          <td><a href="#editEmployeeModal" class="edit" data-toggle="modal">
              <i class="material-icons update" data-toggle="tooltip"
              data-id="<?php echo $row["id_cuenta"]; ?>"
              data-num_cuenta="<?php echo $row["num_cuenta"]; ?>"
              data-banco="<?php echo $row["tipo_banco"]; ?>"
              data-nombre="<?php echo $row["nombre_titular_cuenta"]; ?>"
              data-apellido="<?php echo $row["apellido_titular_cuenta"]; ?>"
              data-telefono="<?php echo $row["apellido_titular_cuenta"]; ?>"
              data-cedula="<?php echo $row["cedula_titular_cuenta"]; ?>"
              title="Editar"></i>
            </a></td>
        </tr>
        <?php }?>
      </tbody>
      </table>

        <div class="card-body">

        <form id="form1" action="../model/procesar_formulario.php?id=<?php echo $id ?>" method="post" class="needs-validation">

		 <div class="form-row">
            <div class="col-md-4 mb-3">
            <label>Seleccione cuenta destino:</label>
			      <select name="num_cuenta"  id="num_cuenta"  class="form-control" required>
             <option value="">Seleccione la cuenta bancaria</option>
			       <?php foreach ($result as $key => $value) {?>
			       <option value=<?php echo $value['id_cuenta'] ?>> <?php echo $value['num_cuenta'] ?> </option> <?php }?>
			       </select>
		 </div>

     <div class="col-md-4 mb-3">
            <label for="nombre_titular">Banco</label>
            <div class="input-group">
            <input type="text" name="tipo_banco" value="" id="tipo_banco"class="form-control" readonly />
            <div class="valid-feedback">¡Ok válido!</div>
            <div class="invalid-feedback">Complete el campo.</div>
            </div>
     </div>

		 <div class="col-md-4 mb-3">
            <label for="nombre_titular">Nombre y Apellido del titular</label>
            <div class="input-group">
            <input type="text" name="nombre_titular" id="nombre" value="" class="form-control" readonly />
            <div class="valid-feedback">¡Ok válido!</div>
            <div class="invalid-feedback">Complete el campo.</div>
            </div>
     </div>
     <input type="hidden" name="Apellido" id="apellido" value="s/n" class="form-control"/>
<!--
      <div class="col-md-4 mb-3">
            <label for="nombre_titular">Apellido del titular</label>
            <div class="input-group">
            <input type="text" name="Apellido" id="apellido" value="" class="form-control"/>
            <div class="valid-feedback">¡Ok válido!</div>
            <div class="invalid-feedback">Complete el campo.</div>
            </div>
      </div>
-->
      <div class="col-md-4 mb-3">
            <label for="nombre_titular">Cedula del titular</label>
            <div class="input-group">
            <input type="text" name="cedula" value="" id="cedula" class="form-control" readonly />
            <div class="valid-feedback">¡Ok válido!</div>
            <div class="invalid-feedback">Complete el campo.</div>
            </div>
      </div>

      <div class="col-md-4 mb-3">
            <label for="usuario">Tasa actual</label>
            <select name="valor" class="form-control" required>
                          <option value="">Seleccione tipo de tasa</option>
                          <?php foreach ($result5 as $key => $value) {?>
                          <option value=<?php echo $value['valor'] ?>> <?php echo $value['valor'] ?> </option> <?php }?>
                    </select>
      </div>

      <div class="col-md-4 mb-3">
            <label>Metodo de Pago </label>
            <div class="input-group">
            <select name="tipo_pago" class="form-control" required>
            <option value="">Seleccione Metodo de Pago</option>
            <?php foreach ($result2 as $key => $value) {?>
            <option value=<?php echo $value['id_medios_de_pago'] ?>> <?php echo $value['medio_de_pago'] ?> </option> <?php }?>
            </select>
                    <div class="valid-feedback">¡Ok válido!</div>
                    <div class="invalid-feedback">Complete el campo.</div>
            </div>
      </div>

      <div class="col-md-4 mb-3">
            <label for="importe_pesos">Importe en pesos</label>
            <div class="input-group">
            <input name="importe_pesos" type="text" class="form-control" id="importe" placeholder="" aria-describedby="inputGroupPrepend" required>
            <span class="input-group-text">.00</span>
            </div>
      </div>


  </div> <!--DIV-FORM -->

                <div class="form-group">
                    <div class="form-check">
                    <div class="valid-feedback">¡Aceptado!</div>
                    </div>

                    <button class="btn btn-primary" type="submit">Enviar</button>
                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Agregar Nueva Cuenta</span></a>

            </form>

                 </div>
                 <a href="../templates/solicitar_cliente.php" class="btn btn-warning">Volver</a>
            </div>
            </div>
        </div>
    </div>

      <!-- AGREGAR CLIENTE -->
  <div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="user_form">
          <div class="modal-header">
            <h4 class="modal-title">Agregar Cuenta</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" name="id_cliente" value=<?php echo $id ?>>
              <label>Numero de Cuenta</label>
              <input type="text" id="num_cuenta" name="num"  class="form-control" required>
            </div>
            <div class="form-group">
              <label>Banco</label>
              <select name="tipo_pago" class="form-control">
                          <option value="">Seleccione el tipo de Banco</option>
                          <?php foreach ($result4 as $key => $value) {?>
                          <option value=<?php echo $value['id_banco'] ?>> <?php echo $value['tipo_banco'] ?> </option> <?php }?>
                    </select>
            </div>
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
           <!-- <div class="form-group">
              <label>cuenta ID</label>
              <input type="text" id="cuenta" name="cuenta" class="form-control" required>
            </div>
            </div>-->
            <div class="form-group">
             <!-- <label>Apellido</label>-->
              <input type="hidden" id="apellido" name="apellido" class="form-control" value="s/n" required>
            </div>
            <div class="form-group">
              <label>Cédula</label>
              <input type="text" id="cedula" name="cedula" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
              <input type="hidden" value="1" name="type">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <button type="button" class="btn btn-success" id="btn-add">Agregar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- EDITAR VENTANA MODAL -->
  <div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="update_form">
          <div class="modal-header">
            <h4 class="modal-title">Editar Clientes</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="id_u" name="id" class="form-control" required>
            <div class="form-group">
              <label>Numero de cuenta</label>
              <input type="text" id="num_cuenta_u" name="num_cuenta" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Banco</label>
              <select name="tipo_pago" class="form-control">
              <option value="">Seleccione el tipo de Banco</option>
              <?php foreach ($result4 as $key => $value) {?>
              <option value=<?php echo $value['id_banco'] ?>> <?php echo $value['tipo_banco'] ?> </option> <?php }?>
              </select>
            </div>
            <div class="form-group">
              <label>Nombre y Apellido</label>
              <input type="phone" id="nombre_u" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
              <!--<label>Apellido</label>-->
              <input type="hidden" id="apellido_u" name="apellido" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Cédula</label>
              <input type="city" id="cedula_u" name="cedula" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
          <input type="hidden" value="2" name="type">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <button type="button" class="btn btn-info" id="update">Actualizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- jQuery -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- BS JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript" src="../js/crud_cuentas.js"></script>

<script type="text/javascript" src="../js/cuentas_id.js"></script>


<?php $content = ob_get_clean()?>

<?php include '../layout_cuentas.php'?>

</html>