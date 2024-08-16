<?php
$servername = "localhost"; // Cambia esto si tu servidor es diferente
$username = "tu_usuario"; // Cambia por tu usuario de MySQL
$password = "tu_contraseña"; // Cambia por tu contraseña de MySQL
$dbname = "heladeria";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y sanitizar los datos del formulario
    $nombre = $conn->real_escape_string(trim($_POST['nombre']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $direccion = $conn->real_escape_string(trim($_POST['direccion']));
    $telefono = $conn->real_escape_string(trim($_POST['telefono']));
    $sabor = $conn->real_escape_string(trim($_POST['sabor']));
    $tamano = $conn->real_escape_string(trim($_POST['tamano']));
    $toppings = isset($_POST['toppings']) ? implode(', ', $_POST['toppings']) : '';
    $comentarios = $conn->real_escape_string(trim($_POST['comentarios']));

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO pedidos (nombre, email, direccion, telefono, sabor, tamano, toppings, comentarios)
            VALUES ('$nombre', '$email', '$direccion', '$telefono', '$sabor', '$tamano', '$toppings', '$comentarios')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Pedido Recibido y Guardado</h2>";
        echo "<p><strong>Nombre:</strong> $nombre</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Dirección:</strong> $direccion</p>";
        echo "<p><strong>Teléfono:</strong> $telefono</p>";
        echo "<p><strong>Sabor de Helado:</strong> $sabor</p>";
        echo "<p><strong>Tamaño:</strong> $tamano</p>";
        echo "<p><strong>Toppings:</strong> $toppings</p>";
        echo "<p><strong>Comentarios:</strong> $comentarios</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
