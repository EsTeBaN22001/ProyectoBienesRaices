<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . "/imagenes/");

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

// Validar tipo de contenido
function validarTipoDeContenido($tipo){
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}

// Valida si hay un id o sino redirecciona
function validarORedireccionar(string $url){
    // Validación y sanitización de la URL por Id válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("location: ${url}");
    }

    return $id;
}