<?php

require_once "connect.php";

$ObjData = new database;

function cuentas_por_cliente($param) {

	$sth = $ObjData->prepare("SELECT num_cuenta, id_cliente, nombre_titular_cuenta, id_cuenta FROM cuenta WHERE id_cliente = :id");

	$sth->bindParam(":id", $id);

	$sth->execute();

	$result = $sth->fetchAll();

	return $result;

}

?>
