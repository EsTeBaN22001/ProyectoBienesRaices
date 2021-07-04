<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router){

        // Obtiene solo 3 registros de propiedades
        $propiedades = Propiedad::get(3);

        // Indica la página de inicio
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router){
        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router){
        // Obtiene todas las propiedades
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router){
        // Validar el id
        $id = validarORedireccionar('/propiedades');

        // Busca la propiedad según su id
        $propiedad = Propiedad::find($id);
        
        $router->render('/paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router){
        $router->render('/paginas/blog');
    }

    public static function entrada(Router $router){
        $router->render('/paginas/entrada');
    }

    public static function contacto(Router $router){
        
        //Mensaje para notificar si se envió o no correctamente el email
        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            // Array con las respuestas del formulario
            $respuestas = $_POST['contacto'];

            // Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            // Configurar SMTP (Protocolo para el envio de emails)
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '9092877c2d9ec1';
            $mail->Password = '84321ee8f7580a';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            // Configurar el contenido del email
            $mail->setFrom('esteban1.redon2@gmail.com');
            $mail->addAddress('esteban1.redon2@gmail.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un nuevo mensaje';
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido
            $contenido  = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: '. $respuestas['nombre'] .' </p>';
            
            // enviar de forma condicional algunos campos de email o teléfono
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p>Eligió ser contactado por telefono</p>';
                $contenido .= '<p>Telefono: '. $respuestas['telefono'] .' </p>';
                $contenido .= '<p>Fecha de contacto: '. $respuestas['fecha'] .' </p>';
                $contenido .= '<p>Hora de contacto: '. $respuestas['hora'] .' </p>';
            }else{
                $contenido .= '<p>Eligió ser contactado por email</p>';
                $contenido .= '<p>Email: '. $respuestas['email'] .' </p>';
            }

            $contenido .= '<p>Mensaje: '. $respuestas['mensaje'] .' </p>';
            $contenido .= '<p>Vende o compra: '. $respuestas['tipo'] .' </p>';
            $contenido .= '<p>Precio o presupuesto: $'. $respuestas['precio'] .' </p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            // Enviar el email
            if($mail->send()){
                $mensaje = "Mensaje enviado correctamente";
            }else{
                $mensaje = "El mensaje no se pudo enviar";
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}