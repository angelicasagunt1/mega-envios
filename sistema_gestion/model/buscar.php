<?php

include 'conexion_db.php';

$salida = "";

$query = "SELECT * FROM cliente";
//SI LA TABLA ES LOCAL el nombre de la tabla va en mayuscula
if (isset($_POST['consulta'])) {
	$q = $conn->real_escape_string($_POST['consulta']);

	$query = "SELECT * FROM cliente WHERE nombre_cliente LIKE '%$q%' OR apellido_cliente LIKE '%$q%' OR telefono_cliente LIKE '%$q%' OR DNI LIKE '%$q%' OR codigo LIKE '%$q%' ";

}

$resultado = $conn->query($query);
//var_dump($resultado);

if ($resultado->num_rows > 0) {
	$salida .= "<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<td>ID</td>
                        <td>Codigo</td>
    					<td>Nombre y Apellido</td>
    					<td>dni</td>
    					<td>telefono</td>
                        <td>Seleccionar</td>
    				</tr>

    			</thead>


    	<tbody>";

	while ($fila = $resultado->fetch_assoc()) {
		$id = $fila['id_cliente'];
		$nombre = $fila['nombre_cliente'];
		$apellido = $fila['apellido_cliente'];
		$salida .= "<tr>
    					<td>" . $fila['id_cliente'] . "</td>
                        <td>" . $fila['codigo'] . "</td>
    					<td>" . $fila['nombre_cliente'] . "</td>
    					<td>" . $fila['dni'] . "</td>
                        <td>" . $fila['telefono_cliente'] . "</td>
                        <td><a href='cuenta_form.php?id=$id&nombre_cliente=$nombre&apellido=$apellido'>Seleccionar</a></td>
    					</tr>";

	}
	$salida .= "</tbody></table>";
} else {
	$salida .= "Cliente no existe, por favor agregar nuevo cliente";
}

echo $salida;

$conn->close();

?>