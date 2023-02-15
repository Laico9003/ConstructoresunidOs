<?php
  // Configura los datos del correo electrónico
  $destinatario = 'joellista55445@gmail.com';
  $asunto = 'Nuevo mensaje del formulario de contacto';
  
  // Obtiene los datos del formulario
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $mensaje = $_POST['mensaje'];
  
  // Crea el mensaje del correo electrónico
  $contenido = "Nombre: $nombre\n";
  $contenido .= "Correo electrónico: $email\n\n";
  $contenido .= "Mensaje:\n$mensaje\n";
  
  // Envía el correo electrónico
  $headers = 'From: ' . $email . "\r\n" .
    'Reply-To: ' . $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
  mail($destinatario, $asunto, $contenido, $headers);
  
  // Redirige al usuario a una página de confirmación
  header('Location: index.php');
?>
