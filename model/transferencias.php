 <?php
//filter.php
//if (isset($_POST["fecha_desde"], $_POST["fecha_hasta"])) {

$banco = $_POST["banco"];
$fecha1 = $_POST["fecha_desde"];
$fecha2 = $_POST["fecha_hasta"];

include 'conexion_db.php';

$output = '';
$query = "
		select
a.id_transferencia,
a.fecha,
d.tipo_banco,
b.num_cuenta,
b.nombre_titular_cuenta,
a.importe_titular,
a.importe_cliente,
c.medio_de_pago,
e.nombre_cliente,
d.id_banco,
e.codigo
from transferencias as a
left join cuenta as b on a.id_cuenta_destino = b.id_cuenta
inner join medios_de_pago as c on c.id_medios_de_pago = a.id_medio_pago_cliente
left join banco as d on b.id_tipo_banco = d.id_banco
left join cliente as e on b.id_cliente = e.id_cliente ";

//if (!empty($fecha1)) {
if (!empty($_POST["fecha_desde"]) && !empty($_POST["fecha_hasta"])) {
	$query .= "WHERE a.fecha BETWEEN '" . $fecha1 . "' AND '" . $fecha2 . "'
     ";
}

if ($banco == "Otros") {
	$query .= "AND b.id_tipo_banco NOT IN(1, 2);";
}

if ($banco == "Mercantil") {
//if (isset($_POST["banco"]) && !empty($_POST["banco"])) {
	$query .= "AND d.tipo_banco ='" . $_POST["banco"] . "'";
}

if ($banco == "Banesco") {
//if (isset($_POST["banco"]) && !empty($_POST["banco"])) {
	$query .= "AND d.tipo_banco ='" . $_POST["banco"] . "'";
}

if ($banco == "De Venezuela") {
     //if (isset($_POST["banco"]) && !empty($_POST["banco"])) {
          $query .= "AND d.tipo_banco ='" . $_POST["banco"] . "'";
}

if ($banco == "Provincial") {
     //if (isset($_POST["banco"]) && !empty($_POST["banco"])) {
          $query .= "AND d.tipo_banco ='" . $_POST["banco"] . "'";
}

if (isset($_POST["medio"]) && !empty($_POST["medio"])) {
	$query .= "AND c.medio_de_pago ='" . $_POST["medio"] . "'";
}

$result = mysqli_query($conn, $query);
$output .= '
           <table class="table table-bordered table-striped">
                <tr>
					<th>Giro</th>
              		<th>Codigo</th>
   				    <th>Fecha</th>
      			    <th>Banco</th>
      			    <th>Cuenta</th>
      			    <th>Titular</th>
      			    <th>Monto Pesos Arg. </th>
      			    <th>Monto Bs. </th>
      			    <th>Medio de Pago</th>
      			    <th>Accion</th>
                </tr>
      ';
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
		$output .= '
                     <tr>
                          <td>' . $row["id_transferencia"] . '</td>
                          <td>' . $row["codigo"] . '</td>
                          <td>' . $row["fecha"] . '</td>
                          <td>' . $row["tipo_banco"] . '</td>
                          <td>' . $row["num_cuenta"] . '</td>
                          <td> ' . $row["nombre_titular_cuenta"] . '</td>
                          <td><b>' . $row["importe_titular"] . '</b></td>
                          <td>' . $row["importe_cliente"] . '</td>
                          <td>' . $row["medio_de_pago"] . '</td>
                          <td><a href="#" id="' . $row['id_transferencia'] . '" class="delbutton" title="Click para borrar">Eliminar</a></td>
                     </tr>
                ';
	}
} else {
	$output .= '
                <tr>
                     <td colspan="5">No se encuentran registros de esa fecha</td>
                </tr>
           ';
}
$output .= '</table>';
echo $output;

//}

?>
