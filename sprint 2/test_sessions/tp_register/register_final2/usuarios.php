<?php

//Crea un usuario base
function usuarioNuevo() {
  return [
        "nombre" => null,
        "apellido" => null,
        "email" => null,
        "username"=>null,
        "password"=>null,
        "avatar_url" => 'https://www.google.com/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&ved=2ahUKEwibjuy0gtTaAhVGymMKHTYBBbgQjRx6BAgAEAU&url=https%3A%2F%2Fwww.facebook.com%2FProfilePictures%2F&psig=AOvVaw0qouB_cOvATbwUSbO0di7J&ust=1524697356844844',
    ];
}


//Crea usuario con los datos ingresados

function crearUsuario($usuario) {
    // hashear el password del usuario
    $usuario['password'] = password_hash($usuario['password'], PASSWORD_DEFAULT);
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
    $bytesEscritos = fwrite($fp, $jsonUser . "\n");
    fclose($fp);

    return $bytesEscritos;
}
