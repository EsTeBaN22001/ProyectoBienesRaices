<?php

namespace App;

class Vendedor extends ActiveRecord{
    protected static $tabla = 'vendedores';
    protected static $columasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {

        $this->id = $args['id'] ?? null;
        $this->nombre = $args['titulo'] ?? '';
        $this->apellido = $args['precio'] ?? '';
        $this->telefono = $args['imagen'] ?? '';
    }
}