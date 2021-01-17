<?php
/*
session_start();

if (isset($_SESSION['id'])) {
header('location: controller/redirec.php');
}

 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mega-Envios</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">

</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../img/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form">
					<span class="login100-form-title">
						MEGA-ENVIOS LOGIN USUARIOSS
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" id="user">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password" id=clave>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="container-login100-form-btn">
						<button type="button" class="login100-form-btn" id="login" value="">Inciar Sesion
						</button>
					</div>

					<span id="result"></span>

					<div class="text-center p-t-12">
						<span class="txt1">
							Olvido
						</span>
						<a class="txt2" href="#">
							 Usuario o Password?
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="registro.php">
							Crear una cuenta
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<script src="../jquery/jquery-3.3.1.min.js"></script>
	<script src="../js/operaciones.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</body>
</html>