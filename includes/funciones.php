<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

function incluirTemplate(string $nombre,bool $inicio = false, $admin = false){
    include TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado():bool{
    session_start();

    if(!$_SESSION['login']){
        header('Location: /');
    }

    return false;
}

function debugear($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
    exit;
}

// Escapar/sanitizar el HTML
function san($html):string{
    $s = htmlspecialchars($html);
    return $s;
}