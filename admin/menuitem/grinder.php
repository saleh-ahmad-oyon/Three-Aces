<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/21/2016
 * Time: 5:58 PM
 */
session_start();

require_once '../../controller/define.php';

$islogin = false;

if (isset($_SESSION['user'])) {
    $islogin = true;
    require_once '../../controller/itemController.php';
    $row = getGrinders();
} else {
    header('Location: '.SERVER.'/404');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Grinder</title>
    <?php include_once '../includes/head.php';?>    
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
                    <li><a href="<?= SERVER ?>/admin/menuitem/grinder">Grinder</a></li>
                </ul>

                <div class="row-fluid sortable">
                    <div class="box span12">
                        <div class="box-header" data-original-title>
                            <h2><i class="icon-food"></i><span class="break"></span>Grinders</h2>
                        </div>
                        <div class="box-content">
                            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                                <button class="btn btn-success" title="Add Items" id="addGrinder"><i class="halflings-icon white plus"></i> Add Item</button><br/><br/>
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
                                    <tr class="tableRow" data-id="<?= htmlentities(stripcslashes($r['grinder_id']), ENT_QUOTES, 'UTF-8'); ?>">
                                        <td></td>
                                        <td><?= htmlentities(stripcslashes($r['grinder_name']), ENT_QUOTES, 'UTF-8'); ?></td>
                                         <td><?php
                                                if(isset($r['grinder_small_price'])){
                                                    echo '$ '. htmlentities(stripcslashes($r['grinder_small_price']), ENT_QUOTES, 'UTF-8');
                                                }
                                            ?>
                                        </td>
                                        <td>$ <?= htmlentities(stripcslashes($r['grinder_large_price']), ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td>
                                            <div class="text-center">
                                                <button class="btn btn-info editGrinder" title="Edit"><i class="halflings-icon white edit"></i> Edit</button>
                                                <button class="btn btn-danger dltGrinder" title="Delete"><i class="halflings-icon white trash"></i> Delete</button>
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

    <!-- Modals -->
    <!-- Add Item Modal -->
    <div class="modal hide fade addItem">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h1>Grinder</h1>
        </div>
        <div class="modal-body">
            <form class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="itemName"><b>Name:</b></label>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on">@</span>
                                <input type="text" id="itemName" value="" required="required" />
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="type" value="" />

                    <div class="control-group">
                        <label class="control-label" for="itemPriceSmall"><b>Price (Small):</b></label>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on">$</span>
                                <input type="number" min="0" step="0.01" value="" required="required" id="itemPriceSmall" />
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="itemPriceLarge"><b>Price (Large):</b></label>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on">$</span>
                                <input type="number" min="0" step="0.01" value="" required="required" id="itemPriceLarge" />
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" id="addClose" data-dismiss="modal">Close</button>
            <button class="btn btn-success" id="addbtn">Save</button>
        </div>
    </div>

    <!-- Delete Item Modal -->
    <div class="modal hide fade deleteItem">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <i class="glyphicons-icon warning_sign"></i>
        </div>
        <div class="modal-body text-center">
            <h2>Are you sure you want to delete ?</h2>
            <p>No Data will be available</p>
            <br />
            <button class="btn btn-danger yes">Yes</button>
            <button class="btn btn-primary no" data-dismiss="modal">No</button>
            <br/>
        </div>
    </div>

    <!-- Save Item Modal -->
    <div class="modal hide fade saveItem">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <i class="glyphicons-icon ok_2"></i>
        </div>
        <div class="modal-body text-center">
            <h2>Successfully Saved !!</h2>
            <button class="btn btn-success" data-dismiss="modal">Ok</button>
        </div>
    </div>

    <!-- Delete Success Modal -->
    <div class="modal hide fade dltSuccess">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <i class="glyphicons-icon ok_2"></i>
        </div>
        <div class="modal-body text-center">
            <h2>Data has been deleted !!</h2>
            <button class="btn btn-success" data-dismiss="modal">Ok</button>
        </div>
    </div>

    <!-- Error Modal -->
    <div class="modal hide fade errorItem">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <i class="glyphicons-icon remove_2"></i>
        </div>
        <div class="modal-body text-center">
            <h2>An Error Occured !!</h2>
            <button class="btn btn-success" data-dismiss="modal">Ok</button>
        </div>
    </div>
    <!-- /Modals -->

    <div class="clearfix"></div>

    <footer>
       <?php include_once '../includes/footer.php'; ?>
    </footer>

    <?php include_once '../includes/jsscript.php';?>    
    <script src="<?= SERVER ?>/admin/js/grinder-script.js"></script>
</body>
</html>
