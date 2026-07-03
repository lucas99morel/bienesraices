<?php
declare(strict_types=1);

define('templates_url',__DIR__ . '/templates');
define('funciones_url',__DIR__ . '/funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/' . 'imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false, int $limite = 0){
    include templates_url . "/{$nombre}.php";
}

function isAuth(){
    if (!isset($_SESSION)){
        session_start();
    }
    if (!$_SESSION["login"]){
        header("Location: /");
    }
    return false;
}

function debuguear($variable){
    echo "<pre>";
        echo var_dump($variable);
    echo "</pre>";
    exit;
}

function s($html){
    return htmlspecialchars($html);
}

function validarTipo($tipo){
    $tipos = ['vendedor','propiedad'];
    return in_array($tipo,$tipos);
}

function validarId($id,$url){
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if (!$id){
        header("Location: $url");
    }

    return $id;
}
?>