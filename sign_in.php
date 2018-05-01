<?php
	require_once "validaciones.php";
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
		<div class="contenedor-signin">
			<header class="watch-singin">
				<a href="home.html"><h1>watch</h1></a>
			</header>
			<div class="cuerpo-singin">
				<div class="foto_signin">
					<img src="fotos/img_signin.jpg" class="img_signin" alt="">
				</div>
				<div class="seccion-formulario-singin">
					<h1>Sign in</h1>
					<div class="formulario-signin">
						<form action="" method="">
							<div>
								<input class="form1" type="text" name="correo" placeholder="Correo Electrónico" class="correo">
							</div>
							<div>
								<input class="form1" tpype="password" name="password" placeholder="Contraseña" class="password">
							</div>
						</form>
					</div>
					<div class="botones">
						<div class="recordarme-box">
							<label>
								<input type="checkbox" value="checkbox"> Recordarme
							</label>
						</div>
						<div class="olvidar">
							<a href="" class="olvide">¿Olvidaste tu contraseña?</a>
						</div>
					</div>
					<a class="ingresar" href="">
						<h2>Ingresar</h2>
					</a>
				</div>
			</div>
			<div class="contenedor">
				<footer class="footer-singnin">
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
