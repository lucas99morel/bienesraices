<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'TU_USUARIO', 'TU_PASSWORD', 'bienesraices_crud');

    if (!$db) {
        echo "Error al conectar a la Base de Datos: " . mysqli_connect_error();
        exit;
    }

    return $db;
}
?>