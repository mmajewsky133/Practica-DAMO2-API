<?php
//Acuerdese de cambiar las credenciales porfa gracias
$mysql = new mysqli("localhost", "root", "1234", "MyUCA");
if ($mysql->connect_error) {
    echo "Error: ";
    die("Error de conexion a Base de Datos (Verificar Credenciales y estado de la base de datos)");
} else {
    echo "\n";
}