<?php 
$host = "mysql-mikol.alwaysdata.net";
$user = "mikol";
$pass = "it4v989qeByfRLg";
$db = "mikol_frutas_temporada";

$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
    die("❌ Error de conexión: " . $conexion->connect_error);
}

// Configurar charset UTF-8 para evitar problemas con acentos
$conexion->set_charset("utf8");
?>