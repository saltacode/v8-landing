<?php
    // Obtener los datos del formulario
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Crear el contenido del correo
    $body = "Nombre: $name\n";
    $body .= "Apellido: $lastname\n";
    $body .= "Correo: $email\n";
    $body .= "Teléfono: $phone\n";
    $body .= "Mensaje:\n$message\n";

    // Cabeceras del correo
    $headers = "From: $name <$email>" . "\r\n" .
                "Reply-To: $email" . "\r\n" .
                "X-Mailer: PHP/" . phpversion();

    // Definir el destinatario y el asunto
    $to = "guilletorres81@gmail.com";
    $subject = "Nuevo mensaje de contacto";

    // Enviar el correo
    mail($to, $subject, $body,  $headers);
    header("Location: index.html");
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email enviado</title>
    <link rel="stylesheet" href="style.css"> <!-- Optional: Link to your CSS -->
</head>
<body>

    <h1>Notificaión</h1>
    <p>Email enviado correctamente</p>

    <!-- Add more content as needed -->
    <script>
        setTimeout(() => {
            window.location.href = "index.html";
        }, 2000);
    </script>
</body>
</html>
