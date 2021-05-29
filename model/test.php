<?php

include "connect.php";

$objData = new Database();

$q = $objData->prepare('SELECT * FROM cuenta as a LEFT JOIN banco  as b ON a.id_tipo_banco = b.id_banco WHERE id_cuenta = :id');

$q->bindParam(':id', $_POST['id_cuenta']);

$q->execute();
//$q->execute();

$result = $q->fetch(PDO::FETCH_ASSOC);

$nombre = $result['nombre_titular_cuenta'];
$apellido = $result['apellido_titular_cuenta'];
$cedula = $result['cedula_titular_cuenta'];
$banco = $result['tipo_banco'];

$json = array(
	'nombre' => $nombre,
	'apellido' => $apellido,
	'cedula' => $cedula,
	'banco' => $banco,
);

//var_dump($json);die;

echo json_encode($json);

//$con->close();
?>
