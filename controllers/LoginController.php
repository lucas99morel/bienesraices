<?php

namespace Controller;
use MVC\Router;
use Model\Admin;

class LoginController {
    public static function login(Router $router){
        $errores = Admin::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Admin($_POST);
            $errores = $auth->validar();

            if (empty($errores)){
                $resultado = $auth->existeUsuario() ?? NULL;

                if (is_null($resultado)){
                    $errores = Admin::getErrores();
                }
                else{
                    if (!$auth->comprobarPassw($resultado)){
                        $errores = Admin::getErrores();
                    }
                    else{
                        $auth->autenticar();
                    }
                }
            }
        }

        $router->render('auth/login',[
            'errores' => $errores
        ]);
    }

    public static function logout(Router $router){
        session_start();
        $_SESSION = [];
        session_destroy();
        header('Location: /');
    }
}

?>