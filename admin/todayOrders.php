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
    $row = getTodayOrdersInfo();
}else{
    header('Location: '.SERVER.'/404');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Three Aces</title>
    <meta name="description" content="Three Aces Dashboard">
    <meta name="author" content="Saleh Ahmad">
    <meta name="keyword" content="Three Aces, restaurant, food, fast-food">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="<?= SERVER; ?>/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= SERVER; ?>/admin/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="<?= SERVER; ?>/admin/css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="<?= SERVER; ?>/admin/css/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->


    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="<?= SERVER; ?>/admin/css/ie.css" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="<?= SERVER; ?>/admin/css/ie9.css" rel="stylesheet">
    <![endif]-->

    <!-- start: Favicon -->
    <link rel="icon" href="<?= SERVER; ?>/img/aces_logo.png" />
    <!-- end: Favicon -->




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
                        <a href="<?php echo SERVER ?>/admin">Home</a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li>
                        <a href="#">Orders</a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li><a href="<?php echo SERVER ?>/admin/allOrders">Today's Orders</a></li>
                </ul>

                <div class="row-fluid sortable">
                    <div class="box span12">
                        <div class="box-header" data-original-title>
                            <h2><i class="icon-shopping-cart"></i><span class="break"></span>Today's Orders</h2>
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
                                    <tr class="tableRow">
                                        <td></td>
                                        <td>
                                            <?php
                                            $date = $r['o_datetime'];
                                            echo date('h:i:s A', strtotime($date));
                                            ?>
                                        </td>
                                        <td><?php echo $r['o_contact']; ?></td>
                                        <td> $ <?php echo $r['o_total']; ?></td>
                                        <td>
                                            <button class="btn btn-info" onclick="showInfo(<?php echo $r['o_id']; ?>);">
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
            <table class="table">
                <tr>
                    <td><b>Date</b></td>
                    <td id="order-date"></td>
                </tr>
                <tr>
                    <td><b>Time</b></td>
                    <td id="order-time"></td>
                </tr>
                <tr>
                    <td><b>Contact No.</b></td>
                    <td id="cont"></td>
                </tr>
            </table>
            <br/>
            <h4>Order Description</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="text-align: center">Item</th>
                    <th style="text-align: center;">Size</th>
                    <th style="text-align: center;">Price</th>
                </tr>
                </thead>
                <tbody id="menuitems">

                </tbody>
                <tfoot>
                <tr>
                    <td style="text-align: center"><strong>Total</strong></td>
                    <td colspan="2">
                        <div class="pull-right" id="total">
                        </div>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>
        </div>
    </div>

    <div class="clearfix"></div>

    <footer>
        <?php include_once 'includes/footer.php';?>
    </footer>

<!-- start: JavaScript-->

<script src="<?= SERVER; ?>/admin/js/jquery-1.9.1.min.js"></script>
<script src="<?= SERVER; ?>/admin/js/jquery-migrate-1.0.0.min.js"></script>

<script src="<?= SERVER; ?>/admin/js/jquery-ui-1.10.0.custom.min.js"></script>

<script src="<?= SERVER; ?>/admin/js/jquery.ui.touch-punch.js"></script>

<script src="<?= SERVER; ?>/admin/js/modernizr.js"></script>

<script src="<?= SERVER; ?>/admin/js/bootstrap.min.js"></script>

<script src="<?= SERVER; ?>/admin/js/jquery.cookie.js"></script>

<script src='<?= SERVER; ?>/admin/js/fullcalendar.min.js'></script>

<script src='<?= SERVER; ?>/admin/js/jquery.dataTables.min.js'></script>

<script src="<?= SERVER; ?>/admin/js/excanvas.js"></script>
<script src="<?= SERVER; ?>/admin/js/jquery.flot.js"></script>
<script src="<?= SERVER; ?>/admin/js/jquery.flot.pie.js"></script>
<script src="<?= SERVER; ?>/admin/js/jquery.flot.stack.js"></script>
<script src="<?= SERVER; ?>/admin/js/jquery.flot.resize.min.js"></script>

<script src="<?= SERVER; ?>/admin/js/jquery.chosen.min.js"></script>

<script src="<?= SERVER; ?>/admin/js/jquery.uniform.min.js"></script>

<script src="<?= SERVER; ?>/admin/js/jquery.cleditor.min.js"></script>

<script src="<?= SERVER; ?>/admin/js/jquery.noty.js"></script>

<script src="<?= SERVER; ?>/admin/js/jquery.elfinder.min.js"></script>

<script src="<?= SERVER; ?>/admin/js/jquery.raty.min.js"></script>

<script src="<?= SERVER; ?>/admin/js/jquery.iphone.toggle.js"></script>

<script src="<?= SERVER; ?>/admin/js/jquery.uploadify-3.1.min.js"></script>

<script src="<?= SERVER; ?>/admin/js/jquery.gritter.min.js"></script>

<script src="<?= SERVER; ?>/admin/js/jquery.imagesloaded.js"></script>

<script src="<?= SERVER; ?>/admin/js/jquery.masonry.min.js"></script>

<script src="<?= SERVER; ?>/admin/js/jquery.knob.modified.js"></script>

<script src="<?= SERVER; ?>/admin/js/jquery.sparkline.min.js"></script>

<script src="<?= SERVER; ?>/admin/js/counter.js"></script>

<script src="<?= SERVER; ?>/admin/js/retina.js"></script>

<script src="<?= SERVER; ?>/admin/js/custom.js"></script>
<script>
    function showInfo(x){
        $('#myModal').modal('show');
        $.ajax({
            type: 'POST',
            url: "../controller/adminController",
            dataType: 'json',
            data: {
                orderKey : x
            },
            cache : false,
            error: function() {
                alert('Failed ! An error occured !!');
            },
            success : function(response) {
                var dtTime = response.o_datetime.split(" ");
                $('#order-date').html(dtTime[0]);
                $('#order-time').html(dtTime[1]);
                $('#cont').html(response.o_contact);
                $('#total').html('<b> $ ' + response.o_total + '</b>');
                var out ='';
                var items = response.o_description.split(';');
                for(var i=0; i<items.length; ++i){
                    var arr = items[i].split('|');
                    out += '<tr>' +
                        '<td>' + arr[0] + '</td>' +
                        '<td>' + arr[1] + '</td>' +
                        '<td>' + '<div class="pull-right">' + arr[2] + '</div>' + '</td>' +
                        '</tr>';
                }
                $('#menuitems').html(out);
            }
        });
    }
    $('.tableRow').each(function (i) {
        $("td:first", this).html(i + 1);
    });

</script>
<!-- end: JavaScript-->

</body>
</html>
