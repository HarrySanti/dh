<?php
	require_once "classes/Auth.php";
	$auth=new Auth();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Watch</title>
		<link rel="stylesheet" href="http://meyerweb.com/eric/tools/css/reset/reset.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/mobile.css">
		<link rel="stylesheet" href="css/tablet.css">
		<link rel="stylesheet" href="css/desktop.css">
	</head>
	<?php if(isset($_COOKIE["usuarioLogueado"])){?>
	<div class="contenedor_login">
		<div class="foto_user">
			<img src="fotos/avatar.jpg" class="foto" alt="">
		</div>
		<div class="nombre_usuario">
			<a href="mantenimiento.php" class="bienvenido"><h1>Bienvenido, <strong><?php echo ($_COOKIE["usuarioLogueado"]); ?></h1></a>
		</div>
		<div class="logout">
			<a href="deslogueo.php" class="desconectate"><h1>Logout</h1></a>
		</div>
	</div>
	<?php }else{ ?>
	<div class="contenedor">
		<header class="foruser">
			<a href="sign_in.php" class="ingresar"><h1>INGRESAR</h1></a>
			<h1>|</h1>
			<a href="register.php" class="registro"><h1>REGISTRARME</h1></a>
		</header>
	</div>
	<?php }; ?>
	<body>
		<div class="contenedor">
			<section class="banner">
				<img src="fotos/img_home.jpg" class="img-banner" alt="">
				<div class="marca">
					<h1>watch</h1>
					<h2 class="bajada">the best way to live</h2>
				</div>
			</section>
			<nav>
				<ul>
					<li><a href="" class="nave">TENDENCIAS</a></li><li><a href="" class="nave">HOMBRE</a></li><li><a href="" class="nave">MUJER</a></li><li><a href="" class="nave">MALLAS</a></li><li><a href="faqs.php" class="nave">FAQS</a></li>
				</ul>
			</nav>
			<section class="banners">
				<div class="banner2">
					<a href="#"><img src="fotos/img_complex.jpg" class="img-banner" alt=""></a>
					<div class="complex">
						<h1>COMPLEX</h1>
					</div>
				</div>
				<div class="banner3">
					<a href="#"><img src="fotos/img_simple.jpg" class="img-banner" alt=""></a>
					<div class="simple">
						<h1>SIMPLE</h1>
					</div>
				</div>
			</section>
			<section class="banner4">
				<a href="#"><img src="fotos/img_women.jpg" class="img-banner" alt=""></a>
				<div class="women">
					<h1>WOMEN</h1>
				</div>
			</section>
			<section class="elegi">
				<h1>ELEGI EL <strong>TUYO</strong></h1>
			</section>
			<section class="columnas">
				<div class="columna">
					<img src="fotos/img_lisboa.jpg" class="lisboa">
					<div class="contenido">
						<h2>Lisboa</h2>
						<p>$ 3.500</p>
						<hr></hr>
						<a href="#" class="anadir">+añadir</a>
						<a href="#" class="info">+info</a>
						<p class="descripcion">Malla de cuero. 45 mm de diámetro. Diferentes colores. Marcadores y segunderos negros. Cristal: Zafiro.</p>
					</div>
				</div>
				<div class="columna">
					<img src="fotos/img_galapagos.jpg" class="galapagos">
					<div class="contenido">
						<h2>Galápagos</h2>
						<p>$ 2.800</p>
						<hr></hr>
						<a href="#" class="anadir">+añadir</a>
						<a href="#" class="info">+info</a>
						<p class="descripcion">Malla de cuero y metálica. 45 mm de diámetro. Diferentes colores. Marcadores y segunderos blancos. Cristal: Zafiro.</p>
					</div>
				</div>
			</section>
			<section class="columnas">
				<div class="columna">
					<img src="fotos/img_toledo.jpg" class="toledo">
					<div class="contenido">
						<h2>Toledo</h2>
						<p>$ 4.700</p>
						<hr></hr>
						<a href="#" class="anadir">+añadir</a>
						<a href="#" class="info">+info</a>
						<p class="descripcion">Malla de cuero, metálica y de acero. 50 mm de diámetro. Color negro y marrón. Marcadores y segunderos negros. Cristal: Zafiro.</p>
					</div>
				</div>
				<div class="columna">
					<img src="fotos/img_santander.jpg" class="santander">
					<div class="contenido">
						<h2>Santander</h2>
						<p>$ 2.800</p>
						<hr></hr>
						<a href="#" class="anadir">+añadir</a>
						<a href="#" class="info">+info</a>
						<p class="descripcion">Malla metálica y de acero. 50 mm de diámetro. Color negro, blanco y marrón. Marcadores y segunderos gris. Cristal: Zafiro.</p>
					</div>
				</div>
			</section>
			<section class="columnas">
				<div class="columna">
					<img src="fotos/img_chicago.jpg" class="chicago">
					<div class="contenido">
						<h2>Chicago</h2>
						<p>$ 5.700</p>
						<hr></hr>
						<a href="#" class="anadir">+añadir</a>
						<a href="#" class="info">+info</a>
						<p class="descripcion">Malla de cuero. 55 mm de diámetro. Color negro, blanco y marrón. Marcadores y segunderos blancos. Cristal: Zafiro.</p>
					</div>
				</div>
				<div class="columna">
					<img src="fotos/img_sidney.jpg" class="sidney">
					<div class="contenido">
						<h2>Sidney</h2>
						<p>$ 3.000</p>
						<hr></hr>
						<a href="#" class="anadir">+añadir</a>
						<a href="#" class="info">+info</a>
						<p class="descripcion">Malla metálica. 45 mm de diámetro. Color negro y gris. Marcadores y segunderos negros. Cristal: Zafiro.</p>
					</div>
				</div>
			</section>
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
	</body>
</html>
