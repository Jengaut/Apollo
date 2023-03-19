<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Charge la librairie PHPMailer

// Vérifie si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Vérifie le champ anti-spam honeypot
    if (!empty($_POST['honeypot'])) {
        die('Spam détecté');
    }

    // Récupère les données du formulaire
    $email = $_POST['email'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];

    // Initialise une nouvelle instance de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com'; // Remplacez par le nom de votre serveur SMTP
        $mail->SMTPAuth   = true;
        $mail->Username   = 'votre_email@example.com'; // Remplacez par votre adresse e-mail
        $mail->Password   = 'votre_mot_de_passe'; // Remplacez par votre mot de passe SMTP
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465; // Le port SMTP sécurisé

        // Destinataire et expéditeur du message
        $mail->setFrom($email, 'Nom de l\'expéditeur');
        $mail->addAddress('destinataire@example.com', 'Nom du destinataire');

        // Contenu du message
        $mail->isHTML(true);
        $mail->Subject = $sujet;
        $mail->Body    = $message;

        // Envoi du message
        $mail->send();
        echo 'Le message a été envoyé avec succès';
    } catch (Exception $e) {
        echo "Le message n'a pas pu être envoyé. Erreur : {$mail->ErrorInfo}";
    }
}

?>