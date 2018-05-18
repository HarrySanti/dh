<?php
function huboErrores ($arrayDeErrores) {
    foreach ($arrayDeErrores as $errores) {
        if (! empty($errores)) {
            return true;
        }
    }
    return false;
}
?>