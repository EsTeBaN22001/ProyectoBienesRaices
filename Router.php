<?php

namespace MVC;

class Router{

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($urlActual, $fn){
        $this->rutasGET[$urlActual] = $fn;
    }

    public function post($urlActual, $fn){
        $this->rutasPOST[$urlActual] = $fn;
    }

    public function comprobarRutas(){

        session_start();
        
        $auth = $_SESSION['login'] ?? null;

        // Arreglo de rutas protegidas
        $rutasProtegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar', '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar'];

        $urlActual = $_SERVER['PATH_INFO'] ?? "/";
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        }else{
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        // Proteger las rutas
        if(in_array($urlActual, $rutasProtegidas) && !$auth){
            header('Location: /');
        }

        if($fn){
            // La URL existe y hay una función asociada
            call_user_func($fn, $this);
        }else{
            echo "Página no encontrada";
        }
    }

    // Muestra una vista
    public function render($view, $datos = []){

        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include __DIR__ . "/views/$view.php";
        
        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";
    }
}