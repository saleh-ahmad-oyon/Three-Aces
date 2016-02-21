<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/14/2016
 * Time: 9:02 PM
 */
require_once 'model/db.php';

function getCalzones(){
    $row = calzone();
    return $row;
}
function getGrinders(){
    $row = grinders();
    return $row;
}
function getLasagna(){
    $row = lasagna();
    return $row;
}
function getPizza(){
    $row = pizza();
    return $row;
}
function getSalad(){
    $row = salad();
    return $row;
}
function getSideOrders(){
    $row = sideOrders();
    return $row;
}
function getspaghetti(){
    $row = spaghetti();
    return $row;
}
function getwraps(){
    $row = wraps();
    return $row;
}
function getSpecialDinner(){
    $row = specialDinner();
    return $row;
}
function getSpecialPizza(){
    $row = specialPizza();
    return $row;
}
?>