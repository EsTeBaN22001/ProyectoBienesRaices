<?php
namespace App;

class ActiveRecord{
    // Base de datos
    protected static $db;
    protected static $columasDB = [];
    protected static $tabla = '';

    // Errores/validación
    protected static $errores = [];

    // Definir la conexión a la DB
    public static function setDB($database){
        self::$db = $database;
    }

    public function guardar(){
        if(!is_null($this->id)){
            // Actualizar propiedad
            $this->actualizar();
        }else{
            $this->crear();
        }
    }

    // Crear una propiedad
    public function crear(){
        // Sanitizar los datos
        $datos = $this->sanitizarDatos();

        // Insertar datos en la base de datos
        $query = " INSERT INTO ". static::$tabla ." ( ";
        $query .= join(', ', array_keys($datos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($datos));
        $query .= " ') ";
        
        $resultado = self::$db->query($query);

        // Mensaje de exito
        if($resultado){
            // Redireccionar al usuario
            header('Location: /admin?resultado=1');
        }
    }
    // Actualizar una propiedad
    public function actualizar(){
        // Sanitizar los datos
        $datos = $this->sanitizarDatos();

        $valores= [];

        foreach($datos as $key =>$value){
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE ". static::$tabla ." SET ";
        $query .= join(', ', $valores );
        $query .= " WHERE id = '" . self::$db->escape_string($this->id). "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        // Mensaje de exito
        if($resultado){
            // Redireccionar al usuario
            header('Location: /admin?resultado=2');
        }
    }

    // Elimina el registro
    public function eliminar(){
        $query = "DELETE FROM ". static::$tabla ." WHERE id= " . self::$db->escape_string($this->id) . " LIMIT 1" ;
        $resultado = self::$db->query($query);

        if($resultado){
            $this->borrarImagen();
            header('location: /admin?resultado=3');
        }
    }

    // Identificar y unir los atributos de la BD
    public function datos(){
        $datos = [];
        foreach(self::$columasDB as $columna){
            if($columna === 'id') continue;
            $datos[$columna] = $this->$columna;
        }
        return $datos;
    }

    public function sanitizarDatos(){
        $datos = $this->datos();
        $sanitizado = [];
        
        foreach($datos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // Subida de archivos
    public function setImagen($imagen){
        // Elimina la imagen previa
        $this->borrarImagen();

        // Asignar al atributo de imagen el nombre de la imagen
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    // Eliminar imagen
    public function borrarImagen(){
        if(!is_null($this->id)){
            // Comprobar si existe el archivo
            $existeArchivo= file_exists(CARPETA_IMAGENES . $this->imagen);

            if($existeArchivo){
                unlink(CARPETA_IMAGENES . $this->imagen);
            }
        }
    }

    // Validación
    public static function getErrores(){
        return self::$errores;
    }

    public function validar(){
         // Validación del formulario
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un título";
        }

        if(!$this->precio){
            self::$errores[] = "Debes añadir un precio o has exedido la cantidad de cifras permitidas";
        }

        if(!$this->imagen){
            self::$errores[] = 'La imagen es obligatoria';
        }
        
        if(strlen($this->descripcion) < 50){
            self::$errores[] = "Debes añadir una descripción y debe tener al menos 50 caracteres";
        }

        if(!$this->habitaciones){
            self::$errores[] = "El número de habitaciones es obligatorio";
        }

        if(!$this->wc){
            self::$errores[] = "El número de baños es obligatorio";
        }

        if(!$this->estacionamiento){
            self::$errores[] = "El número de lugares de estacionamiento es obligatorio";
        }

        if(!$this->vendedorId){
            self::$errores[] = "Elije un vendedor";
        }


        return self::$errores;
    }

    // Lista todas las propiedades/registros
    public static function all(){
        $query = "SELECT * FROM " . static::$tabla;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Busca una propiedad/registro por su id
    public static function find($id){
        $query = "SELECT * FROM ". static::$tabla ." WHERE id= ${id}";

        $resultado = self::consultarSQL($query);

        // Retorna el primer elemento de un array
        return array_shift($resultado);
    }

    public static function consultarSQL($query){
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = self::crearObjeto($registro);
        }

        // Liberar la memoria
        $resultado->free();

        // Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new static;
        
        foreach($registro as $key => $value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    // Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar( $args = [] ){
        foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}