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
            "MIME-Version: 1.0" . "\r\n" .
            "Content-Type: text/plain; charset=UTF-8" . "\r\n" .
            "X-Mailer: PHP/" . phpversion();

    // Definir el destinatario y el asunto
    $to = "guilletorres81@gmail.com";
    $subject = "Contacto con cliente desde formulario";

    // Enviar el correo
    if(@mail($to, $subject, $body,  $headers)){
        @mail($to, $subject, $body,  $headers);
        header("Location: success-mail.html");
    }else{
        header("Location: error-mail.html");
    }

    
    

