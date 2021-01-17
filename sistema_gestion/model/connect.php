<?php

class Database extends PDO {

	public function __construct() {

		try {

			parent::__construct('mysql:host=mysql3001.mochahost.com; dbname=compucol_envios', 'compucol_adminco', 'megaenvios1479');

			/*
			parent::__construct('mysql:host=localhost; dbname=envios', 'root', '');*/
			parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (Exception $e) {

			die("Error" . $e->getMessage());

			echo "Linea del Error" . $e->getLine();
		}
	}

	# Function que retorna un objeto de MySQL
	public function query($consulta) {
		#mysqli_query Realiza una consulta a la base de datos
		return $this->mysqli->query($consulta);
	}

	# Funcion que retorna el numero de filas afectadas por una consulta sql
	public function verificarRegistros($consulta) {
		# mysqli_num_rows: Obtiene el número de filas de un resultado de una consulta
		return $verificarRegistros = mysqli_num_rows($this->mysqli->query($consulta));
	}

	# Funcion que retorna un arreglo con los registros de una consulta
	public function consultaArreglo($consulta) {
		# mysqli_fetch_array Obtiene una fila de resultados como un array asociativo, numérico, o ambos
		return mysqli_fetch_array($this->mysqli->query($consulta));
	}

	# Function que permite cerrar una conexion de MySQL
	public function cerrar() {
		# Accedemos al atributo de conexion y cerramos la conexion
		$this->mysqli->close();
	}

	# Escapa los caracteres especiales de un string para evitar las inyecciones sql
	public function salvar($des) {
		/*
			            mysqli_real_escape_string: Escapa los caracteres especiales de una cadena
			            para usarla en una sentencia SQL, tomando en cuenta el conjunto de
			            caracteres actual de la conexión.
		*/
		$string = $this->mysqli->real_escape_string($des);

		return $string;
	}

	# Serie de filtros para almacenar en base de datos
	public function filtrar($string) {

		$res = $this->salvar($string);

		# Asignamos los parametros de busqueda
		$buscar = array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ');
		$reemplazar = array('&aacute', '&eacute', '&iacute', '&oacute', '&uacute', '&Aacute', '&Eacute', '&Iacute', '&Oacute', '&Uacute', '&ntilde', '&Ntilde');

		# str_replace: Reemplaza todas las apariciones del string buscado con el string de reemplazo
		$res = str_replace($buscar, $reemplazar, $string);

		# strtolower: Convierte una cadena a minúsculas
		$res = strtolower($res);

		# trim: Elimina espacio en blanco (u otro tipo de caracteres) del inicio y el final de la cadena
		$res = trim($res);

		return $res;
	}

	# Convierte el acento de base de datos a acentos entendibles
	public function rescatar($string) {

		# Asignamos los parametros de busqueda
		$buscar = array('&aacute', '&eacute', '&iacute', '&oacute', '&uacute', '&Aacute', '&Eacute', '&Iacute', '&Oacute', '&Uacute', '&ntilde', '&Ntilde');
		$reemplazar = array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ');

		$res = str_replace($buscar, $reemplazar, $string);

		return $res;
	}

} // End Class

?>