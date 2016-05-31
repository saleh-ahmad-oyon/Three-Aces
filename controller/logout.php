<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/18/2016
 * Time: 12:51 PM
 */

require 'define.php';

session_start();
session_unset();
session_destroy();

header('Location: '.SERVER.'/admin');
