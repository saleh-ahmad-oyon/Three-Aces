<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

require 'define.php';

session_start();
session_unset();
session_destroy();

header('Location: '.SERVER.'/admin');
