<?php

require __DIR__ . '/../autoload.php';
session_start();

$form = new \App\Models\Form();
$result = $form->validation($_POST);

if ($_POST['token'] !== $_SESSION['token']) {
    // return 405 http status code
    header($_SERVER['SERVER_PROTOCOL'] . ' 405 Method Not Allowed');
    exit;
} else {
    if ($result) {
        $form->setContent($result);
        $form->insert();

        $_SESSION['id'] = $form->getId();

        $mailer = new \App\Service\Mailer();
        $mailer->sendMail($form->getContent());
        $mailer->sendSMS($form->getContent());
    }
    header('Location: /');
}




