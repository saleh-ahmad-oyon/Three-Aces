<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Required File */
require_once '../../model/db.php';

/**
 * Fetch Calzones
 *
 * Fetch all the information of Calzones from the model
 *
 * @return array $row     Information of Calzones
 */
function getCalzones()
{
    $row = calzone();
    return $row;
}

/**
 * Fetch Grinders
 *
 * Fetch all the information of Grinders from the model
 *
 * @return array $row     Information of Grinders
 */
function getGrinders()
{
    $row = grinders();
    return $row;
}

/**
 * Fetch Lasagnas
 *
 * Fetch all the information of Lasagnas from the model
 *
 * @return array $row     Information of Lasagnas
 */
function getLasagna()
{
    $row = lasagna();
    return $row;
}

/**
 * Fetch Pizzas
 *
 * Fetch all the information of Pizzas from the model
 *
 * @return array $row     Information of Pizzas
 */
function getPizza()
{
    $row = pizza();
    return $row;
}

/**
 * Fetch Salads
 *
 * Fetch all the information of Salads from the model
 *
 * @return array $row     Information of Salads
 */
function getSalad()
{
    $row = salad();
    return $row;
}

/**
 * Fetch Side Orders
 *
 * Fetch all the information of Side Orders from the model
 *
 * @return array $row     Information of Side Orders
 */
function getSideOrders()
{
    $row = sideOrders();
    return $row;
}

/**
 * Fetch Spaghettis
 *
 * Fetch all the information of Spaghettis from the model
 *
 * @return array $row     Information of Spaghettis
 */
function getspaghetti()
{
    $row = spaghetti();
    return $row;
}

/**
 * Fetch Wraps
 *
 * Fetch all the information of Wraps from the model
 *
 * @return array $row     Information of Wraps
 */
function getwraps()
{
    $row = wraps();
    return $row;
}

/**
 * Fetch Special Dinners
 *
 * Fetch all the information of Special Dinners from the model
 *
 * @return array $row     Information of Special Dinners
 */
function getSpecialDinner()
{
    $row = specialDinner();
    return $row;
}

/**
 * Fetch Special Pizzas
 *
 * Fetch all the information of Special Pizzas from the model
 *
 * @return array $row     Information of Special Pizzas
 */
function getSpecialPizza()
{
    $row = specialPizza();
    return $row;
}
