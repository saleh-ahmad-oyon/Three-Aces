<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/14/2016
 * Time: 7:30 PM
 */
require_once 'db_connection.php';

function calzone(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `calzone`';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}
function findCalzoneRow($key){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `calzone` WHERE `id` = ?';
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
function findLasagnaRow($key){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `lasagna` WHERE `lasagna_id` = ?';
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
function grinders(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `grinder`';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}
function lasagna(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `lasagna`';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}
function pizza(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `pizza`';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}
function salad(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `salad`';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}
function sideOrders(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `side_orders`';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}
function spaghetti(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `spaghetti`';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}
function wraps(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `wraps`';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}
function specialDinner(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `special_dinner`';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}
function specialPizza(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `special_pizza`';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}
function checkPass($user, $pass){
    $conn = db_conn();
    $selectQuery = 'SELECT COUNT(1) as `num` FROM `admin` WHERE `username` = :user AND `password` = :pass';
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':user' => $user, ':pass' => $pass));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($row['num'] == 1) ? true : false ;
}
function getUserName($user){
    $conn = db_conn();
    $selectQuery = 'SELECT `name` FROM `admin` WHERE `username` = ?';
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($user));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $name = $row['name'];
    return $name;
}
function addOrder($orders, $total, $PhoneNumber){
    $conn = db_conn();
    $selectQuery = "INSERT INTO `orders`(`o_description`, `o_total`, `o_contact`) VALUES (:orders, :total, :contact)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':orders' => $orders, ':total' => $total, ':contact' => $PhoneNumber));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function totalOrders(){
    $conn = db_conn();
    $selectQuery = 'SELECT COUNT(1) as `num` FROM `orders`';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $total = $row['num'];
    return $total ;
}
function todayOrders(){
    $conn = db_conn();
    $selectQuery = 'SELECT COUNT(1) as `num` FROM `orders` WHERE DATE(`o_datetime`) = DATE(NOW())';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $total = $row['num'];
    return $total ;
}
function allOrdersInfo(){
    $conn = db_conn();
    $selectQuery = 'SELECT `o_id`, `o_datetime`, `o_total`, `o_contact` FROM `orders` ORDER BY `o_datetime` DESC ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row ;
}
function todayOrdersInfo(){
    $conn = db_conn();
    $selectQuery = 'SELECT `o_id`, `o_datetime`, `o_total`, `o_contact` FROM `orders` WHERE DATE(`o_datetime`) = DATE(NOW()) ORDER BY `o_datetime` DESC ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $row ;
}
function allInfo($key){
    $conn = db_conn();
    $selectQuery = 'SELECT `o_description`, `o_datetime`, `o_total`, `o_contact` FROM `orders` WHERE `o_id` = ?';
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row ;
}
function insertCalzone($name, $cost){
    $conn = db_conn();
    $selectQuery = "INSERT INTO `calzone`(`name`, `price`) VALUES (:title, :cost)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':cost' => $cost));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function insertLasagna($name, $cost){
    $conn = db_conn();
    $selectQuery = "INSERT INTO `lasagna`(`lasagna_name`, `lasagna_price`) VALUES (:title, :cost)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':cost' => $cost));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function editCalzone($name, $cost, $key){
    $conn = db_conn();
    $selectQuery = "UPDATE `calzone` SET `name`=:title,`price`=:cost WHERE `id` = :key";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':cost' => $cost, ':key' => $key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function editLasagna($name, $cost, $key){
    $conn = db_conn();
    $selectQuery = "UPDATE `lasagna` SET `lasagna_name`=:title,`lasagna_price`=:cost WHERE `lasagna_id` = :key";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':cost' => $cost, ':key' => $key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function deleteCalzoneRow($key){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `calzone` WHERE `id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function deleteLasagnaRow($key){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `lasagna` WHERE `lasagna_id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}