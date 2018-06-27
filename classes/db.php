<?php
	class DB {
		public static $con;
		public static function getcon(){
			if (!self::$con) {
				$db = new PDO('mysql:host=localhost;dbname=users','root','root');
				$db->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$con=$db;
			}
			return self::$con;
		}
	}
 ?>