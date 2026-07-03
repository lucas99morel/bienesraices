<?php

namespace Controller;

use MVC\Router;
use Model\Vendedor;

class VendedorController{
    public static function crear(Router $router){
        $vendedor = new Vendedor();
        $errores = Vendedor::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $vendedor = new Vendedor($_POST['vendedor']);
            
            $errores = $vendedor->validar();

            if (empty($errores)){
                $result = $vendedor->guardar();

                if ($result){
                    header("Location: /admin?registro=1");
                }
            }
        }

        $router->render('vendedores/crear',[
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        $id = validarId($_GET['id'],'/admin');

        if ($vendedor = Vendedor::getById($id)){
            $errores = Vendedor::getErrores();

            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $vendedor->sincronizar($_POST['vendedor']);
                
                
                $errores = $vendedor->validar();

                if (empty($errores)){
                    if ($vendedor->actualizar()){
                        header("Location: /admin?registro=2");
                    }
                }
            }

            $router->render('vendedores/actualizar',[
                'vendedor' => $vendedor,
                'errores' => $errores
            ]);
        }
        else{
            header('Location: /admin');
        }
    }
    public static function eliminar(Router $router){
        if($_SERVER["REQUEST_METHOD"] === 'POST'){
            $id = validarId($_POST['id'],'/admin');

            if (validarTipo($_POST['tipo'])){
                $vendedor = Vendedor::getById($id);
                $result = $vendedor->eliminar();
            }

            
            if ($result){
                header("Location: /admin?registro=3");
            }
        }
        
    }
}

?>