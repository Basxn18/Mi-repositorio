<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}
echo "Conexión exitosa"; // Este mensaje se mostrará si la conexión es exitosa.

// Obtén los valores del formulario
$email = $_POST["email"];
$name = $_POST["name"];
$phone = $_POST["phone"];
$message = $_POST["message"];

// Validación y procesamiento del formulario
if (!empty($email) && !empty($name) && !empty($message)) {
    // Crear la consulta SQL de inserción
    $sql = "INSERT INTO tabla_datos (nombre, correo, telefono, mensaje) VALUES ('$name', '$email', '$phone', '$message')";

    // Ejecutar la consulta
    if ($conn->query($sql) === true) {
        echo "Mensaje enviado correctamente.";
    } else {
        echo "Error al enviar el mensaje: " . $conn->error;
    }
} else {
    echo "Error al enviar el mensaje. Por favor, completa todos los campos obligatorios.";
}