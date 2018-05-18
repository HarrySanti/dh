<?php
	session_start();
	setcookie('email','',$vencimiento,'/');
	session_destroy();
	header('location: home.php');
?>
