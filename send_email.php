<?php
$msg = array(); // Inicializa el array de mensajes

$name = trim($_POST['name']); // Cambiado de 'contact-name' a 'name'
$lastname = trim($_POST['lastname']); // Agregado para capturar el apellido
$phone = trim($_POST['phone']);
$email = trim($_POST['email']); // Cambiado de 'contact-email' a 'email'
$message = trim($_POST['message']); // Cambiado de 'contact-message' a 'message'

// Validación de campos
if ($name == "") {
    $msg['err'] = "\n El nombre no puede estar vacío!";
    $msg['field'] = "name";
    $msg['code'] = FALSE;
} else if ($lastname == "") { // Validación para apellido
    $msg['err'] = "\n El apellido no puede estar vacío!";
    $msg['field'] = "lastname";
    $msg['code'] = FALSE;
} else if ($phone == "") {
    $msg['err'] = "\n El número de teléfono no puede estar vacío!";
    $msg['field'] = "phone";
    $msg['code'] = FALSE;
} else if (!preg_match("/^[0-9 \\-\\+]{4,17}$/i", trim($phone))) {
    $msg['err'] = "\n Por favor, ingresa un número de teléfono válido!";
    $msg['field'] = "phone";
    $msg['code'] = FALSE;
} else if ($email == "") {
    $msg['err'] = "\n El correo no puede estar vacío!";
    $msg['field'] = "email";
    $msg['code'] = FALSE;
} else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $msg['err'] = "\n Por favor, ingresa una dirección de correo válida!";
    $msg['field'] = "email";
    $msg['code'] = FALSE;
} else if ($message == "") {
    $msg['err'] = "\n El mensaje no puede estar vacío!";
    $msg['field'] = "message";
    $msg['code'] = FALSE;
} else {
    $to = 'guilletorres81@gmail.com';
    $subject = 'Consulta de Contacto desde el formulario'; // Ajusta el asunto si lo necesitas
    $_message = '<html><head></head><body>';
    $_message .= '<p>Nombre: ' . $name . '</p>';
    $_message .= '<p>Apellido: ' . $lastname . '</p>'; // Agregado para apellido
    $_message .= '<p>Teléfono: ' . $phone . '</p>';
    $_message .= '<p>Email: ' . $email . '</p>';
    $_message .= '<p>Mensaje: ' . $message . '</p>';
    $_message .= '</body></html>';

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: ' . $email . "\r\n";
    $headers .= 'cc: ventas.abeV8@gmail.com' . "\r\n";
    $headers .= 'bcc: ventas.abeV8@gmail.com' . "\r\n";
    mail($to, $subject, $_message, $headers);

    $msg['success'] = "\n El correo ha sido enviado exitosamente.";
    $msg['code'] = TRUE;
}

echo json_encode($msg);
