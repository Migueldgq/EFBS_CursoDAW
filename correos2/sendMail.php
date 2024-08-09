<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // Incluye PHPMailer

function sendMail($destino, $asunto, $mensaje)
{
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp-relay.brevo.com';  // Servidor SMTP de Brevo
        $mail->SMTPAuth = true;
        $mail->Username = 'migueldariogq.mdg@gmail.com';  // Tu email de Brevo
        $mail->Password = 'aQmLHqCUj0FPG7Xd';  // La clave SMTP que obtuviste de Brevo
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del remitente y destinatario
        $mail->setFrom('migueldariogq.mdg@gmail.com', 'Administración ACM.EF');
        $mail->addAddress($destino);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;

        $mail->send();
        echo 'El mensaje ha sido enviado';
    } catch (Exception $e) {
        echo "El mensaje no pudo ser enviado. Error de Mailer: {$mail->ErrorInfo}";
    }
}
