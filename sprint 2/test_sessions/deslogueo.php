<?php

//cierro sesión
session_start();
//borro cookie
setcookie('email','',$vencimiento,'/');

session_destroy();




header('location:../home.php');

 ?>
