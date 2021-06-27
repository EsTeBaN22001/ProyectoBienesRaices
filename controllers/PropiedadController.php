<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController{
    public static function index(Router $router){

        // Obtiene todas las propiedades
        $propiedades = Propiedad::all();

        // Obtiene todos los vendedores
        $vendedores = Vendedor::all();

        // Muestra un mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('/propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }

    public static function crear(Router $router){

        // Crea una nueva propiedad
        $propiedad = new Propiedad;

        // Obtiene todos los vendedores
        $vendedores = Vendedor::all();

        // Array con los mensajes de errores
        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            /**CREA UNA NUEVA INSTANCIA */
            $propiedad = new Propiedad($_POST['propiedad']);

            /**SUBIDA DE ARCHIVOS */
            // Generar nombre único para las imágenes
            $nombreImagen = md5(uniqid(rand(), true)). ".jpg";

            // Setear la imagen
            // Realiza un resize a la imagen con intervention
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            // Validar
            $errores = $propiedad->validar();

            // Revisar que el arreglo de errores este vacio
            if(empty($errores)){
                // Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }
                
                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                
                // Guardar en la base de datos
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        // Validar el id
        $id = validarORedireccionar('/admin');

        // Buscar la propiedad según el id
        $propiedad = Propiedad::find($id);

        // Obtiene todos los vendedores
        $vendedores = Vendedor::all();

        // Array con los mensajes de errores
        $errores = Propiedad::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            // Asignar los atributos
            $args = $_POST['propiedad'];
            
            // Sincronizar los atributos de la propiedad
            $propiedad->sincronizar($args);
            
            // Subida de archivos
            // Generar nombre único para las imágenes
            $nombreImagen = md5(uniqid(rand(), true)). ".jpg";
            
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }
    
            // Validación
            $errores = $propiedad->validar();
    
            // Revisar que el arreglo de errores este vacio
            if(empty($errores)){
                    // Almacenar la imagen
                    if ($_FILES['propiedad']['tmp_name']['imagen']){
                        $image->save(CARPETA_IMAGENES . $nombreImagen);
                    }
                    $propiedad->guardar();
                }
        }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id){
    
                $tipo = $_POST['tipo'];
    
                if(validarTipoDeContenido($tipo)){
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }
}