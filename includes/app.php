<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

use App\Propiedad;

// Conectarnos a las base de datos

$db = conectarDB();

Propiedad::setDB($db);