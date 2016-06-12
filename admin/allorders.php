<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/19/2016
 * Time: 12:54 PM
 */

session_start();
require_once '../controller/define.php';
$islogin = false;
if(isset($_SESSION['user'])){
    $islogin = true;
    require_once '../controller/adminController.php';
    $row = getAllOrdersInfo();
}else{
    header(''.SERVER.'/404');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Orders</title>
<?php include_once 'includes/head.php';?>
</head>

<body>
    <header>
        <?php include_once 'includes/header.php';?>
    </header>

    <div class="container-fluid-full">
        <div class="row-fluid">

            <!-- start: Main Menu -->
            <?php include_once 'includes/menu.php'; ?>
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
                        <a href="#">Orders</a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li><a href="<?= SERVER ?>/admin/allOrders">All Orders</a></li>
                </ul>

                <div class="row-fluid sortable">
                    <div class="box span12">
                        <div class="box-header" data-original-title>
                            <h2><i class="icon-shopping-cart"></i><span class="break"></span>All Orders</h2>
                        </div>
                        <div class="box-content">
                            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Time and Date</th>
                                    <th>Contact</th>
                                    <th>Total Amount</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($row as $key => $r): ?>
                                <tr class="tableRow" data-id="<?= $r['o_id']; ?>">
                                    <td></td>
                                    <td>
                                        <?php
                                        $date = $r['o_datetime'];
                                        echo date('h:i:s A, d/m/Y', strtotime($date));
                                        ?>
                                    </td>
                                    <td><?= $r['o_contact']; ?></td>
                                    <td> $ <?= $r['o_total']; ?></td>
                                    <td>
                                        <button class="btn btn-info orders">
                                            <i class="icon-info-sign"></i> Details
                                        </button>
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

    <div class="modal hide fade" id="myModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Settings</h3>
        </div>
        <div class="modal-body">
            <table class="table table-striped">
                <tr>
                    <td><b>Date</b></td>
                    <td>:</td>
                    <td id="order-date"></td>
                </tr>
                <tr>
                    <td><b>Time</b></td>
                    <td>:</td>
                    <td id="order-time"></td>
                </tr>
                <tr>
                    <td><b>Contact No.</b></td>
                    <td>:</td>
                    <td id="cont"></td>
                </tr>
            </table>
            <br/>
            <h4>Order Description</h4>
            <table class="table table-bordered">
                <thead>
                    <tr class="btn-info">
                        <th style="text-align: center">Item(s)</th>
                        <th style="text-align: center;">Size</th>
                        <th style="text-align: center;">Price</th>
                    </tr>
                </thead>
                <tbody id="menuitems">

                </tbody>
                <tfoot>
                    <tr class="btn-info">
                        <td style="text-align: center"><strong>Total</strong></td>
                        <td colspan="2">
                            <div class="pull-right" id="total">
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="clearfix"></div>

    <footer>
        <?php include_once 'includes/footer.php'; ?>
    </footer>
    
<?php 
$order = true;
include_once 'includes/jsscript.php';?>
</body>
</html>
