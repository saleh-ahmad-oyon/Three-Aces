<?php
/**
 * @author Saleh Ahmad <oyon@nooblonely.com>
 * @copyright 2015-2016 Noob Lonely
 */

require_once '../model/db.php';
$resp = array();

if (isset($_POST['calzoneName'])) {              /** Add or Edit Calzone Value */
    /** 
     * @var string $name     Calzone Name 
     * @var double $cost     Calzone Cost
     */
    $name = $_POST['calzoneName'];
    $cost = $_POST['calzoneCost'];

    /** Add or Edit Calzone Deatils */
    if ($_POST['calzoneAction'] == 'add') {
        insertCalzone($name, $cost);
    } else {
        $key = $_POST['calzoneAction'];
        editCalzone($name, $cost, $key);
    }
} elseif (isset($_POST['deleteKey'])) {          /** Delete the specific Calzone row using id */
    /** @var int $key     Calzone ID */
    $key = $_POST['deleteKey'];

    /** Call function for deleting the specific row */
    deleteCalzoneRow($key);
} elseif(isset($_POST['lasagnaName'])) {         /** Add or Edit Lasagna Value */
    /** 
     * @var string $name     Lasagna Name 
     * @var float  $cost     Lasagna Cost
     */
    $name = $_POST['lasagnaName'];
    $cost = $_POST['lasagnaCost'];

    /** Add or Edit Lasagna Details */
    if ($_POST['lasagnaAction'] == 'add') {
        insertLasagna($name, $cost);
    } else {
        $key = $_POST['lasagnaAction'];
        editLasagna($name, $cost, $key);
    }
} elseif (isset($_POST['deleteLasagnaKey'])) {     /** Delete the specific Lasagna row using id */
    /** @var int $key     Lasagna ID */
    $key = $_POST['deleteLasagnaKey'];

    /** Call function for deleting the specific row */
    deleteLasagnaRow($key);
}  elseif (isset($_POST['spaghettiName'])) {       /** Add or Edit Spaghetti Value */
    /**
     * @var string $name     Spaghetti Name
     * @var float  $cost     Spaghetti Cost
     */
    $name = $_POST['spaghettiName'];
    $cost = $_POST['spaghettiCost'];

    /** Add or Edit Spaghetti Details */
    if ($_POST['spaghettiAction'] == 'add') {
        insertSpaghetti($name, $cost);
    } else {
        $key = $_POST['spaghettiAction'];
        editSpaghetti($name, $cost, $key);
    }
} elseif (isset($_POST['deleteSpaghettiKey'])) {   /** Delete the specific Spaghetti row using id */
    /** @var int $key     Spaghetti ID */
    $key = $_POST['deleteSpaghettiKey'];

    /** Call function for deleting the specific row */
    deleteSpaghettiRow($key);
} elseif (isset($_POST['wrapName'])) {             /** Add or Edit Wrap Value */
    /**
     * @var string $name     Wrap Name
     * @var float  $cost     Wrap Cost
     */
    $name = $_POST['wrapName'];
    $cost = $_POST['wrapCost'];

    /** Add or Edit Spaghetti Details */
    if ($_POST['wrapAction'] == 'add') {
        insertWrap($name, $cost);
    } else {
        $key = $_POST['wrapAction'];
        editWrap($name, $cost, $key);
    }
} elseif (isset($_POST['deleteWrapKey'])) {        /** Delete the specific Wrap row using id */
    /** @var int $key     Wrap ID */
    $key = $_POST['deleteWrapKey'];

    /** Call function for deleting the specific row */
    deleteWrapRow($key);
} elseif (isset($_POST['spDinnerName'])) {         /** Add or Edit Wrap Value */
    /**
     * @var string $name     Special Dinner Name
     * @var float  $cost     Special Dinner Cost
     */
    $name = $_POST['spDinnerName'];
    $cost = $_POST['spDinnerCost'];

    /** Add or Edit Special Dinner Details */
    if ($_POST['spDinnerAction'] == 'add') {
        insertSpDinner($name, $cost);
    } else {
        $key = $_POST['spDinnerAction'];
        editSpDinner($name, $cost, $key);
    }
} elseif (isset($_POST['deleteSpDinnerKey'])) {   /** Delete the specific Special Dinner row using id */
    /** @var int $key     Special Dinner ID */
    $key = $_POST['deleteSpDinnerKey'];

    /** Call function for deleting the specific row */
    deleteSpDinnerRow($key);
} elseif (isset($_POST['editGrinderKey'])) {
    $key  = $_POST['editGrinderKey'];
    $row  = findGrinderRow($key);
    $resp = $row;
    echo json_encode($resp);
} elseif (isset($_POST['deleteGrinderKey'])) {
    $key = $_POST['deleteGrinderKey'];
    deleteGrinderRow($key);
} elseif (isset($_POST['grinderName'])) {
    $name = $_POST['grinderName'];
    $costSmall = $_POST['grinderCostSmall'];
    $costLarge = $_POST['grinderCostLarge'];
    if ($_POST['grinderAction'] == 'add') {
        insertGrinder($name, $costSmall, $costLarge);
    } else {
        $key = $_POST['grinderAction'];
        editGrinder($name, $costSmall, $costLarge, $key);
    }
    echo json_encode($resp);
} elseif (isset($_POST['editPizzaKey'])) {
    $key  = $_POST['editPizzaKey'];
    $row  = findPizzaRow($key);
    $resp = $row;
    echo json_encode($resp);
} elseif (isset($_POST['deletePizzaKey'])) {
    $key = $_POST['deletePizzaKey'];
    deletePizzaRow($key);
} elseif (isset($_POST['pizzaName'])) {
    $name      = $_POST['pizzaName'];
    $costSmall = $_POST['pizzaCostSmall'];
    $costLarge = $_POST['pizzaCostLarge'];
    if ($_POST['pizzaAction'] == 'add') {
        insertPizza($name, $costSmall, $costLarge);
    } else {
        $key = $_POST['pizzaAction'];
        editPizza($name, $costSmall, $costLarge, $key);
    }
    echo json_encode($resp);
} elseif (isset($_POST['editSaladKey'])) {
    $key = $_POST['editSaladKey'];
    $row = findSaladRow($key);
    $resp = $row;
    echo json_encode($resp);
} elseif (isset($_POST['deleteSaladKey'])) {
    $key = $_POST['deleteSaladKey'];
    deleteSaladRow($key);
} elseif (isset($_POST['saladName'])) {
    $name      = $_POST['saladName'];
    $costSmall = $_POST['saladCostSmall'];
    $costLarge = $_POST['saladCostLarge'];
    if ($_POST['saladAction'] == 'add') {
        insertSalad($name, $costSmall, $costLarge);
    } else {
        $key = $_POST['saladAction'];
        editSalad($name, $costSmall, $costLarge, $key);
    }
    echo json_encode($resp);
} elseif (isset($_POST['editSideOrderKey'])) {
    $key  = $_POST['editSideOrderKey'];
    $row  = findSideOrderRow($key);
    $resp = $row;
    echo json_encode($resp);
} elseif (isset($_POST['deleteSideOrderKey'])) {
    $key = $_POST['deleteSideOrderKey'];
    deleteSideOrderRow($key);
} elseif (isset($_POST['sideOrderName'])) {
    $name      = $_POST['sideOrderName'];
    $costSmall = $_POST['sideOrderCostSmall'];
    $costLarge = $_POST['sideOrderCostLarge'];
    if($_POST['sideOrderAction'] == 'add'){
        insertSideOrder($name, $costSmall, $costLarge);
    }else{
        $key = $_POST['sideOrderAction'];
        editSideOrder($name, $costSmall, $costLarge, $key);
    }
    echo json_encode($resp);
} elseif(isset($_POST['editSpPizzaKey'])) {
    $key  = $_POST['editSpPizzaKey'];
    $row  = findSpPizzaRow($key);
    $resp = $row;
    echo json_encode($resp);
} elseif (isset($_POST['deleteSpPizzaKey'])) {
    $key = $_POST['deleteSpPizzaKey'];
    deleteSpPizzaRow($key);
} elseif (isset($_POST['spPizzaName'])) {
    $name      = $_POST['spPizzaName'];
    $costSmall = $_POST['spPizzaCostSmall'];
    $costLarge = $_POST['spPizzaCostLarge'];

    if ($_POST['spPizzaAction'] == 'add') {
        insertSpPizza($name, $costSmall, $costLarge);
    } else {
        $key = $_POST['spPizzaAction'];
        editSpPizza($name, $costSmall, $costLarge, $key);
    }
    echo json_encode($resp);
}
