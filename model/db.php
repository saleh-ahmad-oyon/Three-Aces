<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

/** Required File */
require_once 'db_connection.php';

function calzone()
{
    $conn        = db_conn();
    $selectQuery = 'SELECT * FROM `calzone`';

    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $row;
}
function getAdminInfo($user){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `admin` WHERE `id` = ?';
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($user));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
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
function findSpeghettiRow($key){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `spaghetti` WHERE `spaghetti_id` = ?';
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
function findWrapRow($key){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `wraps` WHERE `wraps_id` = ?';
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
function findSpDinnerRow($key){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `special_dinner` WHERE `sp_din_id` = ?';
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
function findGrinderRow($key){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `grinder` WHERE `grinder_id` = ?';
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
function findPizzaRow($key){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `pizza` WHERE `pizza_id` = ?';
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
function findSaladRow($key){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `salad` WHERE `salad_id` = ?';
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
function findSideOrderRow($key){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `side_orders` WHERE `so_id` = ?';
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
function findSpPizzaRow($key){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `special_pizza` WHERE `sp_pizza_id` = ?';
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
function checkOldPass($old){
    $conn = db_conn();
    $selectQuery = 'SELECT COUNT(1) AS `num` FROM `admin` WHERE `password` = ?';
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($old));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($row['num'] == 1) ? true : false ;
}
function checkUser($username){
    $conn = db_conn();
    $selectQuery = 'SELECT COUNT(1) as `num` FROM `admin` WHERE `username` = ?';
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($username));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($row['num'] == 1 ) ? false : true ;
}
function checkEmail($email){
    $conn = db_conn();
    $selectQuery = 'SELECT COUNT(1) as `num` FROM `admin` WHERE `email` = ?';
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($email));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($row['num'] == 0) ? true : false ;
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
function getUserNameEmail($key){
    $conn = db_conn();
    $selectQuery = 'SELECT `username`, `email` FROM `admin` WHERE `id` = ?';
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}
function getUserId($user){
    $conn = db_conn();
    $selectQuery = 'SELECT `id` FROM `admin` WHERE `username` = ?';
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($user));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $name = $row['id'];
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
function getCountryName(){
    $conn = db_conn();
    $selectQuery = 'SELECT `c_name` FROM `country`';
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
function insertSpaghetti($name, $cost){
    $conn = db_conn();
    $selectQuery = "INSERT INTO `spaghetti`(`spaghetti_name`, `spaghetti_price`) VALUES (:title, :cost)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':cost' => $cost));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function insertWrap($name, $cost){
    $conn = db_conn();
    $selectQuery = "INSERT INTO `wraps`(`wraps_name`, `wraps_price`) VALUES (:title, :cost)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':cost' => $cost));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function insertSpDinner($name, $cost){
    $conn = db_conn();
    $selectQuery = "INSERT INTO `special_dinner`(`sp_din_name`, `sp_din_price`) VALUES (:title, :cost)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':cost' => $cost));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function insertGrinder($name, $costSmall, $costLarge){
    $conn = db_conn();
    $selectQuery = "INSERT INTO `grinder`(`grinder_name`, `grinder_small_price`, `grinder_large_price`) VALUES (:title,:smallcost,:largecost)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':smallcost' => $costSmall, ':largecost' => $costLarge));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function insertPizza($name, $costSmall, $costLarge){
    $conn = db_conn();
    $selectQuery = "INSERT INTO `pizza`(`pizza_name`, `pizza_small_price`, `pizza_large_price`) VALUES (:title,:smallcost,:largecost)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':smallcost' => $costSmall, ':largecost' => $costLarge));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function insertSalad($name, $costSmall, $costLarge){
    $conn = db_conn();
    $selectQuery = "INSERT INTO `salad`(`salad_name`, `salad_small_price`, `salad_large_price`) VALUES (:title,:smallcost,:largecost)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':smallcost' => $costSmall, ':largecost' => $costLarge));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function insertSideOrder($name, $costSmall, $costLarge){
    $conn = db_conn();
    $selectQuery = "INSERT INTO `side_orders`(`so_name`, `so_small_price`, `so_large_price`) VALUES (:title,:smallcost,:largecost)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':smallcost' => $costSmall, ':largecost' => $costLarge));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function insertSpPizza($name, $costSmall, $costLarge){
    $conn = db_conn();
    $selectQuery = "INSERT INTO `special_pizza`(`sp_pizza_name`, `sp_pizza_small_price`, `sp_pizza_large_price`) VALUES (:title,:smallcost,:largecost)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':smallcost' => $costSmall, ':largecost' => $costLarge));
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
function updateProfile($name, $username, $email, $country, $key){
    $conn = db_conn();
    $selectQuery = "UPDATE `admin` SET `username`=:user, `name`=:name,`email`=:email,`country`=:country WHERE `id` = :id";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':user' => $username, ':name' => $name, ':email' => $email, 'country' => $country, ':id' => $key));
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
function editSpaghetti($name, $cost, $key){
    $conn = db_conn();
    $selectQuery = "UPDATE `spaghetti` SET `spaghetti_name`=:title,`spaghetti_price`=:cost WHERE `spaghetti_id` = :key";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':cost' => $cost, ':key' => $key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function editWrap($name, $cost, $key){
    $conn = db_conn();
    $selectQuery = "UPDATE `wraps` SET `wraps_name`=:title,`wraps_price`=:cost WHERE `wraps_id` = :key";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':cost' => $cost, ':key' => $key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function editSpDinner($name, $cost, $key){
    $conn = db_conn();
    $selectQuery = "UPDATE `special_dinner` SET `sp_din_name`=:title,`sp_din_price`=:cost WHERE `sp_din_id` = :key";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':cost' => $cost, ':key' => $key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function editGrinder($name, $costSmall, $costLarge, $key){
    $conn = db_conn();
    $selectQuery = "UPDATE `grinder` SET `grinder_name`= :title,`grinder_small_price`=:smallcost,`grinder_large_price`=:largecost WHERE `grinder_id` = :key";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':smallcost' => $costSmall, ':largecost' => $costLarge, ':key' => $key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function editPizza($name, $costSmall, $costLarge, $key){
    $conn = db_conn();
    $selectQuery = "UPDATE `pizza` SET `pizza_name`= :title,`pizza_small_price`=:smallcost,`pizza_large_price`=:largecost WHERE `pizza_id` = :key";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':smallcost' => $costSmall, ':largecost' => $costLarge, ':key' => $key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function editSalad($name, $costSmall, $costLarge, $key){
    $conn = db_conn();
    $selectQuery = "UPDATE `salad` SET `salad_name`= :title,`salad_small_price`=:smallcost,`salad_large_price`=:largecost WHERE `salad_id` = :key";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':smallcost' => $costSmall, ':largecost' => $costLarge, ':key' => $key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function editSideOrder($name, $costSmall, $costLarge, $key){
    $conn = db_conn();
    $selectQuery = "UPDATE `side_orders` SET `so_name`= :title,`so_small_price`=:smallcost,`so_large_price`=:largecost WHERE `so_id` = :key";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':smallcost' => $costSmall, ':largecost' => $costLarge, ':key' => $key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function editSpPizza($name, $costSmall, $costLarge, $key){
    $conn = db_conn();
    $selectQuery = "UPDATE `special_pizza` SET `sp_pizza_name`= :title,`sp_pizza_small_price`=:smallcost,`sp_pizza_large_price`=:largecost WHERE `sp_pizza_id` = :key";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':title' => $name, ':smallcost' => $costSmall, ':largecost' => $costLarge, ':key' => $key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function updatePass($key, $new){
    $conn = db_conn();
    $selectQuery = "UPDATE `admin` SET `password`= :pass WHERE `id` = :key";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array(':pass' => $new, ':key' => $key));
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
function deleteSpaghettiRow($key){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `spaghetti` WHERE `spaghetti_id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function deleteWrapRow($key){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `wraps` WHERE `wraps_id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function deleteSpDinnerRow($key){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `special_dinner` WHERE `sp_din_id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function deleteGrinderRow($key){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `grinder` WHERE `grinder_id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function deletePizzaRow($key){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `pizza` WHERE `pizza_id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function deleteSaladRow($key){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `salad` WHERE `salad_id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function deleteSideOrderRow($key){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `side_orders` WHERE `so_id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
function deleteSpPizzaRow($key){
    $conn = db_conn();
    $selectQuery = "DELETE FROM `special_pizza` WHERE `sp_pizza_id` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute(array($key));
    }catch(PDOException $e){
        handle_sql_errors($selectQuery, $e->getMessage());
    }
    $conn = null;
}
