<?php

# Incluimos la clase conexion para poder heredar los metodos de ella.
require_once 'conexion.php';

class Usuario extends Conexion {

	public function login($user, $clave) {

		parent::conectar();

		$user = parent::salvar($user);
		$clave = parent::salvar($clave);

		$consulta = 'select id, nombre, cargo from usuarios where email="' . $user . '" and clave= MD5("' . $clave . '")';

		$verificar_usuario = parent::verificarRegistros($consulta);

		// si la consulta es mayor a 0 el usuario existe
		if ($verificar_usuario > 0) {

			$user = parent::consultaArreglo($consulta);

			session_start();

			$_SESSION['id'] = $user['id'];
			$_SESSION['nombre'] = $user['nombre'];
			$_SESSION['cargo'] = $user['cargo'];

			/*
				           por qué almacenamos cargo? si el cliente pide que existna archivos que solo
				           el puede ver.
			*/

			/*
				          Recordar:
				          cargo con valor: 1 es: Administrador
				          cargo con valor: 2 es: usuario estandar
			*/

			// Verificamos que cargo tiene l usuario y asi mismo dar la respuesta a ajax para que redireccione
			if ($_SESSION['cargo'] == 1) {
				echo '../index.php';
			} else if ($_SESSION['cargo'] == 2) {
				echo '../index.php';
			}

			// fin

		} else {
			// El usuario y la clave son incorrectos
			echo 'error_3';
		}

		# Cerramos la conexion
		parent::cerrar();
	}

	public function registroUsuario($name, $email, $clave) {
		parent::conectar();

		$name = parent::filtrar($name);
		$email = parent::filtrar($email);
		$clave = parent::filtrar($clave);

		// validar que el correo no exito
		$verificarCorreo = parent::verificarRegistros('select id from usuarios where email="' . $email . '" ');

		if ($verificarCorreo > 0) {
			echo 'error_3';
		} else {

			parent::query('insert into usuarios(nombre, email, clave, cargo) values("' . $name . '", "' . $email . '", MD5("' . $clave . '"), 2)');

			session_start();

			$_SESSION['nombre'] = $name;
			$_SESSION['cargo'] = 2;

			echo '../index.php';

		}

		parent::cerrar();
	}

}

?>
