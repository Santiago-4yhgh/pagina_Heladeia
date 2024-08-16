<?php
$servername = "localhost"; // Cambia esto si tu servidor de base de datos es diferente
$username = "tu_usuario";  // Tu nombre de usuario de MySQL
$password = "tu_contraseña"; // Tu contraseña de MySQL
$dbname = "conexion"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear base de datos si no existe
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada o ya existe.<br>";
} else {
    echo "Error creando base de datos: " . $conn->error . "<br>";
}

// Seleccionar base de datos
$conn->select_db($dbname);

// SQL para crear la tabla si no existe
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE,
    `contraseña` VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla 'usuarios' creada o ya existe.";
} else {
    echo "Error creando tabla: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
