<?php

require_once 'src/Exception.php';
require_once 'src/PHPMailer.php';
require_once 'src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function enviarEmail($destinatario, $assunto, $mensagemHTML) {
   
    $mail = new PHPMailer(true);
    // Server Config
    $mail->isSMTP();
    // Foogle infos
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'seuEmail'; // (gmail)
    $mail->Password = ''; //senha de app (app password) (google)
    $mail->Port = 587;

    // Defines sender
    $mail->setFrom('emailRemetente');
    // Defines recipient
    $mail->addAddress($destinatario);
    // Message Content
    $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
    $mail->Subject = $assunto;
    $mail->Body    = $mensagemHTML;

    // Send
    if($mail->send())
        return true;
    else
        return false;
}
?>