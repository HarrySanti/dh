<?php
	require_once 'db.php';

	class Usuario {
		private $id;
		private $email;
		private $password;
		private $nombre;
		private $apellido;
		private $db;

		//Constructor de la clase usuario. Crea un usuario
		public function __construct($email, $password, $nombre, $apellido, $id = null) {
			if ($id == null) {
				$this->password = md5($password);
			} else {
				$this->password = $password;
			}
			$this->id = $id;
			$this->email = $email;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
		}

		//Getters y setters de los valores del usuario
		public function getId() {
			return $this->id;
		}

		public function setId($id) {
			$this->id = $id;
		}

		public function getEmail() {
			return $this->email;
		}

		public function setEmail($email) {
			$this->email = $email;
		}

		public function getPassword() {
			return $this->password;
		}

		public function setPassword($password) {
			$this->password = $password;
		}

		public function getNombre() {
			return $this->nombre;
		}

		public function setNombre($nombre) {
			$this->nombre = $nombre;
		}

		public function getApellido() {
			return $this->apellido;
		}

		public function setApellido($apellido) {
			$this->apellido = $apellido;
		}

		//Para no complicarla, dejo lo del avatar comentado

		// public function guardarFoto() {
		//    $archivo = $_FILES["foto-perfil"]["tmp_name"];
		//
		//   $nombreDeLaFoto = $_FILES["foto-perfil"]["name"];
		//    $extension = pathinfo($nombreDeLaFoto, PATHINFO_EXTENSION);
		//
		//   $nombre = dirname(__FILE__) . "/img/" . $this->email . ".$extension";
		//
		//   move_uploaded_file($archivo, $nombre);
		//  }


		//Guardo el user en la base de datos
		public function save(){
			$sql= 'INSERT INTO users
			(email, password, nombre, apellido)
			VALUES
			(:email, :password, :nombre, :apellido)';

			//Defino el statement
			$stmt = DB::getcon()->prepare($sql);

			// Bindeo los valores
			$stmt->bindValue(":email", $this->email );
			$stmt->bindValue(":password", $this->password);
			$stmt->bindValue(":nombre", $this->nombre);
			$stmt->bindValue(":apellido", $this->apellido);

			// Ejecuto el stmt
			$stmt->execute();
		}


		//Para el sign in mas que nada


		//Busco al user en la base de datos
		public static function find($email){
			//preparo la query para buscarlo
			$sql='SELECT * FROM users WHERE email = :email';
			$stmt=DB::getcon()->prepare($sql);
			$stmt->bindValue(':email',$email,PDO::PARAM_STR);
			$stmt->execute();

			$result=$stmt->fetch(PDO::FETCH_ASSOC);

			//creo un usuario en blanco al cual lo voy a completar con lo que encontré en la DB
			$usuario=new Usuario('','','','');
			$usuario->toUser($result);
			return $usuario;
		}

		//Completo el usuario en blanco con la info que vino de la DB para poder compararlo y realizar el login.
		public function toUser($data){
			$this->email=$data['email'];
			$this->password=$data['password'];
			$this->nombre=$data['nombre'];
			$this->apellido=$data['apellido'];
		}
	}
?>
