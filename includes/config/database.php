<?php 

function conectarDB() : mysqli{
    $db = new mysqli('localhost', 'root', '', 'bienes_raices');
    // $db -> set_charset('utf8');

    if (!$db) {
        echo "Error, no conectó";
        exit;
    }

    return $db;
}