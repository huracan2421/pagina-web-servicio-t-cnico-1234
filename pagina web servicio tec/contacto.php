<?php
if ($_SERVER == "POST") {
    $nombre   = strip_tags(trim($_POST ?? ""));
    $email    = filter_var(trim($_POST ?? ""), FILTER_SANITIZE_EMAIL);
    $telefono = strip_tags(trim($_POST ?? ""));
    $mensaje  = strip_tags(trim($_POST ?? ""));

    if (empty($nombre) || empty($email) || empty($mensaje) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor completa todos los campos correctamente.";
        exit;
    }

    $para = "tu_correo@gmail.com";   // ← CAMBIA ESTO por tu correo real
    $asunto = "Nuevo mensaje de $nombre";

    $cuerpo = "Nombre: $nombre\n";
    $cuerpo .= "Correo: $email\n";
    $cuerpo .= "Teléfono: $telefono\n\n";
    $cuerpo .= "Mensaje:\n$mensaje";

    $headers = "From: $email\r\nReply-To: $email";

    if (mail($para, $asunto, $cuerpo, $headers)) {
        header("Location: contact.html?enviado=1&nombre=" . urlencode($nombre));
        exit;
    } else {
        echo "Error al enviar el mensaje. Inténtalo más tarde.";
    }
}
?>