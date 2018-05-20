<?php
	require_once "validaciones.php";
	require_once "usuarios.php";

//Creo el array de errores para llenarlo y mostrarlo después
    $errores = [
        "email" => [],
        "password" => [],
	"nombre"=> [],
	"apellido"=>[]
    ];

    //creo usuario de base
    $user = usuarioNuevo();

    // Validar si se completo o no el formulario
    if ($_POST) {
		//valido Nombre
		$erroresEnNombre = validarNombre($_POST["nombre"]);
		if (empty($erroresEnNombre)) {
			$user["nombre"] = $_POST["nombre"];
		} else {
			$errores["nombre"] = $erroresEnNombre;
		}
		//valido apellido
		$erroresEnApellido = validarApellido($_POST["apellido"]);
		if (empty($erroresEnApellido)) {
			$user["apellido"] = $_POST["apellido"];
		} else {
			$errores["apellido"] = $erroresEnApellido;
		}
		//valido la contraseña
		$erroresEnPassword = validarPasswordRegister($_POST["contrasena"], $_POST["contrasena_confirm"]);
		if (empty($erroresEnPassword)) {
			$user["password"] = $_POST["contrasena"];
		} else {
			$errores["password"] = $erroresEnPassword;
		}
		//valido el mail
		$erroresEnMail = validarEmailRegister($_POST["email"], $_POST["email_confirm"]);
		if (empty($erroresEnMail)) {
			$user["email"] = $_POST["email"];
		} else {
			$errores["email"] = $erroresEnMail;
		}
		//valido el avatar
		if (isset($_FILES["avatar"]) && validarAvatar($_FILES["avatar"])) {
			$user["avatar_url"] = $_FILES["avatar"];
		}
        // Si no hubo errores, guardo el usuario
        if (! huboErrores($errores)) {
						//también me guardo el nombre y el Apellido
						$user["nombre"] = $_POST["nombre"];
						$user["apellido"] = $_POST["apellido"];
						$user["fnac_dia"]=$_POST['fnac_dia'];
						$user["fnac_mes"]=$_POST['fnac_mes'];
						$user["fnac_anio"]=$_POST['fnac_anio'];



						//creo usuario
            if (crearUsuario($user)) {

							//iniciar sesión
							session_start();


							//defino cuanto quiero que dure mi cookies (en este caso una hora)
							$vencimiento=time()+60*60;
							//defino cookies
							setcookie('email',$_POST['email'],$vencimiento,'/');
							setcookie('avatar',$user['avatar_url'],$vencimiento,'/');


							//definir el usuarios
							$_SESSION['email']=$_POST["email"];

							header("Location: home.php");

								//Iniciar Sesion



								} else {
									exit("Ha ocurrido un error inesperado");
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
								<option value="1995">1994</option>
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
