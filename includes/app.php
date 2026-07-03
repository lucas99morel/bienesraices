<?php

use Model\ActiveRecord;

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';
// require_once __DIR__ . '/../controllers/PropiedadController.php'; 
// require_once __DIR__ . '/../Router.php';

$db = conectarDB();
 ActiveRecord::setDB($db);
?>