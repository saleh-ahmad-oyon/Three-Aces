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
            $ip = UserInfo::getClientIp();
            $browser =  UserInfo::getBrowserName($_SERVER['HTTP_USER_AGENT']).': '.$_SERVER['HTTP_USER_AGENT'];
            addOrder($allOrders, $total, $PhoneNumber, $ip, $browser);
            unset($_SESSION['cart']);
            echo true;
        } else
            echo false;
    }
    echo false;
}
