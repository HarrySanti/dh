<?php

function usuarioNuevo() {
    return [
        "nombre" => null,
        "apellido" => null,
        "dni" => null,
        "celular" => null,
        "email" => null,
        "password" => null,
        "avatar_url" => "https://medizzy.com/_nuxt/img/user-placeholder.d2a3ff8.png"
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
    $bytesEscritos = fwrite($fp, $jsonUser . "\n");
    fclose($fp);

    return $bytesEscritos;
}
