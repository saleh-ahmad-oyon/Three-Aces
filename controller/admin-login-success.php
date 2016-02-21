<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/18/2016
 * Time: 12:05 PM
 */

require_once 'define.php';
require_once '../model/db.php';
session_start();
if(isset($_POST['loginSubmit'])){
    $user= $_POST['username'];
    $pass = $_POST['password'];
    if($user =='' || $pass ==''){
        header('Location: '.SERVER.'/admin?err=1');
    }
    else{
        if(checkPass($user, $pass)){
            $_SESSION['user'] = $user;
            $_SESSION['name'] = getUserName($user);
            header('Location: '.SERVER.'/admin');
        }else{
            header('Location: '.SERVER.'/admin?err=2');
        }
    }
}