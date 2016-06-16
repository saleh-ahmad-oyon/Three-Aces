<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Session Starts */
session_start();

/** Set Error Reporing 0 */
error_reporting(0);

/**
 * Total Amount
 *
 * Calculate the total amount of bill
 *
 * @return float $total     Total Bill
 */
function get_cart_total()
{
    $total = 0.0;
    foreach ($_SESSION['cart'] as $key => $cart) {
        $total += (float)substr($cart['price'], strpos($cart['price'], "$")+1);
    }
    return $total;
}

/**
 * @param $user_agent     $_SERVER['HTTP_USER_AGENT']
 * 
 * Calculate Browser Name using Browser Information
 * 
 * @return string     Return Browser Name
 */
function get_browser_name($user_agent)
{
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';

    return 'Other';
}

if (isset($_POST['posttype'])) {
    if ($_POST['posttype'] == 'item') {
        /**
         * @var associative array   $data['id']        Item ID
         * @var associative array   $data['name']      Item Name
         * @var associative array   $data['type']      Item Type
         * @var associative array   $data['price']     Item Price
         */
        $data['id']         = $_POST['id'];
        $data['name']       = $_POST['name'];
        $data['type']       = $_POST['type'];
        $data['price']      = $_POST['price'];

        /** Two dimensional Session Array */
        $_SESSION['cart'][] = $data;
        echo true;
    } elseif ($_POST['posttype'] == 'item-small') {
        /**
         * @var associative array   $data['id']        Item ID
         * @var associative array   $data['name']      Item Name
         * @var associative array   $data['type']      Item Type
         * @var associative array   $data['price']     Item Price
         * @var associative array   $data['size']      Item Size
         */
        $data['id']         = $_POST['id'];
        $data['name']       = $_POST['name'];
        $data['type']       = $_POST['type'];
        $data['price']      = $_POST['price'];
        $data['size']       = 'small';

        /** Two dimensional Session Array */
        $_SESSION['cart'][] = $data;

        echo true;
    } elseif ($_POST['posttype'] == 'item-large') {
        /**
         * @var associative array   $data['id']        Item ID
         * @var associative array   $data['name']      Item Name
         * @var associative array   $data['type']      Item Type
         * @var associative array   $data['price']     Item Price
         * @var associative array   $data['size']      Item Size
         */
        $data['id']         = $_POST['id'];
        $data['name']       = $_POST['name'];
        $data['type']       = $_POST['type'];
        $data['price']      = $_POST['price'];
        $data['size']       = 'large';

        /** Two dimensional Session Array */
        $_SESSION['cart'][] = $data;

        echo true;
    } elseif ($_POST['posttype'] == 'item-delete') {
        foreach($_SESSION['cart'] as $key => $cart){
            if ($key == $_POST['id']) {
                unset($_SESSION['cart'][$key]);
            }
            echo true;
        }
    } elseif ($_POST['posttype'] == 'checkout') {
        if (count($_SESSION['cart']) > 0) {
            $PhoneNumber = $_POST['contact'];
            $orders =array();
            foreach ($_SESSION['cart'] as $key => $cart) {
                $orders[] = $cart['type']." - ". $cart['name']. '|'.$cart['size'].'|'.$cart['price'];
            }
            $total     = get_cart_total();
            $allOrders = implode(';', $orders);
            require_once '../model/db.php';
            $ip = $_SERVER['REMOTE_ADDR'];
            $browser = get_browser_name($_SERVER['HTTP_USER_AGENT']).': '.$_SERVER['HTTP_USER_AGENT'];
            addOrder($allOrders, $total, $PhoneNumber, $ip, $browser);
            unset($_SESSION['cart']);
            echo true;
        } else
            echo false;
    }
    echo false;
}
