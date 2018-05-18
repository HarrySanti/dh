<?php

function usuarioNuevo() {
    return [
        "nombre" => null,
        "apellido" => null,
        "email" => null,
        "password" => null,
        "avatar_url" => "https://www.google.com/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&ved=2ahUKEwibjuy0gtTaAhVGymMKHTYBBbgQjRx6BAgAEAU&url=https%3A%2F%2Fwww.facebook.com%2FProfilePictures%2F&psig=AOvVaw0qouB_cOvATbwUSbO0di7J&ust=1524697356844844"
    ];
}

function crearUsuario($usuario) {
    // hashear el password del usuario
    $usuario["password"] = password_hash($usuario["password"], PASSWORD_BCRYPT);
    // detectar si se ha subido un avatar y generar la URL
    if (is_array($usuario["avatar_url"])) {;

        $nombre = $usuario["avatar_url"]["name"];
        $archivo = $usuario["avatar_url"]["tmp_name"];
        $ext = pathinfo($nombre, PATHINFO_EXTENSION);

        $miArchivo = dirname(__FILE__);
        $miArchivo = $miArchivo . "/avatars/";
        $miArchivo = $miArchivo . $usuario["username"] . "_profile" .  $ext;

        $movido = move_uploaded_file($archivo, $miArchivo);;

        $usuario["avatar_url"] = $miArchivo;
    }
    // transformar el usuario a json
    $jsonUser = json_encode($usuario);
    // escribir el json en el archivo
    $fp = fopen("users.json", "a+");
    $bytesEscritos = fwrite($fp, $jsonUser . PHP_EOL);
    fclose($fp);

    return $bytesEscritos;
}

/**
 * Esta funcion busca un usuario, en caso de existir retorna un
 * array asociativo con los datos del usuario, en caso de no existir
 * devuelve el valor false.
 */

function traerTodos() {
  $archivo = file_get_contents("users.json");
  $array = explode(PHP_EOL, $archivo);
  array_pop($array);

 $arrayFinal = [];
  foreach ($array as $usuario) {
    $arrayFinal[] = json_decode($usuario, true);
  }

 return $arrayFinal;
}

function traerPorEmail($email) {
  $todos = traerTodos();

 foreach ($todos as $usuario) {
    if ($usuario["email"] == $email) {
      return $usuario;
    }
    }
  }


/*
function buscarUsuario($email) {
    // Abrir el archivo JSON

    /* Por cada linea del archivo debo:
    $gestor = fopen("../tp/register_final2/users.json", "r");
    if ($gestor) {
                    $i=0;
                    while (($linea = fgets($gestor)) !== false) {
                      $linea_array=json_decode($linea,true);
                      $mail_user=$linea_array['email'];
                      $nuevo=$_POST['email_login'];
                      if ($mail_user!=$nuevo) {
                      }else{
                        $i=$i+1;
                      }

                    }

    if ($i=0) {
      $pepe="No existe el usuario";
    }else {
      $pepe=$email;
    }
  }

    fclose($gestor);

    return $pepe;
}

    /*
        1 - Pasar de JSON a array
        2 - Comparo el usarname de la linea leida con el recibido en la funncion

            2 a - Si son iguales, lo encontramos!! retorno el user
            2 b - No son iguales :( , seguimos buscando...
    */

    // Si recorri todo el file y no encontré el usuario, retorno false
