<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mailer extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('verify');
        $this->load->helper('mails/send_confirmation');
        $this->load->helper('mails/custom_mail_body');


        // $response = verifyCaptcha($_POST['token']);
        // if (!$response->success) {
        //     $this->logs->save(['message' => json_encode($response)]);
        //     $this->session->set_flashdata('error', 'Ochrona antyspamowa!');
        //     redirect($_SERVER['HTTP_REFERER']);
        // }
    }

    public function send()
    {

        $now = date('Y-m-d');
        if (!is_dir('mailer/attachment/' . $now)) {
            mkdir('./mailer/attachment/' . $now, 0777, TRUE);
        }
        $config['upload_path'] = './mailer/attachment/' . $now;
        $config['allowed_types'] = '*';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $attachments = [];


        $files = $_FILES;

        foreach ($files as $fileName => $info) {
            $attachments[$fileName] = [];
            if (is_array($info['name'])) {
                foreach ($info['name'] as $i => $name) {
                    $currentFileIndex = "$fileName-$name";
                    $_FILES[$currentFileIndex] = [
                        'name' => $name,
                        'type' => $info['type'][$i],
                        'tmp_name' => $info['tmp_name'][$i],
                        'error' => $info['error'][$i],
                        'size' => $info['size'][$i],
                    ];

                    if ($this->upload->do_upload($currentFileIndex)) {
                        $data = $this->upload->data();
                        $attachments[$fileName][] = $now . '/' . $data['file_name'];
                    }
                }
            } else {
                if ($this->upload->do_upload($fileName)) {
                    $data = $this->upload->data();
                    $attachments[$fileName][] = $now . '/' . $data['file_name'];
                }
            }
        }
        $insert['fields'] = [];

        foreach ($_POST as $key => $value) {
            if (in_array($key, ['token'])) continue;
            $insert['fields'][$key] = $value;
        }



        $insert['attachments'] = json_encode($attachments);
        $insert['fields'] = json_encode($insert['fields']);

        $data['contact'] = $this->back_m->get_one('contact_settings', 1);



        $insert['name'] = "{$_POST['first_name']} {$_POST['last_name']}";
        $insert['rodo1'] = '1';
        $insert['rodo2'] = '1';

        $insert['email'] = $_POST['email'] ?? "-";
        $insert['message'] = $_POST['message'] ?? "-";
        $insert['phone'] = $_POST['phone'] ?? "-";
        $insert['subject'] = $_POST['subject'] ?? "-";



        $this->back_m->insert('mails', $insert);
        $insert['rodo2'] = 'Zaakceptowane';
        $insert['rodo1'] = 'Zaakceptowane';

        require 'application/libraries/mailer/config.php';
        require 'application/libraries/mailer/functions.php';
        require 'application/libraries/mailer/PHPMailerAutoload.php';

        $insert['base_url'] = base_url();
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
        $mail->setFrom($cfg['smtp_user'], $data['contact']->company .  ' - formularz kontaktowy');
        // $mail->AddBCC('d.lewicki@adawards.pl');
        $mail->AddBCC($data['contact']->email1);
        foreach (array_reduce($attachments, function ($t, $i) {
            foreach ($i as $name) $t[] = $name;
            return $t;
        }, []) as $attachment) {
            $mail->addAttachment('mailer/attachment/' . $attachment);
        }

        if (!empty($insert['email'])) {
            $mail->addReplyTo($insert['email']);
        }
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = $data['contact']->company .  ' - formularz kontaktowy';
        $body = customMailBody($insert, 'Nowe zapytanie ze strony');
        $mail->Body    = $body;
        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            exit;
            $this->logs->save(['message' => $mail->ErrorInfo]);
            $this->session->set_flashdata('error', 'Coś poszło nie tak, przepraszamy za utrudnienia!');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $this->logs->save(['message' => 'Pomyślnie wysłałeś formularz!']);
            $this->session->set_flashdata('success', 'Pomyślnie wysłałeś formularz!');
            sendConfirmation($insert);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
