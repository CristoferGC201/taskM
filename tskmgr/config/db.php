<?php
// app/config/db.php

// Configuración de la base de datos
$host = 'localhost';
$db_name = 'tskmgr'; // Asegúrate de que el nombre de la base de datos sea correcto
$username = 'root'; // Cambia esto según tu configuración
$password = ''; // Cambia esto según tu configuración

try {
    // Crear una nueva conexión PDO
    $db = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configura el modo de error
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); // Muestra error de conexión
}
