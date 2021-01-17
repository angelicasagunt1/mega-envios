<?php

include 'conexion_db.php';

if (count($_POST) > 0) {
	if ($_POST['type'] == 1) {
		//$cuenta = $_POST['cuenta']; //auto_increment se debe corregir en la BD
		$id = $_POST['id_cliente']; //	ID que viene de la otra tabla
		$num = $_POST['num'];
		$banco = $_POST['tipo_pago'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$cedula = $_POST['cedula'];

		if (empty($banco) || empty($nombre) || empty($apellido) || empty($cedula)) {

			echo 'error_2';

		} else {

			if (strlen($num) < 20 || strlen($num) > 20) {
				# mostramos la respuesta de php (echo)
				echo 'error_1';
			} else {

				$sql = "INSERT INTO cuenta (
		id_cliente,
		id_tipo_banco,
		num_cuenta,
		nombre_titular_cuenta,
		apellido_titular_cuenta,
		cedula_titular_cuenta)
		VALUES (
		'$id',
		'$banco',
		'$num',
		'$nombre',
		'$apellido',
		'$cedula')";

				if (mysqli_query($conn, $sql)) {
					echo json_encode(array("statusCode" => 200));
					//echo $sql;
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				mysqli_close($conn);
			}
		}
	}
}

if (count($_POST) > 0) {
	if ($_POST['type'] == 2) {
		$id = $_POST['id'];
		$num_cuenta = $_POST['num_cuenta'];
		$banco = $_POST['tipo_pago'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$cedula = $_POST['cedula'];

		if (empty($banco)) {
			# mostramos la respuesta de php (echo)
			echo 'error_1';
		} else {

			$sql = "UPDATE cuenta SET num_cuenta='$num_cuenta', id_tipo_banco = '$banco' ,  nombre_titular_cuenta='$nombre', apellido_titular_cuenta= '$apellido', cedula_titular_cuenta= '$cedula' WHERE id_cuenta=$id";

			if (mysqli_query($conn, $sql)) {
				echo json_encode(array("statusCode" => 200));
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
	}
}
?>