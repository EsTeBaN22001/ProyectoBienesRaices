<?php

// Importar la conexión

require 'includes/config/database.php';
$db = conectarDB();

// Crear un email y un password
$email = '';
$password = "";

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Query para crear el usuario

$query = "INSERT INTO usuarios (email, password) VALUES('${email}', '${passwordHash}');";

// Agregarlo a la base de datos
mysqli_query($db, $query);
echo "Agregado correctamente";