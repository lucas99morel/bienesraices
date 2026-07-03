<?php

namespace MVC;

class Router{
    public $rutasGet = [];
    public $rutasPost = [];

    public function get($url,$fn){
        $this->rutasGet[$url] = $fn;
    }
 
    public function post($url,$fn){
        $this->rutasPost[$url] = $fn;
    }

    public function comprobarRutas(){
        session_start();
        $auth = $_SESSION['login'] ?? false;
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];
        $restringido = ['/admin',
        'propiedades/crear','/propiedades/actualizar','/propiedades/eliminar',
        '/vendedores/crear','/vendedores/actualizar','/vendedores/eliminar'];

        if (in_array($urlActual,$restringido) && !$auth){
            header("Location: /");
        }

        if ($method === "GET"){
            $fn = $this->rutasGet[$urlActual] ?? NULL;
        }else{
            $fn = $this->rutasPost[$urlActual] ?? NULL;
        }

        if ($fn){
            call_user_func($fn,$this);
        }
        else{
            echo "Pagina no encontrada";
        }
    }

    public function render($view,$datos){
        foreach ($datos as $clave => $valor){
            $$clave = $valor;
        }

        ob_start();
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();
        include_once __DIR__ . '/views/layout.php';
    }
}

?>