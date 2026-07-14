<?php

mysqli_report(MYSQLI_REPORT_OFF);


$db_host = '127.0.0.1';
$db_user = 'root';
$db_pass = ''; 
$db_name = 'mi_proyecto'; 

$conexion = mysqli_connect($db_host, $db_user, $db_pass);

if (!$conexion) {
    error_log("Error de conexión: " . mysqli_connect_error());
    die("Error] No se pudo establecer la conexión con el servidor.");
}

$sqlCrearBD = "CREATE DATABASE IF NOT EXISTS $db_name CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";

if (!mysqli_query($conexion, $sqlCrearBD)) {
    error_log("Error al crear la BD: " . mysqli_error($conexion));
    die("<h3>[Error] No se pudo inicializar el almacenamiento lógico.</h3>");
}

if (!mysqli_select_db($conexion, $db_name)) {
    error_log("Error al seleccionar BD: " . mysqli_error($conexion));
    die("<h3>[Error] Base de datos no disponible en este momento.</h3>");
}

mysqli_set_charset($conexion, "utf8mb4");

$sqlCrearTabla = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(150) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY uq_correo (correo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;";

if (mysqli_query($conexion, $sqlCrearTabla)) {
    echo "CONEXIÓN ESTABLECIDA Entorno inicializado y listo para pruebas.";
    e
} else {
    error_log("Error al crear tabla: " . mysqli_error($conexion));
    echo "<h3>[Error] Estructura de datos no disponible.</h3>";
}

mysqli_close($conexion);
?>