<?php

namespace Controllers;
Use MVC\Router;
use Model\Vendedor;

class VendedorController{
    public static function crear(Router $router){
        // Crea un nuevo vendedor
        $vendedor = new Vendedor();
        
        // Array con los mensajes de errores
        $errores = Vendedor::getErrores();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            // Crear una nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);
            
            // Validar que no haya campos vacíos
            $errores = $vendedor->validar();
    
            // Si no hay errores
            if(empty($errores)){
                $vendedor->guardar();
            }
        }

        $router->render('/vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        // Array con los mensajes de errores
        $errores = Vendedor::getErrores();

        // Valida que sea un id válido
        $id = validarORedireccionar('/admin');

        // Obtener el arreglo del vendedor
        $vendedor = Vendedor::find($id);


        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Asignar los valores
            $args = $_POST['vendedor'];
    
            $vendedor->sincronizar($args);
            
            // validar
            $errores = $vendedor->validar();
    
            if(empty($errores)){
                $vendedor->guardar();
            }
        }

        $router->render('/vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // validar el id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){
                // Valida el tipo a eliminar
                $tipo = $_POST['tipo'];

                if(validarTipoDeContenido($tipo)){
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}