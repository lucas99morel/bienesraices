<?php

namespace Controller;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PaginasController{ 
    public static function index(Router $router){
        $propiedades = Propiedad::get(3);

        $router->render('paginas/index',[
            'propiedades' => $propiedades,
            'inicio' => true
        ]);
    }
    
    public static function nosotros(Router $router){
        $router->render('/paginas/nosotros',[]);
    }

    public static function propiedades(Router $router){
        $propiedades = Propiedad::getAll();

        $router->render('paginas/propiedades',[
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router){
        $id = validarId($_GET['id'],'/');

        if ($propiedad = Propiedad::getById($id)){
            $router->render('paginas/propiedad',[
                'propiedad' => $propiedad
            ]);
        }
        else{
            header("Location: /");
        }
    }

    public static function blog(Router $router){
        $router->render('paginas/blog',[]);
    }

    public static function entrada(Router $router){
        $router->render('paginas/entrada',[]);
    }

    public static function contacto(Router $router){
        $notif = NULL;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $datos = $_POST['contacto'];
            $mail = new PHPMailer(true);

            try{
                //Configurar el SMTP
                $mail->isSMTP(true);
                $mail->Host = 'sandbox.smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Username = '3e6deca2653052';
                $mail->Password = '3dc79ad413071d';
                $mail->SMTPSecure = 'tls';
                $mail->Port = '2525';

                //Configurar Destinatarios
                $mail->setFrom('liqui@gmail.com','LiquiYou');
                $mail->addAddress('admin@bienesraices.com','BienesRaices');

                //Asunto
                $mail->Subject = 'Subject is Asunto';

                //Habilitar HTML 
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';

                //Cuerpo del Correo
                $contenido =  '<h1>Tienes un nuevo mensaje</h1>';
                $contenido .= '<p>Nombre: ' . $datos['nombre'] . '</p>';
                $contenido .= '<p>Mensaje: ' . $datos['mensaje'] . '</p>';
                $contenido .= '<p>Tipo: ' . $datos['tipo'] . '</p>';
                $contenido .= '<p>Presupuesto: $' . $datos['precio'] . '</p>';
                $contenido .= '<p>Prefiere ser contactado por ' . $datos['contacto'] . ': ';
                
                if ($datos['contacto'] === 'tel'){
                    $contenido .= $datos['telefono'] . '</p>';
                    $contenido .= '<p>Fecha: ' . $datos['fecha'] . '</p>';
                    $contenido .= '<p>Hora: ' . $datos['hora'] . '</p>';
                }
                else{
                    $contenido .= $datos['email'] . '</p>';
                }

                
                $mail->Body = $contenido;
                $mail->AltBody = ' Haupei kp - Un saludo cordial!';

                //Enviar correo
                $mail->send();
                $notif = 'Correo enviado';

            }
            catch(Exception $e){
                $notif = 'No se pudo enviar el email';
            }
        }

        $router->render('paginas/contacto',[
            'mensaje' => $notif
        ]);
    }

}
?>