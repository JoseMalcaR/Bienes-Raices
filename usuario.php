<?php

// Importar la conexión
require 'includes/app.php';
$db = conectarDB();

// Cargar variables de entorno
$env = parse_ini_file(__DIR__ . '/.env');

if ($env === false) {
    die('Error: No se pudo cargar el archivo .env');
}

// Crear un email y password
$email = $env['EMAIL'];
$password = $env['PASSWORD'];

// Hashear el password
$passwordHashed = password_hash($password, PASSWORD_BCRYPT);


// Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('{$email}', '{$passwordHashed}');";


// Agregarlo a la base de datos
mysqli_query($db, $query);