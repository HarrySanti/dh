<?php
	require_once "classes/Usuario.php";
	require_once "classes/Validador.php";
	require_once "classes/Auth.php";

	//Primero checkeo si se completó el formulario
	if ($_POST) {

		//instancio a validaciones para hacer las correspondientes
		$validacion=new Validator();
		$arrayDeErrores=$validacion->validarInformacion($_POST);

			// Si no hubo errores, guardo el usuario
			if ($arrayDeErrores==null) {
			
				//también me guardo el nombre y el Apellido
				$usuario=new Usuario($_POST['email'],$_POST['contrasena'],$_POST['nombre'],$_POST['apellido']);
				$usuario->save();

				// Si no hubo errores, busco al usuario
				if ($arrayDeErrores==null) {

					//instancio a la clase auth
					$auth = new Auth();
					
					//logueo al usuario
					$auth->loguear($_POST['email']);

					//como acá no hay botón de recordarme, lo recuerdo igual.
					$auth->recordarUsuario($_POST['email']);

					//hago el login
					header("Location: felicitaciones.php");
				}else {
					//No hago nada porque los errores después se imprimen en el form
				}
			}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registración</title>
		<meta name="description" content="Registración de prueba">

		<!-- Bootstrap -->
		<link href="assets/libs/bootstrap-3/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/bs_mobile.css">
		<link rel="stylesheet" href="css/bs_tablet.css">

		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-links">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="home.php">Watch</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-links">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="sign_in.php">Login</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<form role="form" action="" method="post" enctype="multipart/form-data">
					<div class="row">
						<?php if ($_POST) : ?>
						<?php if ($arrayDeErrores!=null) : ?>
						<div class="col-sm-12 alert alert-danger">
							<ul>
								<?php foreach($arrayDeErrores as $value) : ?>
								<li><?= $value ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php endif; ?>
						<?php endif; ?>
					</div>
					<div class="row">
							<img src="fotos/img_register_web.jpg" class="form-group col-sm-12" alt="Responsive image">
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="nombre">Nombre *</label>
							<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre" value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : "" ?>" >
						</div>
						<div class="form-group col-sm-6">
							<label for="apellido">Apellido *</label>
							<input type="text" class="form-control" id="apellido" name="apellido" value="<?= isset($_POST['apellido']) ? $_POST['apellido'] : "" ?>" placeholder="Ingrese Apellido">
						</div>
					</div>
					<!--La parte de PHP es para la persistencia de los datos si hay problemas con otros a la hora de completar el form-->
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="email">Email *</label>
							<input type="text" class="form-control" id="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : "" ?>" placeholder="Ingrese Email">
						</div>
						<div class="form-group col-sm-6">
							<label for="email-confirm">Confirmar Email *</label>
							<input type="text" class="form-control" id="email-confirm" name="email_confirm" value="<?= isset($_POST['email_confirm']) ? $_POST['email_confirm'] : "" ?>" placeholder="Ingrese Confirmación Email">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="contrasena">Contraseña *</label>
							<input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese Contraseña">
						</div>
						<div class="form-group col-sm-6">
							<label for="contrasena-confirm">Confirmar Contraseña *</label>
							<input type="password" class="form-control" id="contrasena-confirm" name="contrasena_confirm" placeholder="Ingrese Confirmación Contraseña">
						</div>
					</div>
					<div class="form-group">
						<label>Fecha de Nacimiento *</label>
						<div class="row">
							<div class="col-sm-4">
								<select class="form-control" name="fnac_dia">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
								</select>
							</div>
							<div class="col-sm-4">
								<select class="form-control" name="fnac_mes">
									<option value="1">Enero</option>
									<option value="2">Febrero</option>
									<option value="3">Marzo</option>
									<option value="4">Abril</option>
									<option value="5">Mayo</option>
									<option value="6">Junio</option>
									<option value="7">Julio</option>
									<option value="8">Agosto</option>
									<option value="9">Septiembre</option>
									<option value="10">Octubre</option>
									<option value="11">Noviembre</option>
									<option value="12">Diciembre</option>
								</select>
							</div>
							<div class="col-sm-4">
								<select class="form-control" name="fnac_anio">
									<option value="2017">2017</option>
									<option value="2016">2016</option>
									<option value="2015">2015</option>
									<option value="2014">2014</option>
									<option value="2013">2013</option>
									<option value="2012">2012</option>
									<option value="2011">2011</option>
									<option value="2010">2010</option>
									<option value="2009">2009</option>
									<option value="2008">2008</option>
									<option value="2007">2007</option>
									<option value="2006">2006</option>
									<option value="2005">2005</option>
									<option value="2004">2004</option>
									<option value="2003">2003</option>
									<option value="2002">2002</option>
									<option value="2001">2001</option>
									<option value="2000">2000</option>
									<option value="1999">1999</option>
									<option value="1998">1998</option>
									<option value="1997">1997</option>
									<option value="1996">1996</option>
									<option value="1995">1995</option>
									<option value="1994">1994</option>
									<option value="1993">1993</option>
									<option value="1992">1992</option>
									<option value="1991">1991</option>
									<option value="1990">1990</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Avatar (Opcional)</label>
						<div>
							<input type="file" name="avatar"/>
						</div>
					</div>
					<input type="submit" name="btn_submit" class="btn btn-info" value="Registrarme!"/>
				</form>
			</div>
		</div>
		<div class="text-center">&copy; <?php echo date('Y'); ?></div>
		<script src="assets/libs/jquery/jquery-1.11.1.min.js"></script>
		<script src="assets/libs/bootstrap-3/js/bootstrap.min.js"></script>
	</body>
</html>
