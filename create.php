<?php
$servername = "localhost";
$username = "root";
$password = "2pjbY8k$4TFJ";
$dbname = "construccion";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Conexión fallida: " . $e->getMessage();
}

if (isset($_POST['submit'])) {
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $telefono = $_POST['telefono'];
  $mensaje = $_POST['mensaje'];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Correo electrónico inválido");
  }

  $stmt = $conn->prepare("INSERT INTO cotizaciones (nombre, email, telefono, mensaje) VALUES (?, ?, ?, ?)");
  $stmt->execute([$nombre, $email, $telefono, $mensaje]);

  $destinatario = "joellista55445@gmail.com";
  $asunto = "Nuevo mensaje de $nombre";
  $cuerpo = "Nombre: $nombre\nEmail: $email\nTelefono: $telefono\nMensaje: $mensaje";

  if (mail($destinatario, $asunto, $cuerpo)) {
    echo "Mensaje enviado correctamente";
header("Location: index.php#contactos");

  } else {
    echo "Ha habido un error al enviar el mensaje";
  }
}

?>

