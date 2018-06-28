<?php
	include_once("db.php");

	class Auth {
		public function __construct() {

			session_start();
			//esta verificacion se hace para cuando entras de cero a la pagina y no te logueaste. Chequea si está creada la COOKI. Si esta creada, te logueo, sino, te pide usuario y contraseña
			if (!$this->estaLogueado() && isset($_COOKIE["usuarioLogueado"])) {
				$this->loguear($_COOKIE["usuarioLogueado"]);
			}
		}

		//defino las funciones para poder loguearme
		public function loguear($email) {
			$_SESSION["usuarioLogueado"] = $email;
		}

		//pregunto si está logueado
		public function estaLogueado() {
			if (isset($_SESSION["usuarioLogueado"])) {
				return true;
			}
			else {
				return false;
			}
		}

		function usuarioLogueado(db $db) {
			if ($this->estaLogueado()) {
				return $db->traerPorEmail($_SESSION["usuarioLogueado"]);
			}
			else {
				return NULL;
			}
		}

		//para el recordarme, setea la COOKIE
		public function recordarUsuario($email) {
			setcookie("usuarioLogueado", $email, time() + 60*60*24*7);
		}

		public function logout() {
			session_destroy();
			setcookie("usuarioLogueado", "", -1);
		}
	}
?>
