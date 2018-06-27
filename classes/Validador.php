<?php

	//sirve para hacer las validaciones del register y del login
	include_once("db.php");
	require_once "Usuario.php";
	
	class Validator {
		
		//Validaciones del register
		public static function validarInformacion($informacion) {
			$arrayDeErrores = [];

			foreach ($informacion as $key => $value) {
				$informacion[$key] = trim($value);
			}

			//validaciones de mail
			if (strlen($informacion["email"]) == 0) {
				$arrayDeErrores["email"] = "No se ingresó email";
			}
			else if(filter_var($informacion["email"], FILTER_VALIDATE_EMAIL) == false) {
				$arrayDeErrores["email"] = "El email ingresado no es válido";
			}
			else if ($informacion["email"] != $informacion["email_confirm"]) {
				$arrayDeErrores["email"] = "La email no verifica";
			}

			//validaciones de contraseña
			if (strlen($informacion["contrasena"]) < 4) {
				$arrayDeErrores["contrasena"] = "La contraseña tiene que tener al menos 4 caracteres";
			} else if ($informacion["contrasena"] != $informacion["contrasena_confirm"]) {
				$arrayDeErrores["contrasena"] = "La contraseña no verifica";
			} else if (strlen($informacion["contrasena"]) == 0) {
				$arrayDeErrores["contrasena"] = "No se ingresó contraseña";
			}

			//validaciones de nombre
			if (!ctype_alpha($informacion["nombre"])) {
			   $arrayDeErrores["nombre"] = "El nombre sólo debe contener letras";
			}
			else if (strlen($informacion["nombre"]) < 3) {
				$arrayDeErrores["nombre"] = "El nombre debe tener más de 3 caractéres";
			}

			//validaciones de apellido
			if (!ctype_alpha($informacion["apellido"])) {
				$arrayDeErrores["apellido"] = "El apellido sólo debe contener letras";
			}

			// $errorDeLaFoto = $_FILES["foto-perfil"]["error"];
			//  $nombreDeLaFoto = $_FILES["foto-perfil"]["name"];
			//  $extension = pathinfo($nombreDeLaFoto, PATHINFO_EXTENSION);
			//
			// if ($errorDeLaFoto != UPLOAD_ERR_OK) {
			//    $arrayDeErrores["foto-perfil"] = "Hubo un error al cargar la foto";
			//  }
			//  else if ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "gif") {
			//    $arrayDeErrores["foto-perfil"] = "Eu, subiste algo que no era una imagen";
			//  }
			return $arrayDeErrores;
		}

		//Validaciones para el login
		public static function validarInfoLogin($informacion) {
			$arrayDeErrores = [];

			foreach ($informacion as $key => $value) {
				$informacion[$key] = trim($value);
			}

			//validaciones de mail
			if (strlen($informacion["email"]) == 0) {
				$arrayDeErrores["email"] = "Eu, ni pusiste mail";
			}
			else if(filter_var($informacion["email"], FILTER_VALIDATE_EMAIL) == false) {
				$arrayDeErrores["email"] = "Pusiste un mail que no era valido";
			}

			//si el formulario está bien completado, voy a buscar al usuario a mi db para ver si lo puedo loguear
			if ($arrayDeErrores==null) {

				//Utilizando el find, definido en la clase usuario, lo voy a buscar
				$usuario=Usuario::find($informacion['email']);
				
				//lo convierto a un array para poder utilizarlo en el if

				//chequeo a ver si lo encontró
				if ($usuario->getEmail() == null) {
					//si no lo encontró lo agrego a los errores
					$arrayDeErrores["logueo"] = "El mail ingresado no es el de un usuario registrado";
				}else {
					//me devuelve el usuario y comparo la contraseña con
					$contrasena1= $informacion["contrasena"];
					$contrasena2= $usuario->getPassword();

					if (md5($contrasena1) == $contrasena2) {
						//si está todo ok, no hago nada para después poder hacer el login en sign_in
					} else {
						//si la contraseña es invalida lo agrego al array de $errores_login_user
						$arrayDeErrores["logueo"] = "Error con los datos ingresados";

					};
				}
				return $arrayDeErrores;
			}
		}
	}
?>