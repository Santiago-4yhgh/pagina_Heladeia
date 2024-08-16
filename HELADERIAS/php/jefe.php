<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formularioDB";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $pagar = $_POST["pagar"];
    $hacer_cuentas = $_POST["hacer_cuentas"];

    $sql = "INSERT INTO actividades (nombre, pagar, hacer_cuentas) VALUES ('$nombre', '$pagar', '$hacer_cuentas')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
