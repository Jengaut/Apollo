<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


if (isset($_POST['submit'])) {
    if (!empty($_POST['honeypot'])) {
        die('Spam détecté');
    }

    $email = $_POST['email'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];
    $submit = $_POST['submit'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com'; // Remplacez par le nom de votre serveur SMTP
        $mail->SMTPAuth   = true;
        $mail->Username   = 'votre_email@example.com'; // Remplacez par votre adresse e-mail
        $mail->Password   = 'votre_mot_de_passe'; // Remplacez par votre mot de passe SMTP
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465; // Le port SMTP sécurisé


        $mail->setFrom($email, 'Nom de l\'expéditeur');
        $mail->addAddress('destinataire@example.com', 'Nom du destinataire');


        $mail->isHTML(true);
        $mail->Subject = $sujet;
        $mail->Body    = $message;


        $mail->send($submit);
        header("location:index.html#contact?success=1");
    } catch (Exception $e) {
        echo "Le message n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
    }
}

?>