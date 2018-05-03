<?php

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
        if (! strlen($nombre) >= 3) && (! strlen($nombre) <= 15) {
            $errores[] = "El nombre debe ser mayor a 3 caracteres y menor a 15"
        }
    }

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
    }

    function validarDNI($dni) {
        $errores = [];

        // Validar que se haya ingresado DNI
        if (! isset($dni)) {
            $errores[] = "Ingrese DNI";
        }

        // Sea solo numerico
        if (! is_numeric($dni)) {
            $errores[] = "DNI incorrecto";
        }

        // Longitud 8
        if (strlen($dni) < 8) {
            $errores[] = "El dni debe tener una longitud mayor o igual a 8";
        }

        // Entre 500.000 y 100.000.000
        if ($dni > 500.000 && $dni > 100.000.000) {
            $errores[] = "DNI incorrecto";
        }
    }

    function validarCelular($celular) {
        $errores = [];

    // Validar si se ingreso el campo
        if (! isset($celular)) {
            $errores[] = "Ingrese su celular";
        }

    // Validar que se haya ingresado un numero
        if (! is_numeric($celular)) {
            $errores[] = "Ingrese sólo numeros, sin puntos";
        }

    // Validar que empiece con 11
        if (! substr(0, 1) == 11) {
            $errores[] = "El numero de celular debe comenzar con 11";
        }

    // Validar que tenga una longitud mayor o igual a 10 y menor a 12
        if ($celular < 10 && $celular > 12) {
            $errores[] = "Celular incorrecto";
        }
    }

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

    function validarPassword($password, $confirmacion) {
        
        $errores = [];

        // Validar si se ingreso o no un password
        if (! isset($password)) {
            $errores[] = "Por favor complete el campo contraseña";
        }
        // Validar que el password tenga longitud minima 5
        if (strlen($password < 5)) {
            $errores[] = "La longitud del contraseña debe ser mayor o igual a 5 caracteres";
        }
        // Validar que la confirmacion del password coincida
        if ($password != $confirmacion) {
            $errores[] = "Las contraseñas ingresadas son distintas";
        }

        return $errores;
    }

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


    function validarNombreDeUsuario($nombreDeUsuario) {
        
        $errores = [];

        // Validar si se ingreso o no un nombre usuario
        if (! isset($nombreDeUsuario)) {
            $errores[] = "Por favor complete el campo username";
        }
        // Validar que el nombre de usuario sea alfanumerico y de longitud minima 5
        if (! ctype_alnum($nombreDeUsuario)) {
            $errores[] = "El username debe ser alfanumerico";
        }

        if (strlen($nombreDeUsuario) < 5) {
            $errores[] = "La longitud del username debe ser mayor o igual a 5 caracteres";
        }

        return $errores;
    }







