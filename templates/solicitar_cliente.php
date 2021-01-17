<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="../css/estilo.css">-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<title>Clientes</title>
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

	<?php ob_start()?>

<?php $title = 'titulos'?>

<!--<section class="principal">-->
 <div class="container-fluid">
	<h3>Listado de Clientes</h3>

	<div class="formulario">
		<label for="caja_busqueda">Buscar</label>
		<input type="text" name="caja_busqueda" id="caja_busqueda"></input>


	</div>


	<b><table class="my_text" id="datos"></table></b>



<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>


	<?php $content = ob_get_clean()?>

	<?php include '../layout.php'?>
</body>


</html>