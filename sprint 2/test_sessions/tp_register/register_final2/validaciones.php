<?php


//Valida avatar
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


//Valida Password
function validarPassword($password, $confirmacion) {

    $errores = [];

    // Validar si se ingreso o no un password
    if (! isset($password)) {
        $errores[] = "Por favor complete el campo contraseña";
    }
    // Validar que el password tenga longitud minima 5
    if (!strlen($password < 5)) {
        $errores[] = "La longitud de la contraseña debe ser mayor o igual a 5 caracteres";
    }
    // Validar que la confirmacion del password coincida
    if ($password != $confirmacion) {
        $errores[] = "Las contraseñas ingresadas son distintas";
    }

    return $errores;
}


//Valida Email
function validarEmail($email, $confirmacion) {

    $errores = [];

    // Validar si se ingreso o no un mail
    if (! isset($email)) {
        $errores[] = "Por favor complete el campo e-mail";
    }

    // Validar que el mail ingresado sea valido
    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El mail ingresado no es valido";
    }

    // Validar que el mail y la confirmacion coincidan
    if ($email != $confirmacion) {
        $errores[] = "Los mails ingresados son distintos";
    }

    return $errores;
}



//Valida Nombre
function validarNombre($nombre) {

       $errores = [];

       // Validar si se ingresó un nombre
       if (! isset($nombre)) {
           $errores[] = "Ingrese su nombre";
       }

       // Validar que sean sólo letras
       if (! ctype_alpha($nombre)) {
           $errores[] = "El nombre debe ser alfabético";
       }

       // Validar longitud minima 3 y maxima 15
       if (! strlen($nombre) >= 3 && !strlen($nombre) <= 20) {
           $errores[] = "El nombre debe ser mayor a 3 caracteres y menor a 15";
       }

       return $errores;
   }




//Valida Apellido
   function validarApellido($apellido) {
       $errores = [];

       // Validar si se ingreso apellido
       if (! isset($apellido)) {
           $errores[] = "Ingrese su apellido";
       }

       // Validar que solo sean letras
       if (! ctype_alpha($apellido)) {
           $errores[] = "El apellido debe ser alfabético";
       }

       // Validar longitud maxima 20 caracteres
       if (strlen($apellido) > 20) {
           $errores[] = "El apellido debe tener una longitud menor a 20 caracteres";
       }

       return $errores;
   }


//Chequea si hubo errores en la validación
   function huboErrores ($arrayDeErrores) {
       foreach ($arrayDeErrores as $errores) {
           if (! empty($errores)) {
               return true;
           }
       }

       return false;
   }
