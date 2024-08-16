<?php
$servername = "localhost"; // Cambia esto si tu servidor de base de datos está en otro lugar
$username = "root"; // Cambia esto según tu configuración
$password = ""; // Cambia esto según tu configuración
$dbname = "transportistaDB";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $mercancia = $_POST['ir_por_mercancia'];

    // Preparar y ejecutar la consulta SQL
    $stmt = $conn->prepare("INSERT INTO transportista (nombre, mercancia) VALUES (?, ?)");
    $stmt->bind_param("ss", $nombre, $mercancia);

    if ($stmt->execute()) {
        echo "Datos guardados correctamente";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
