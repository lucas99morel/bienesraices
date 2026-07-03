<?php

namespace Controller;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PropiedadController{
    public static function index(Router $router){
        $propiedades = Propiedad::getAll();
        $vendedores = Vendedor::getAll();
        

        $router->render('propiedades/admin',[
            'propiedades' => $propiedades,
            'registro' => $_GET['registro'] ?? NULL,
            'vendedores' => $vendedores
        ]);
    }

    public static function crear(Router $router){
        $propiedad = new Propiedad();
        $vendedores = Vendedor::getAll();
        $errores = Propiedad::getErrores();

        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $propiedad = new Propiedad($_POST['propiedad']);
            

            if ($_FILES['propiedad']['tmp_name']['imagen']){
                $manager = new ImageManager(new Driver());
                $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800,600);
                $nombreImagen = md5(uniqid(rand(),true)) . '.jpg';
                $propiedad->setImagen($nombreImagen);
            }

            $errores = $propiedad->validar();
            if (empty($errores)){
                if (!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }
                $imagen->save(CARPETA_IMAGENES . $nombreImagen);
                
                
                $result = $propiedad->guardar();
                if ($result){
                    //redireccionar al usuario
                    header('Location: /admin?registro=1');
                }
            }
        }


        $router->render('propiedades/crear',[
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        $id = validarId($_GET['id'],'/admin');
        if ($propiedad = Propiedad::getById($id)){
            $vendedores = Vendedor::getAll();
            $errores = Propiedad::getErrores();
            
            if ($_SERVER["REQUEST_METHOD"] === "POST"){
                $propiedad->sincronizar($_POST['propiedad']);
                
                
                if ($_FILES['propiedad']['tmp_name']['imagen']){
                    $manager = new ImageManager(new Driver());
                    $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800,600);
                    $nombreImagen = md5(uniqid(rand(),true)) . '.jpg';
                    $propiedad->setImagen($nombreImagen);
                }

                $errores = $propiedad->validar();

                if (empty($errores)){
                    if (!is_dir(CARPETA_IMAGENES)){
                        mkdir(CARPETA_IMAGENES);
                    }
                    if ($_FILES['propiedad']['tmp_name']['imagen']){
                        $imagen->save(CARPETA_IMAGENES . $nombreImagen);
                    }
                    
                    $result = $propiedad->actualizar();
                    
                    if ($result){
                        //redireccionar al usuario
                        header('Location: /admin?registro=2');
                    }
                }
            }

            $router->render('propiedades/actualizar',[
                'propiedad' => $propiedad,
                'errores' => $errores,
                'vendedores' => $vendedores
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
                $propiedad = Propiedad::getById($id);
                $result = $propiedad->eliminar();
            }

                
            if ($result){
                header("Location: /admin?registro=3");
            }
        }
    }
}

?>