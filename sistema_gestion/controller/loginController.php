<?php

# Lee variables enviadas mediante Ajax
$user = $_POST['user_php'];
$clave = $_POST['clave_php'];

# Verifica que los campos no esten vacios
if (empty($user) || empty($clave)) {

	# mostramos la respuesta de php (echo)
	echo 'error_1';

} else if (!empty($user) || empty(!$clave)) {

	/*
		       Si el usuario require de una validacion de email,
		       es decir que contenga @ y .com, .es etc.
		       (habilitar las lineas 21, 32, 33 y 34)
	*/

	// if(filter_var($user, FILTER_VALIDATE_EMAIL)){

	# Incluimos la clase usuario
	require_once '../model/usuario.php';

	# Crea un objeto de la clase usuario
	$usuario = new Usuario();

	# Llama al metodo login para validar los datos en la base de datos
	$usuario->login($user, $clave);

	/*}else{
		      echo 'error_2';
	*/

}

?>