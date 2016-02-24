<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/19/2016
 * Time: 12:58 PM
 */
require_once '../model/db.php';

if(isset($_POST['day']) && $_POST['day'] == 'today'){
    $num= todayOrders();
    echo $num;
}elseif(isset($_POST['day']) && $_POST['day'] == 'all'){
    $num = totalOrders();
    echo $num;
}elseif(isset($_POST['orderKey'])){
    $key = $_POST['orderKey'];
    $row = allInfo($key);
    echo json_encode($row);
}elseif(isset($_POST['oldpa'])){
    $old = $_POST['oldpa'];
    $new = $_POST['newpa'];
    $confirm = $_POST['confirmpa'];
    $key = $_POST['key'];
    if(checkOldPass($old)){
        if($new == $confirm){
            updatePass($key, $new);
            echo 'Password Successfully Updated';
        }else{
            echo "New password and Confirm Password didn't match !!";
        }
    }else{
        echo "Old Password didn't match";
    }
}
function getAllOrdersInfo(){
    $row = allOrdersInfo();
    return $row;
}
function getTodayOrdersInfo(){
    $row = todayOrdersInfo();
    return $row;
}
function admininfo($id){
    $row = getAdminInfo($id);
    return $row;
}
?>