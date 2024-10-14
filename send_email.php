<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    if (@mail(to: $to, subject: $subject, message: $body, additional_headers: $headers)) {
        header("Location: index.html");
    } else {
        echo "Error al enviar el correo.";
    }
} else {
    echo "Método de solicitud no válido.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notification</title>
    <link rel="stylesheet" href="style.css"> <!-- Optional: Link to your CSS -->
</head>
<body>

    <h1>Email Notification</h1>
    <p>Your email has been sent successfully!</p>

    <!-- Add more content as needed -->

</body>
</html>
