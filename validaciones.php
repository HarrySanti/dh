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
    if (!isset($_POST[$password])){
        if (empty($password)) {
            $errores[] = "La contraseña es obligatoria.";
        }
        if (strlen($password < 5)) {
            $errores[] = "La longitud de la contraseña debe ser mayor a 5 caracteres.";
        }
        if ($password != $confirmacion) {
            $errores[] = "Las contraseñas ingresadas son distintas.";
        }
    }    
    return $errores;
}

function validarPasswordLogin($password) {
    $errores = [];
    if (!isset($_POST[$password])){
        if (empty($password)) {
            $errores[] = "La contraseña es obligatoria.";
        }
    }    
    return $errores;
}

function validarPasswordUsuario($password_ingresada, $password) {
    $errores = [];
    if (!password_verify($password_ingresada, $password)) {
        $errores[] = "La contraseña ingresada no es correcta.";
    }
    return $errores;
}

function validarEmailRegister($email, $confirmacion) {
    $errores = [];
    if (!isset($_POST[$email])){
        if (empty($email)) {
            $errores[] = "El email es obligatorio.";
        }
        if ($email != $confirmacion) {
            $errores[] = "Los mails ingresados son distintos.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "El mail ingresado no es valido.";
        }
    }    
    return $errores;
}

function validarEmailLogin($email) {
    $errores = [];
    if (!isset($_POST[$email])){
        if (empty($email)) {
            $errores[] = "El email es obligatorio.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "El mail ingresado no es valido.";
        }
    }    
    return $errores;
}

function validarNombre($nombre) {
    $errores = [];
    if (!isset($_POST[$nombre])){
        if (empty($nombre)) {
            $errores[] = "El nombre es obligatorio.";
        }
        if (!ctype_alpha($nombre)) {
            $errores[] = "El nombre debe contener unicamente letras.";
        }
        if (!strlen($nombre) >= 5 && strlen($nombre) <= 20) {
            $errores[] = "El nombre debe contener entre 5 y 20 caracteres.";
        }
    }
    return $errores;
}

function validarApellido($apellido) {
    $errores = [];
    if (!isset($_POST[$apellido])){
        if (empty($apellido)) {
            $errores[] = "El apellido es obligatorio.";
        }
        if (!ctype_alpha($apellido)) {
            $errores[] = "El apellido debe contener unicamente letras.";
        }
        if (!strlen($apellido) >= 5 && strlen($apellido) <= 20) {
            $errores[] = "El apellido debe contener entre 5 y 20 caracteres.";
        }
    }    
    return $errores;
}

function validarCumpleaños($fnac_anio) {
    $errores = [];
    if (!isset($_POST[$fnac_anio])){
        if (!strlen($fnac_anio) >= 18) {
            $errores[] = "Para registrarte tenes que se mayor a 18 años.";
        }
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
