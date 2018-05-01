<?php
	require_once "validaciones.php";
	require_once "usuarios.php";

	$errores = [
    "nombre" => [],
    "apellido" => [],
    "dni" => [],
    "celular" => [],
    "email" => [],
    "password" => []
    ];

    $user = usuarioNuevo();

    // Validar si se completó el formulario
    if ($_POST) {

	//Fijarse si hay error en Nombre
    	$errorEnNombre = $validarNombre($_POST["nombre"]);
    	if (empty($errorEnNombre)) {
    		$user["nombre"] = $_POST["nombre"];
    	} else {
    		$errores["nombre"] = $errorEnNombre;
    	}

    	//Fijarse si hay error en Apellido
    	$errorEnApellido = $validarApellido($_POST["apellido"]);
    	if (empty($errorEnApellido)) {
    		$user["apellido"] = $_POST["apellido"];
    	} else {
    		$errores["apellido"] = $errorEnApellido;
    	}

    	//Fijarse si hay error en DNI
    	$errorEnDni = $validarDNI($_POST["dni"]);
    	if (empty($errorEnDni)) {
    		$user["dni"] = $_POST["dni"];
    	} else {
    		$errores["dni"] = $errorEnDni;
    	}

    	//Fijarse si hay error en Celular
    	$errorEnDni = $validarDNI($_POST["dni"]);
    	if (empty($errorEnDni)) {
    		$user["dni"] = $_POST["dni"];
    	} else {
    		$errores["dni"] = $errorEnDni;
    	}

    	//Fijarse si hay error en Celular
    	$errorEnCelular = $validarCelular($_POST["celular"]);
    	if (empty($errorEnCelular)) {
    		$user["celular"] = $_POST["celular"];
    	} else {
    		$errores["celular"] = $errorEnCelular;
    	}

    	//Fijarse si hay error en Email
    	$errorEnEmail = $validarEmail($_POST["email"]);
    	if (empty($errorEnEmail)) {
    		$user["email"] = $_POST["email"];
    	} else {
    		$errores["email"] = $errorEnEmail;
    	}

    	//Fijarse si hay error en Email
    	$errorEnPassword = $validarPassword($_POST["password"]);
    	if (empty($errorEnPassword)) {
    		$user["password"] = $_POST["password"];
    	} else {
    		$errores["password"] = $errorEnPassword;
    	}

    	// falta poner q pasa si no hubo errores!!!!
		// si no hubo errores, registro al usuario y voy al html de bienvenida
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Watch</title>
		<link rel="stylesheet" href="http://meyerweb.com/eric/tools/css/reset/reset.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/mobile.css">
		<link rel="stylesheet" href="css/tablet.css">
		<link rel="stylesheet" href="css/desktop.css">
	</head>
	<body>
		<div class="contenedor-registe">
			<header class="watch-singin">
					<a href="home.html"><h1>watch</h1></a>
			</header>
			<div class="cuerpo-register">
				<div class="foto-register">
					<img src="fotos/img_registrarse.jpg" class="img_signin" alt="">
				</div>
				<div class="seccion-formulario-register">
					<h1>Completá tus datos</h1>
					<div class="formulario-register">
						<form action="" method="">
							<div class="row">
								<div>
									<input class="form1" type="text" name="nombre" placeholder="Nombre" class="correo">
								</div>
								<div>
									<input class="form1" tpype="password" name="apellido" placeholder="Apellido" class="password">
								</div>
							</div>
							<div class="row">
								<div>
									<input class="form1" type="number" name="dni" placeholder="DNI" class="dni">
								</div>
								<div>
									<input class="form1" type="phone" name="phone" placeholder="Teléfono celular" class="celular">
								</div>
							</div>
							<div>
								<input class="form1" tpype="email" name="email" placeholder="Dirección de correo electrónico" class="password">
							</div>
							<div>
								<input class="form1" tpype="password" name="password" placeholder="Contraseña" class="password">
							</div>
						</form>
					</div>
					<a class="registrarme" href=""><h2>Registrarme!</h2></a>
					<p class="terminos">Al crear una cuenta, declaro que soy mayor de edad y acepto los Términos y condiciones y las Políticas de privacidad de Watch Argentina</p>
				</div>
			</div>
			<div class="contenedor">
				<footer>
					<div class="watch">
						<ul>
							<h3>Watch</h3>
							<div>
								<li>Nosotros</li>
								<li>Blog</li>
								<li>Prensa</li>
							</div>
						</ul>
					</div>
					<div class="contacto">
						<ul>
							<h3>Contacto</h3>
							<div>
								<li>info@watch.com</li>
								<li>+54 11 5139 0000</li>
								<li>Crámer 5774, CABA</li>
							</div>
						</ul>
					</div>
					<ul class="social">
						<li><a href="https://twitter.com" target="_blank"><img src="fotos/img_tw.png" alt="tw"></a></li>
						<li><a href="https://instagram.com" target="_blank"><img src="fotos/img_ig.png" alt="ig"></a></li>
						<li><a href="https://facebook.com" target="_blank"><img src="fotos/img_fb.png" alt="fb"></a></li>
					</ul>
				</footer>
			</div>
		</div>
	</body>
</html>