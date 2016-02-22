<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/22/2016
 * Time: 3:10 PM
 */

require_once '../model/db.php';
$resp = array();

if(isset($_POST['calzoneName'])){
    $name = $_POST['calzoneName'];
    $cost = $_POST['calzoneCost'];
    if($_POST['calzoneAction'] == 'add'){
        insertCalzone($name, $cost);
    }else{
        $key = $_POST['calzoneAction'];
        editCalzone($name, $cost, $key);
    }
    echo json_encode($resp);
}elseif(isset($_POST['editKey'])){
    $key = $_POST['editKey'];
    $row = findCalzoneRow($key);
    $resp = $row;
    echo json_encode($resp);
}elseif(isset($_POST['deleteKey'])){
    $key = $_POST['deleteKey'];
    deleteCalzoneRow($key);
}