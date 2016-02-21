<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/14/2016
 * Time: 3:03 PM
 */

session_start();
error_reporting(0);

function get_cart_total(){
    $total = 0.0;
    foreach($_SESSION['cart'] as $key => $cart){
        $total += (float)substr($cart['price'], strpos($cart['price'], "$")+1);
    }
    return $total;
}

if(isset($_POST['posttype'])){
    if($_POST['posttype'] == 'item'){
        $data['id'] = $_POST['id'];
        $data['name'] = $_POST['name'];
        $data['type'] = $_POST['type'];
        $data['price'] = $_POST['price'];
        $_SESSION['cart'][] = $data;
        echo true;
    }
    elseif ($_POST['posttype'] == 'item-small') {
        $data['id'] = $_POST['id'];
        $data['name'] = $_POST['name'];
        $data['type'] = $_POST['type'];
        $data['price'] = $_POST['price'];
        $data['size'] = 'small';
        $_SESSION['cart'][] = $data;
        echo true;
    }
    elseif ($_POST['posttype'] == 'item-large') {
        $data['id'] = $_POST['id'];
        $data['name'] = $_POST['name'];
        $data['type'] = $_POST['type'];
        $data['price'] = $_POST['price'];
        $data['size'] = 'large';
        $_SESSION['cart'][] = $data;
        echo true;
    }
    elseif ($_POST['posttype'] == 'item-delete') {
        foreach($_SESSION['cart'] as $key => $cart){
            if($key == $_POST['id']) unset($_SESSION['cart'][$key]);
            echo true;
        }
    }
    elseif ($_POST['posttype'] == 'checkout') {
        if(count($_SESSION['cart']) > 0){
            $PhoneNumber = $_POST['contact'];
            $orders =array();
            foreach($_SESSION['cart'] as $key => $cart){
                $orders[] = $cart['type']." - ". $cart['name']. '|'.$cart['size'].'|'.$cart['price'];
            }
            $total = get_cart_total();
            $allOrders = implode(';', $orders);
            require_once '../model/db.php';
            addOrder($allOrders, $total, $PhoneNumber);
            unset($_SESSION['cart']);
            echo true;
        }
        else
            echo false;
    }
    echo false;
}

?>