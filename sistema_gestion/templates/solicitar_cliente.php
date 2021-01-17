<!DOCTYPE html>
<html>
<head>
	<!--<link rel="stylesheet" type="text/css" href="../css/estilo.css">-->
	<title>Clientes</title>
</head>
<body>

	<?php ob_start()?>

<?php $title = 'titulos'?>

<!--<section class="principal">-->
<section class="content-wrapper">
 <div class="container-fluid">
	<h3>Listado de Clientes</h3>

	<div class="formulario">
		<label for="caja_busqueda">Buscar</label>
		<input type="text" name="caja_busqueda" id="caja_busqueda"></input>


	</div>


	<table class="table" id="datos"></table>



</section>




<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/main.js"></script>


	<?php $content = ob_get_clean()?>

	<?php include '../layout.php'?>
</body>


</html>