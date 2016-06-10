<?php

/** Session Starts */
session_start();

/** Required File */
require_once '../../controller/define.php';

$islogin = false;

if (isset($_SESSION['user'])) {
    $islogin = true;
    require_once '../../controller/itemController.php';
    $row = getCalzones();
} else {
    header('Location: '.SERVER.'/404');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Three Aces</title>

    <link id="bootstrap-style" href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="../css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="../css/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="../css/ie.css" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="../css/ie9.css" rel="stylesheet">
    <![endif]-->

    <link rel="icon" href="../../img/aces_logo.png" />
</head>

<body>
    <header>
        <?php include_once '../includes/header.php';?>
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
                <li><a href="<?= SERVER ?>/admin/menuitem/calzone">Calzone</a></li>
            </ul>

            <div class="row-fluid sortable">
                <div class="box span12">
                    <div class="box-header" data-original-title>
                        <h2><i class="icon-food"></i><span class="break"></span>Homemade Calzones</h2>
                    </div>
                    <div class="box-content">
                        <table class="table table-striped table-bordered bootstrap-datatable datatable">
                            <button class="btn btn-success" title="Add Items" id="addCalzone"><i class="halflings-icon white plus"></i> Add Item</button><br/><br/>
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>
                                    <div class="text-center">
                                        Action
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <tbody id="tbody">
                            <?php foreach($row as $key => $r): ?>
                                <tr class="tableRow" data-id="<?= htmlentities(stripcslashes($r['id']), ENT_QUOTES, 'UTF-8'); ?>">
                                    <td></td>
                                    <td><?= htmlentities(stripcslashes($r['name']), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td> $ <?= htmlentities(stripcslashes($r['price']), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <div class="text-center">
                                            <button class="btn btn-info editCalzone" title="Edit"><i class="halflings-icon white edit"></i> Edit</button>
                                            <button class="btn btn-danger dltCalzone" title="Delete"><i class="halflings-icon white trash"></i> Delete</button>
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

<div class="modal hide fade" id="addItem">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h1>Calzone</h1>
    </div>
    <div class="modal-body">
        <h3>Name</h3>
        <input type="text" id="itemName" value="" required="required" />
        <input type="hidden" id="type" value="add"/>
        <h3>Price</h3>
        <input type="number" min="0" step="0.01" value="" required="required" id="itemPrice" />
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" id="addClose" data-dismiss="modal">Close</button>
        <button class="btn btn-success" id="addbtn">Save</button>
    </div>
</div>
<div class="clearfix"></div>

<footer>
    <?php include_once '../includes/footer.php';?>
</footer>

    <?php include_once '../includes/jsscript.php';?>
    <script src="<?= SERVER ?>/admin/js/calzone-script.js"></script>
</body>
</html>
