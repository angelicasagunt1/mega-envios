<?php
include 'conexion_db.php';

if (count($_POST) > 0) {
	$id = $_POST['id'];
	$sql = "DELETE FROM `transferencias` WHERE id_transferencia= $id";
	if (mysqli_query($conn, $sql)) {
		echo $id;
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
}
?>