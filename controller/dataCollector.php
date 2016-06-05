<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Required Files */
require_once 'model/db.php';

/**
 * All Calzones
 *
 * Fetch all the Calzones data from the Model
 *
 * @return array     Returns all the datas of calzones
 */
function getCalzones()
{
    $row = calzone();
    return $row;
}

/**
 * All Grinders
 *
 * Fetch all the Grinders data from the Model
 *
 * @return array     Returns all the datas of Grinders
 */
function getGrinders()
{
    $row = grinders();
    return $row;
}

/**
 * All Lasagna
 *
 * Fetch all the Lasagna data from the Model
 *
 * @return array     Returns all the datas of Lasagna
 */
function getLasagna()
{
    $row = lasagna();
    return $row;
}

/**
 * All Pizza
 *
 * Fetch all the Pizza data from the Model
 *
 * @return array     Returns all the datas of Pizza
 */
function getPizza()
{
    $row = pizza();
    return $row;
}

/**
 * All Salad
 *
 * Fetch all the Salad data from the Model
 *
 * @return array     Returns all the datas of Salad
 */
function getSalad()
{
    $row = salad();
    return $row;
}

/**
 * All Side Orders
 *
 * Fetch all the Side Orders data from the Model
 *
 * @return array     Returns all the datas of Side Orders
 */
function getSideOrders()
{
    $row = sideOrders();
    return $row;
}

/**
 * All Spaghetti
 *
 * Fetch all the Spaghetti data from the Model
 *
 * @return array     Returns all the datas of Spaghetti
 */
function getspaghetti()
{
    $row = spaghetti();
    return $row;
}

/**
 * All Wraps
 *
 * Fetch all the Wraps data from the Model
 *
 * @return array     Returns all the datas of Wraps
 */
function getwraps()
{
    $row = wraps();
    return $row;
}

/**
 * All SpecialDinner
 *
 * Fetch all the Special Dinner data from the Model
 *
 * @return array     Returns all the datas of SpecialDinner
 */
function getSpecialDinner()
{
    $row = specialDinner();
    return $row;
}

/**
 * All SpecialPizza
 *
 * Fetch all the Special Pizza data from the Model
 *
 * @return array     Returns all the datas of Special Pizza
 */
function getSpecialPizza()
{
    $row = specialPizza();
    return $row;
}
