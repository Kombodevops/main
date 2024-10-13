<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "contacto@komvoapp.com";
    $subject = "Nuevo comentario de evento";
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $plan = htmlspecialchars($_POST["plan"]);
    
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    $message = "<html><body>";
    $message .= "<h2>Nuevo comentario de evento</h2>";
    $message .= "<p><strong>Correo de contacto:</strong> " . $email . "</p>";
    $message .= "<p><strong>Descripción del evento:</strong><br>" . nl2br($plan) . "</p>";
    $message .= "</body></html>";
    
    if (mail($to, $subject, $message, $headers)) {
        echo "Mensaje enviado correctamente.";
    } else {
        echo "Error al enviar el mensaje.";
    }
}
?>
