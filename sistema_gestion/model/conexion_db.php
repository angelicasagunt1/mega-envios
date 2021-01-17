<?php

$servername = "mysql3001.mochahost.com"; // compucol'@'198.38.82.155'
$username = "compucol_adminco"; //root
$password = "megaenvios1479";
$dbname = "compucol_envios";

/*
$servername = "localhost"; // compucol'@'198.38.82.155'
$username = "root"; //root
$password = "";
$dbname = "envios";
 */
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Conexión fallida: " . $conn->connect_error);
}
?>