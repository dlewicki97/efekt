<?php
defined('BASEPATH') or exit('No direct script access allowed');

function sendConfirmation(array $data): void
{
    require 'application/libraries/mailer/config.php';

    $CI = &get_instance();
    $CI->load->helper('mails/custom_mail_body');
    $contact = $CI->back_m->get_one('contact_settings', 1);

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = $cfg['smtp_host'];
    $mail->SMTPAuth = true;
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Username = $cfg['smtp_user'];
    $mail->Password = $cfg['smtp_pass'];
    $mail->Port = $cfg['smtp_port'];
    $mail->setFrom($cfg['smtp_user'], $contact->company .  ' - potwierdzenie wysłania wiadomości');
    $mail->AddBCC($data['email']);
    foreach (array_reduce(json_decode($data['attachments'], true), function ($t, $i) {
        foreach ($i as $name) $t[] = $name;
        return $t;
    }, []) as $attachment) {
        $mail->addAttachment('mailer/attachment/' . $attachment);
    }

    if (!empty($_POST['email'])) {
        $mail->addReplyTo($_POST['email']);
    }
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $contact->company .  ' - potwierdzenie wysłania wiadomości';
    $body = customMailBody($data, 'Potwierdzene aplikacji');
    $mail->Body    = $body;
    if (!$mail->send()) {
        $CI->logs->save(['message' => $mail->ErrorInfo]);
    } else {
        $CI->logs->save(['message' => 'Pomyślnie wysłałano potwierdzenie!']);
    }
}
