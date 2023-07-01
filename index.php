<?php

require __DIR__ . '/App/autoload.php';
session_start();

$_SESSION['token'] = md5(uniqid(mt_rand(), true));

$ctrl = new App\Controllers\Index();
$ctrl->action();