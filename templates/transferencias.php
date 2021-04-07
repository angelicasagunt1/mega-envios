<?php

include '../model/conexion_db.php';
date_default_timezone_set('America/Argentina/Buenos_Aires');


$query = "select
a.id_transferencia,
a.fecha,
d.tipo_banco,
b.num_cuenta,
b.nombre_titular_cuenta,
a.importe_titular,
a.importe_cliente,
c.medio_de_pago,
e.nombre_cliente,
e.codigo,
e.nombre_cliente,
e.dni
from transferencias as a
left join cuenta as b on a.id_cuenta_destino = b.id_cuenta
inner join medios_de_pago as c on c.id_medios_de_pago = a.id_medio_pago_cliente
left join banco as d on b.id_tipo_banco = d.id_banco
left join cliente as e on b.id_cliente = e.id_cliente ";

$result = mysqli_query($conn, $query);
?>
<html>
  <?php ob_start()?>
 <head>
  <title>Date Range Search in Datatables using PHP Ajax</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />



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
  text-align: left;
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

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



 </head>
 <body>
  <div class="container box">

   <div class="dataTables">
   <div class="row">

     <div class="input-daterange">

      <div class="col-md-4">
       <input type="text" name="start_date" id="fecha_desde" class="form-control" placeholder="Fecha Desde" autocomplete="off" />
      </div>

      <div class="col-md-4">
       <input type="text" name="end_date" id="fecha_hasta" class="form-control" placeholder="Fecha Hasta" autocomplete="off" />
       </div> <!--DATE RANGE -->

      <div class="col-md-4">
        <select name="banco" class="form-control" id="banco">
          <option value="">Seleccione el banco</option>
          <option value="Banesco">Banesco</option>
          <option value="Mercantil">Mercantil</option>
          <option value="Otros">Otros</option>
        </select>
      </div>


    <!-- <div class="checkbox">
      <label><input type="checkbox" name="hoy" id="hoy" value="">Al día de hoy</label>
      </div>-->

      <div class="col-md-4">
        <select name="medio_de_pago" id="medio_de_pago" class="form-control" id="banco">
          <option value="">Medios de Pago</option>
          <option value="UALA">UALA</option>
          <option value="SANTANDER">SANTANDER</option>
          <option value="BBVA">BBVA</option>
          <option value="MERCADO PAGO">MERCADO PAGO</option>
          <option value="EFECTIVO">Efectivo</option>
        </select>
    </div>
 <br />
     <div class="col-md-4">
      <input type="button" name="search" id="search" value="Filtrar" class="btn btn-info" />
      <input type="button" name="convert" id="convert" value="Descargar Excel" class="btn
      btn-success" />
     </div>
     </div> <!--ROW-->
    </div>
    <br />
    <form method="POST" id="convert_form" action="../export.php">
       <!--<button type="button" name="convert" id="convert" class="btn btn-primary">Convert</button>-->

    <table class="my_text"  id="table_content">
     <thead>
      <tr>
       <th>#</th>
       <th>Clte</th>
       <th>Fecha</th>
       <th>Banco</th>
       <th>Cuenta</th>
       <th>Titular</th>
       <th>Pesos</th>
       <th>Bolívares</th>
       <th>Medio</th>
       <th>Nombre Cliente</th>
       <th>DNI Cliente </th>
       <th>Editar</th>
      </tr>
    </thead>
      <?php
while ($row = mysqli_fetch_array($result)) {
  ?>
          <tr>
            <td><?php echo $row["id_transferencia"]; ?> </td>
            <td><b><?php echo $row["codigo"]; ?><b> </td>
            <td><?php echo $row["fecha"]; ?> </td>
            <td><b><?php echo $row["tipo_banco"]; ?> </b></td>
            <td><?php echo $row["num_cuenta"]; ?> </td>
            <td><b><?php echo $row["nombre_titular_cuenta"]; ?></b> </td>
            <td><?php echo $row["importe_titular"]; ?> </td>
            <td><b><?php echo $row["importe_cliente"]; ?></b> </td>
            <td><?php echo $row["medio_de_pago"]; ?> </td>
            <td><?php echo $row["nombre_cliente"]; ?> </td>
            <td><?php echo $row["dni"]; ?> </td>
            <td><a href="#" id="<?php echo $row["id_transferencia"]; ?>" class="delbutton" title="Presiona para borrar">Eliminar</a></td>
          </tr>
          <?php
}?>

    </table>
    <input type="hidden" name="file_content" id="file_content" />
  </form>
   </div>
  </div>
 </body>
</html>

    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>

    <!-- para usar botones en datatables JS -->
    <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

    <!-- código JS propìo-->
    <script type="text/javascript" src="main.js"></script>



<script type="text/javascript" language="javascript" >

 $(function() {
        $(document).on('click','.delbutton',function(){
        var element = $(this);
        var del_id = element.attr("id");

        var info = 'id=' + del_id;
        if(confirm("¿Estás seguro de borrar este registro?")){
            $.ajax({
                type: "POST",
                url: "../model/delete_trans.php",
                data: info,
                success: function(res){
                  alert('Eliminación Exitosa!');
                   location.reload();
                 }
            });
        }
        return false;
        });
        });

$(document).ready(function(){

  $.datepicker.setDefaults({
    dateFormat: 'yy-mm-dd',
    dayNames: ["Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"],
    dayNamesMin: ["Do", "Lu","Ma","Mi","Ju","Vi","Sa"],
    monthName: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre", "Octubre","Noviembre", "Diciembre"],
    monthNameShort: ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep", "Oct","Nov", "Dic"],

  });


  $("#fecha_desde").datepicker();
  $("#fecha_hasta").datepicker();

$("#search").click(function(){

  var fecha_desde = $("#fecha_desde").val();
  var fecha_hasta = $("#fecha_hasta").val();
  //var hoy = $("#hoy").val();
  var banco = $("#banco").val();
  var medio = $("#medio_de_pago").val();
  console.log(fecha_desde);
  console.log(fecha_hasta);
  console.log(medio);
  if(fecha_desde != '' && fecha_hasta !='')
  {
    $.ajax({
        url:"../model/transferencias.php",
        method:"POST",
        data:{fecha_desde: fecha_desde, fecha_hasta: fecha_hasta, banco: banco, medio: medio},
        success:function(data){
          $("#table_content").html(data);
        }
    });

  }
  else
  {
    alert("por favor selecciona una fecha");
  }
});

});

$(document).ready(function(){
  $('#convert').click(function(){
    var table_content = '<table>';
    table_content += $('#table_content').html();
    table_content += '</table>';
    $('#file_content').val(table_content);
    $('#convert_form').submit();
  });
});

</script>
<?php $content = ob_get_clean()?>

<?php include '../layout_cuentas.php'?>