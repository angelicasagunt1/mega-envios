<?php

include 'conexion_db.php';

if (count($_POST) > 0) {
	if ($_POST['type'] == 2) {
		$id = $_POST['id'];
		$valor = $_POST['valor'];
		if (empty($valor)) {
			echo "error_1";
		}
		// ,`apellido_cliente`='$apellido',`telefono_cliente`='$telefono',`dni`='$dni'
		$sql = "UPDATE tasa SET valor='$valor' WHERE id=1";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode" => 200));
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

if (count($_POST) > 0) {
	if ($_POST['type'] == 4) {
		$id = $_POST['id'];
		$valor2 = $_POST['valor2'];
		// ,`apellido_cliente`='$apellido',`telefono_cliente`='$telefono',`dni`='$dni'
		$sql = "UPDATE tasa SET valor='$valor2' WHERE id= 2";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode" => 200));
			//var_dump($sql);
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}

if (count($_POST) > 0) {
	if ($_POST['type'] == 5) {
		$id = $_POST['id'];
		$valor3 = $_POST['valor3'];
		// ,`apellido_cliente`='$apellido',`telefono_cliente`='$telefono',`dni`='$dni'
		$sql = "UPDATE tasa SET valor='$valor3' WHERE id= 3";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("statusCode" => 200));
			//var_dump($sql);
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
}