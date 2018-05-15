<?php

//validar password
function validarPassword($password) {

    $errores = [];

    // Validar si se ingreso o no un password
    if (! isset($password)) {
        $errores[] = "Por favor complete el campo contraseña";
    }
    // Validar que el password tenga longitud minima 5
    if (!strlen($password < 5)) {
        $errores[] = "La longitud del contraseña debe ser mayor o igual a 5 caracteres";
    }


    return $errores;
}

//validar mail
function validarEmail($email) {

    $errores = [];

    // Validar si se ingreso o no un mail
    if (! isset($email)) {
        $errores[] = "Por favor complete el campo e-mail";
    }

    // Validar que el mail ingresado sea valido
    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El mail ingresado no es valido";
    }


    return $errores;
}

//validación de errores
function huboErrores ($arrayDeErrores) {
    foreach ($arrayDeErrores as $errores) {
        if (! empty($errores)) {
            return true;
        }
    }

    return false;
}



//validar contraseña en el Login


function validarPasswordUsuario($password_ingresada, $password) {

    $errores = [];

    // Validar que el password sea el mismo al guardado
    if (!password_verify($password_ingresada,$password)) {

        //si la contraseña no es correcta
        $errores[]="La contraseña ingresada no es correcta";
    }


    return $errores;
}
