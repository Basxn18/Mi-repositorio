<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

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

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los valores del formulario
    $email = $_POST["email"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Validación y procesamiento del formulario
    if (!empty($email) && !empty($name) && !empty($message)) {
        // Aquí puedes realizar el código necesario para enviar el mensaje, como enviar un correo electrónico o guardar en la base de datos.

        // Si el mensaje se envía correctamente
        echo "Mensaje enviado";
    } else {
        // Si hay algún campo faltante
        echo "Error al enviar mensaje. Por favor, completa todos los campos obligatorios.";
    }
}
?>

