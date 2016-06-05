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

/** Redirect to admin login page */
header('Location: '.SERVER.'/admin');
