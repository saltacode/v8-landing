<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar los campos del formulario
    $name = htmlspecialchars(trim($_POST["name"]));
    $lastname = htmlspecialchars(trim($_POST["lastname"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $phone = htmlspecialchars(trim($_POST["phone"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validar que los campos no estén vacíos
    if (!empty($name) && !empty($lastname) && !empty($email) && !empty($message)) {
        
        // Configuración del correo
        $to = "guilletorres81@gmail.com";  // Cambia a tu dirección de correo
        $subject = "Nuevo mensaje desde el formulario web";
        $body = "Nombre: $name\nApellido: $lastname\nCorreo: $email\nTeléfono: $phone\nMensaje:\n$message";
        $headers = "From: $email\r\n" . "Reply-To: $email\r\n";

        // Enviar correo
        if (mail($to, $subject, $body, $headers)) {
            echo "Correo enviado con éxito.";
        } else {
            echo "Error al enviar el correo.";
        }
    } else {
        echo "Por favor, completa todos los campos requeridos.";
    }
}
