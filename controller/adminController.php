<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

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
    $row['o_description'] = json_decode($row['o_description']);

    echo json_encode($row);
} elseif (isset($_POST['oldpa'])) {
    /**
     * @var string $old         Admin's Old Password
     * @var string $new         Admin's New Password
     * @var string $confirm     Admin's Confirm New password
     * @var int $key            Admin's ID
     */
    $old     = $_POST['oldpa'];
    $new     = $_POST['newpa'];
    $confirm = $_POST['confirmpa'];
    $key     = $_POST['key'];

    /** Check the New Password with the Confirm New Password */
    if ($new != $confirm) {
        $resp['msg'] = "New password and Confirm Password didn't match !!";
        echo json_encode($resp);
        return;
    }

    /** Check Old Password */
    if (!checkOldPass($key, $old)) {
        $resp['msg'] = "Old Password didn't match";
        echo json_encode($resp);
        return;
    }

    /** Update Password */
    $new = password_hash(base64_encode(hash('sha256', $new, true)), PASSWORD_DEFAULT);
    updatePass($key, $new);
    $resp['msg'] = 'Password Successfully Updated';
    echo json_encode($resp);
} elseif (isset($_POST['editKey'])) {

    /**
     * @var int    $key          Admin's ID
     * @var string $name         Admin's Name
     * @var string $username     Admin's Username
     * @var string $email        Admin's Email
     * @var string $country      Admin's Country
     */
    $key      = $_POST['editKey'];
    $name     = $_POST['editName'];
    $username = $_POST['editUsername'];
    $email    = $_POST['editEmail'];
    $country  = $_POST['editCountry'];

    /** Check the username is unique or not */
    if (!checkUser($username, $key)) {
        $resp['msg'] = 'Username Must be Unique';
        echo json_encode($resp);
        return;
    }

    /** Check the email is already stored in the database or not */
    if (!checkEmail($email, $key)) {
        $resp['msg'] = 'Email Must be Unique';
        echo json_encode($resp);
        return;
    }

    updateProfile($name, $username, $email, $country, $key);
    
    $resp = getAdminInfo($key);
    $resp['msg'] = 'Successfully Updated !!';
    echo json_encode($resp);
} elseif (isset($_POST['adminMail'])) {
    $mail = $_POST['adminMail'];

    if (!checkValidEmail($mail)) {
         echo false;
         return;
    }

    echo true;
}

/**
 * All Orders' Information
 *
 * Fetch all the Orders' information from the Model
 *
 * @return array     Returns the information of all Orders
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
 * @return array     Returns the information of Today's all Orders
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
 * @return array     Returns all informations of the admin
 */
function admininfo($id)
{
    $row = getAdminInfo($id);
    return $row;
}
