<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/21/2016
 * Time: 6:01 PM
 */
session_start();
require_once '../../controller/define.php';
$islogin = false;
if(isset($_COOKIE['id']) || isset($_SESSION['user'])){
    $islogin = true;
    require_once '../../controller/itemController.php';
    $row = getSpecialPizza();
}else{
    header('Location: '.SERVER.'/404');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Speciality Pizza</title>
    <?php include_once '../includes/head.php';?>
</head>

<body>
    <header>
        <?php include_once '../includes/header.php'; ?>
    </header>

<div class="container-fluid-full">
    <div class="row-fluid">

        <!-- start: Main Menu -->
        <?php include_once '../includes/menu.php'; ?>
        <!-- end: Main Menu -->

        <noscript>
            <div class="alert alert-block span10">
                <h4 class="alert-heading">Warning!</h4>
                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
            </div>
        </noscript>

        <!-- start: Content -->
        <div id="content" class="span10">


            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="<?= SERVER ?>/admin">Home</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li>
                    <a href="#">Food Menu</a>
                    <i class="icon-angle-right"></i>
                </li>
                <li><a href="<?= SERVER ?>/admin/menuitem/specialPizza">Speciality Pizza</a></li>
            </ul>
            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="icon-food"></i><span class="break"></span>Speciality Pizzas</h2>
                    </div>
                    <div class="box-content">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <button class="btn btn-success" title="Add Items" id="addSpPizza"><i class="halflings-icon white plus"></i> Add Item</button><br/><br/>
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Price (Small)</th>
                                <th>Price (Large)</th>
                                <th>
                                    <div class="text-center">
                                        Action
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="dataTable-tbody">
                            <?php foreach($row as $key => $r): ?>
                                <tr class="tableRow" data-id="<?= htmlentities(stripcslashes($r['sp_pizza_id']), ENT_QUOTES, 'UTF-8'); ?>">
                                    <td></td>
                                    <td><?= htmlentities(stripcslashes($r['sp_pizza_name']), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>$ <?= htmlentities(stripcslashes($r['sp_pizza_small_price']), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>$ <?= htmlentities(stripcslashes($r['sp_pizza_large_price']), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <div class="text-center">
                                            <button class="btn btn-info editSpPizza" title="Edit"><i class="halflings-icon white edit"></i> Edit</button>
                                            <button class="btn btn-danger dltSpPizza" title="Delete"><i class="halflings-icon white trash"></i> Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div><!--/span-->

            </div><!--/row-->


        </div><!--/.fluid-container-->

        <!-- end: Content -->
    </div><!--/#content.span10-->
</div><!--/fluid-row-->

    <?php $largeSmall = true; include_once '../includes/modals.php';?>

<div class="clearfix"></div>

<footer>
    <?php include_once '../includes/footer.php'; ?>    
</footer>
    <?php include_once '../includes/jsscript.php';?>
<script src="<?= SERVER ?>/admin/js/special-pizza-script.js"></script>

</body>
</html>
