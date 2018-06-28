<?php
	require_once "classes/Usuario.php";
	require_once "classes/Validador.php";
	require_once "classes/Auth.php";

	//Primero checkeo si se completó el formulario
	if ($_POST) {

		//instancio a validaciones para hacer las correspondientes
		$validacion=new Validator();
		$arrayDeErrores=$validacion->validarInfoLogin($_POST);

		// Si no hubo errores, busco al usuario
		if ($arrayDeErrores==null) {

			//instancio a la clase auth
			$auth = new Auth();

			//logueo al usuario
			$auth->loguear($_POST['email']);

			//recuerdo al usuario?
			if ('chk-record') {
				//lo recuerdo
				$auth->recordarUsuario($_POST['email']);
			}else {
				//sino no hago nada y no se lo recuerda
			}

			//hago el login
			header("Location: home.php");

		}else {
				//No hago nada porque los errores después se imprimen en el form
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login</title>
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
						<li><a href="register.php">Register</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<form role="form" action="" method="post" enctype="multipart/form-data">
					<div class="row">
						<img src="fotos/img_signin_web.jpg" class="form-group col-sm-12" alt="Responsive image">
					</div>
					<!--Imprimo errores de validación de campos-->
					<div class="row">
						<?php if ($_POST) : ?>
						<?php if ($arrayDeErrores!=null) : ?>
						<div class="col-sm-12 alert alert-danger">
							<ul>
								<?php foreach($arrayDeErrores as $value) : ?>
									<li><?php $value ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php endif; ?>
						<?php endif; ?>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="email">Email *</label>
							<input type="text" class="form-control" id="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : "" ?>" placeholder="Ingrese Email">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<label for="contrasena">Contraseña *</label>
							<input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingrese Contraseña">
						</div>
					</div>
					<div class="checkbox">
						<label>
							<input type="checkbox" id="chk-record" name="recordarme"> Redordarme
						</label>
					</div>
					<input type="submit" name="btn_submit" class="btn btn-info" value="Iniciar Sesion"/>
				</form>
			</div>
		</div>
		<div class="text-center">&copy; <?php echo date('Y'); ?></div>
		<script src="assets/libs/jquery/jquery-1.11.1.min.js"></script>
		<script src="assets/libs/bootstrap-3/js/bootstrap.min.js"></script>
	</body>
</html>
