<?php

$token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 4);

if (isset($_POST['tokenSubmit'])) {
    $token = strtolower($_POST['token']);

    if (stripos($token, $token) !== false) {
        header('Location: '.SERVER.'/admin/resetpassword');
    }
}