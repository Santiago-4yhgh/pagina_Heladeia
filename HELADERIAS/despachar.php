<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitización y validación de datos
    $nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '';
    $despachar_clientes = isset($_POST['despachar_clientes']) ? htmlspecialchars($_POST['despachar_clientes']) : '';
    $limpiar_mesa = isset($_POST['limpiar_mesa']) ? htmlspecialchars($_POST['limpiar_mesa']) : '';

    // Información del correo
    $to = "22302105@utfv.edu.mx"; // Reemplaza con tu dirección de correo electrónico
    $subject = "Formulario de Actividades - Segunda Persona";
    $message = "Nombre de la Persona: $nombre\n\nDespachar Clientes:\n$despachar_clientes\n\nLimpiar Mesas:\n$limpiar_mesa";
    $headers = "22302105@utfv.edu.mx"; // Reemplaza con una dirección de correo electrónico válida de tu dominio

    // Enviar correo
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Formulario enviado exitosamente.');</script>";
    } else {
        echo "<script>alert('Hubo un error al enviar el formulario.');</script>";
    }
}
?>
