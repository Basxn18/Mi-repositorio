<?php
// Conexión a la base de datos
$servername = "nombre_del_servidor";
$username = "nombre_de_usuario";
$password = "contraseña";
$dbname = "nombre_de_la_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Preparar la consulta SQL para recuperar los mensajes
$sql = "SELECT * FROM tabla_datos";
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Recorrer los resultados y mostrar los mensajes
    while ($row = $result->fetch_assoc()) {
        echo "Nombre: " . $row["nombre"] . "<br>";
        echo "Correo electrónico: " . $row["correo"] . "<br>";
        echo "Teléfono: " . $row["telefono"] . "<br>";
        echo "Mensaje: " . $row["mensaje"] . "<br><br>";
    }
} else {
    echo "No se encontraron mensajes.";
}

// Cerrar la conexión
$conn->close();
?>
