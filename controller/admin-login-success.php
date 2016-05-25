<?php

/** Required Files */
require_once 'define.php';
require_once '../model/db.php';

/** Session Starts */
session_start();

if (isset($_POST['loginSubmit'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user == '' || $pass == '') {
        header('Location: '.SERVER.'/admin?err=1');
    } else {
        if (checkPass($user, $pass)) {
            $_SESSION['user'] = $user;
            $_SESSION['name'] = getUserName($user);
            $_SESSION['id']   = getUserId($user);
            header('Location: '.SERVER.'/admin');
        } else {
            header('Location: '.SERVER.'/admin?err=2');
        }
    }
}
