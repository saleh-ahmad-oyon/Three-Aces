<?php

/** Required Files */
require_once '../model/db.php';

if (isset($_POST['day']) && $_POST['day'] == 'today') {
    $num= todayOrders();
    echo $num;
} elseif (isset($_POST['day']) && $_POST['day'] == 'all') {
    $num = totalOrders();
    echo $num;
} elseif (isset($_POST['orderKey'])) {
    $key = $_POST['orderKey'];
    $row = allInfo($key);
    echo json_encode($row);
} elseif (isset($_POST['oldpa'])) {
    $old = $_POST['oldpa'];
    $new = $_POST['newpa'];
    $confirm = $_POST['confirmpa'];
    $key = $_POST['key'];

    if (checkOldPass($old)) {
        if ($new == $confirm) {
            updatePass($key, $new);
            echo 'Password Successfully Updated';
        } else {
            echo "New password and Confirm Password didn't match !!";
        }
    } else {
        echo "Old Password didn't match";
    }
} elseif (isset($_POST['editKey'])) {
    $key      = $_POST['editKey'];
    $name     = $_POST['editName'];
    $username = $_POST['editUsername'];
    $email    = $_POST['editEmail'];
    $country  = $_POST['editCountry'];

    $row = getUserNameEmail($key);

    if ($row['username'] != $username){
        if (checkUser($username)) {
            if ($row['email'] != $email) {
                if (checkEmail($email)) {
                    updateProfile($name, $username, $email, $country, $key);
                    echo 't';
                } else {
                    echo 'Email Must be Unique';
                }
            } else {
                updateProfile($name, $username, $email, $country, $key);
                echo 't';
            }
        } else {
            echo 'Username Must be Unique';
        }
    } elseif ($row['email'] != $email) {
        if (checkEmail($email)) {
            updateProfile($name, $username, $email, $country, $key);
            echo 't';
        } else {
            echo 'Email Must be Unique';
        }
    } else {
        updateProfile($name, $username, $email, $country, $key);
        echo 't';
    }
}

/**
 * All Orders' Information
 *
 * Fetch all the Orders' information from the Model
 *
 * @return array Returns the information of all Orders
 */
function getAllOrdersInfo()
{
    $row = allOrdersInfo();
    return $row;
}

/**
 * Today's Orders' Information
 *
 * Fetch all the Orders' information of today from the Model
 *
 * @return array Returns the information of Today's all Orders
 */
function getTodayOrdersInfo()
{
    $row = todayOrdersInfo();
    return $row;
}

/**
 * Admin Information
 *
 * Fetch all the information of the admin from Model using his id
 *
 * @param $id    Admin ID
 *
 * @return array   Returns all informations of the admin
 */
function admininfo($id)
{
    $row = getAdminInfo($id);
    return $row;
}

/**
 * All Countries
 *
 * Fetch all Countries' Name of the world from Model
 *
 * @return array   Returns all Countries' Name
 */
function getCountries()
{
    $row = getCountryName();
    return $row;
}
