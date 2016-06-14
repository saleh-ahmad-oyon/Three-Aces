<?php

require_once '../model/db.php';

/**
 * All Countries
 *
 * Fetch all Countries' Name of the world from Model
 *
 * @return array     Returns all Countries' Name
 */

$row = array();
$row = getCountryName();
echo json_encode($row);
