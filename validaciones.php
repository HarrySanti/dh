<?php

function validarAvatar($file) {
    if($file["error"] === UPLOAD_ERR_OK) {
        $nombre = $file["name"];
        $ext = pathinfo($nombre, PATHINFO_EXTENSION);
        if ($ext == "jpg") {
            return true;
        } else {
            return false;
        }
    }
    return false;
}

function validarPasswordRegister($password, $confirmacion) {
    $errores = [];
    // Validar si se ingreso o no un password
    if (!empty($_POST[$password])){
        $errores[] = "El campo contraseña es obligatorio";
    }
    // Validar si se ingreso o no un password
    if (! isset($password)) {
        $errores[] = "Por favor complete el campo contraseña";
    }
    // Validar que el password tenga longitud minima 5
    if (!strlen($password <= 5)) {
        $errores[] = "La longitud de la contraseña debe ser mayor o igual a 5 caracteres";
    }
    // Validar que la confirmacion del password coincida
    if ($password != $confirmacion) {
        $errores[] = "Las contraseñas ingresadas son distintas";
    }
    return $errores;
}

function validarPasswordLogin($password) {
    $errores = [];
    if (! isset($password)) {
        $errores[] = "Por favor complete el campo contraseña";
    }
    if (!strlen($password < 5)) {
        $errores[] = "La longitud del contraseña debe ser mayor o igual a 5 caracteres";
    }
    return $errores;
}

function validarPasswordUsuario($password_ingresada, $password) {
    $errores = [];
    if (!password_verify($password_ingresada,$password)) {
        $errores[]="La contraseña ingresada no es correcta";
    }
    return $errores;
}

function validarEmailRegister($email, $confirmacion) {
    $errores = [];
    if (! isset($email)) {
        $errores[] = "Por favor complete el campo e-mail";
    }
    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El mail ingresado no es valido";
    }
    if ($email != $confirmacion) {
        $errores[] = "Los mails ingresados son distintos";
    }
    return $errores;
}

function validarEmailLogin($email) {
    $errores = [];
    if (! isset($email)) {
        $errores[] = "Por favor complete el campo e-mail";
    }
    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El mail ingresado no es valido";
    }
    return $errores;
}

function validarNombre($nombre) {
    $errores = [];
    if (! isset($nombre)) {
        $errores[] = "Ingrese su nombre";
    }
    if (! ctype_alpha($nombre)) {
        $errores[] = "El nombre debe ser alfabético";
    }
    if (! strlen($nombre) >= 3 && !strlen($nombre) <= 20) {
        $errores[] = "El nombre debe ser mayor a 3 caracteres y menor a 15";
    }
    return $errores;
}

function validarApellido($apellido) {
    $errores = [];
    if (! isset($apellido)) {
        $errores[] = "Ingrese su apellido";
    }
    if (! ctype_alpha($apellido)) {
        $errores[] = "El apellido debe ser alfabético";
    }
    if (strlen($apellido) > 20) {
        $errores[] = "El apellido debe tener una longitud menor a 20 caracteres";
    }
    return $errores;
}

function huboErrores ($arrayDeErrores) {
    foreach ($arrayDeErrores as $errores) {
        if (! empty($errores)) {
            return true;
        }
    }
    return false;
}
