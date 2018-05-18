<?php
	require_once "validaciones.php";
	require_once "usuarios.php";

    $errores = [
        "email" => [],
        "password" => [],

    ];
		//error si el mail no está registrado
		$errores_login_user = [
				"email"=>[],
		];
		//error si la contraseña no es la correcta
		$errores_login_password = [
				"password"=>[],
		];


    // Validar si se completo o no el formulario
    if ($_POST) {


				//valido la contraseña
				$erroresEnPassword = validarPasswordLogin($_POST["contrasena"]);

				if (empty($erroresEnPassword)) {
				} else {
					$errores["contrasena"] = $erroresEnPassword;
				}

				//valido el mail

				$erroresEnMail = validarEmailLogin($_POST["email"]);

				if (empty($erroresEnMail)) {
				} else {
					$errores["email"] = $erroresEnMail;
				}



			  // Si no hubo errores con los campos, busco el usuario
			  if (! huboErrores($errores)) {

						//si no encuentro al usuario sumo un error en errores de login
						if (! traerPorEmail($_POST["email"])) {

								$errores_login_user["email"] = "El usuario ingresado no se encuentra registrado";

								}else{

									//si está registrado
									// Buscar el usuario basandonos en el email
									$usuario = traerPorEmail($_POST["email"]);
								}

						//una vez encontrado el usuario, chequeo si la contraseña es correcta
						if ($usuario) {
									// El password corresponde al del usuario???
									if (password_verify($_POST['contrasena'], $usuario['password'])){


											//iniciar sesión
											session_start();


											//defino cuanto quiero que dure mi cookies (en este caso una hora)
											$vencimiento=time()+60*60;
											//defino cookies

											setcookie('email',$_POST['email'],$vencimiento,'/');
											setcookie('avatar_url',$usuario['avatar_url'],$vencimiento,'/');


											//definir el usuarios
											$_SESSION['email']=$_COOKIE["email"];

											header("Location: home.php");

											//te redirige a bienvenido

											//INICIAR SESION



										}else {
											$errores_login_password["password"] = "La contraseña ingresada no es correcta";
										}
								}
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
				<ul class="nav navbar-nav">
					<li><a href="home.php">Inicio</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="register.php">Register</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
            <form role="form" action="" method="post" enctype="multipart/form-data">
								<!--Imprimo errores de validación de campos-->
								<div class="row">
                    <?php if (huboErrores($errores)) : ?>
                        <div class="col-sm-12 alert alert-danger">
                            <ul>
                                <?php foreach($errores as $bolsaDeErrores) : ?>
                                    <?php foreach($bolsaDeErrores as $error) : ?>
                                        <li><?= $error ?></li>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>

								<!--Imprimo errores de registro de usuario, mas especificamente el mail. Mas abajo se hace con la contraseña-->
								<div class="row">
                    <?php if (huboErrores($errores_login_user)) : ?>
                        <div class="col-sm-12 alert alert-danger">
                            <ul>
                                <?php echo "El usuario ingresado no se encuentra registrado";?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>

								<!--Imprimo errores matcheo de contraseña-->
								<div class="row">
                    <?php if (huboErrores($errores_login_password)) : ?>
                        <div class="col-sm-12 alert alert-danger">
                            <ul>
                                <?php echo "La contraseña ingresada no es la correcta";?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>


				<div class="row">
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
