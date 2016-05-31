<?php
/**
 * @author Saleh Ahmad
 * @author My Name <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Required Files */
require_once 'model/db.php';

function getCalzones()
{
    $row = calzone();
    return $row;
}

function getGrinders()
{
    $row = grinders();
    return $row;
}

function getLasagna()
{
    $row = lasagna();
    return $row;
}

function getPizza()
{
    $row = pizza();
    return $row;
}

function getSalad()
{
    $row = salad();
    return $row;
}

function getSideOrders()
{
    $row = sideOrders();
    return $row;
}

function getspaghetti()
{
    $row = spaghetti();
    return $row;
}

function getwraps()
{
    $row = wraps();
    return $row;
}

function getSpecialDinner()
{
    $row = specialDinner();
    return $row;
}

function getSpecialPizza()
{
    $row = specialPizza();
    return $row;
}
