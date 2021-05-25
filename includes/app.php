<?php

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

use App\ActiveRecord;

// Conectarnos a las base de datos

$db = conectarDB();

ActiveRecord::setDB($db);