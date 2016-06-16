<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Required Files */
require 'define.php';

/** Session */
session_start();
session_unset();
session_destroy();

/** Cookie */
if (isset($_SERVER['HTTP_COOKIE']))
{
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach ($cookies as $cookie)
    {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time() - 1000);
        setcookie($name, '', time() - 1000, '/');
    }
}

/** Redirect to admin login page */
header('Location: '.SERVER.'/admin');
