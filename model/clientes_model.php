<?php

include 'conexion_db.php';

if (count($_POST) > 0) {
	if ($_POST['type'] == 1) {
		//$id = $_POST['id_cliente'];
		$codigo = $_POST['codigo'];
		$name = $_POST['name'];
		$apellido = $_POST['apellido'];
		$telefono = $_POST['telefono'];
		$dni = $_POST['dni'];
		$sql = "INSERT INTO cliente (codigo, nombre_cliente, apellido_cliente, telefono_cliente, dni) VALUES ('$codigo','$name', '$apellido', '$telefono', '$dni' )";

		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode" => 200));
			//echo $sql;
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if (count($_POST) > 0) {
	if ($_POST['type'] == 2) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$apellido = $_POST['apellido'];
		$telefono = $_POST['telefono'];
		$dni = $_POST['dni'];
		// ,`apellido_cliente`='$apellido',`telefono_cliente`='$telefono',`dni`='$dni'
		$sql = "UPDATE cliente SET nombre_cliente='$name', apellido_cliente='$apellido', telefono_cliente = '$telefono', dni= '$dni' WHERE id_cliente=$id";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode" => 200));
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if (count($_POST) > 0) {
	if ($_POST['type'] == 3) {
		$id = $_POST['id'];
		$sql = "DELETE FROM `cliente` WHERE id_cliente= $id";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}
if (count($_POST) > 0) {
	if ($_POST['type'] == 4) {
		$id = $_POST['id'];
		$sql = "DELETE FROM cliente WHERE id in ($id)";
		if (mysqli_query($conn, $sql)) {
			echo $id;
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

?>