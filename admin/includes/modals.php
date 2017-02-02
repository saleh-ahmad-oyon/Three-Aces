<!-- Modals -->
<?php if (isset($orderDetails)): ?>
<!-- Order Details -->
    <div class="modal hide fade" id="myModal">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h1>Order Details</h1>
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
                    <td><b>Invoice No.</b></td>
                    <td>:</td>
                    <td id="order-inv"></td>
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
<!-- /Order Details -->
<?php endif; ?>

<?php if (isset($profile)): ?>
    <div class="modal hide fade" id="addItem">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h1><i class="glyphicons-icon lock"></i></h1>
        </div>
        <div class="modal-body">
            <div class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="oldpass"><b>Enter Old Password :</b></label>
                        <div class="controls">
                            <input type="password" id="oldpass">
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" id="update">Update</button>
            <button class="btn btn-primary" id="Close" data-dismiss="modal">Close</button>
        </div>
    </div>
    
    <div class="modal hide fade" id="editInfo">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h1><i class="glyphicons-icon pencil"></i> Profile Information</h1>
        </div>
        <div class="modal-body">
            <form class="form-horizontal">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="selectCountry"><b>Country :</b></label>
                        <div class="controls">
                            <select data-placeholder="Choose a Country" tabindex="3" data-rel="chosen" id="selectCountry">
                                <option value=""></option>
                                <option></option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="name"><b>Name :</b></label>
                        <div class="controls">
                            <input type="text" value="" required id="name">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="username"><b>Username :</b></label>
                        <div class="controls">
                            <input type="text" value="" required id="username">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="email"><b>Username :</b></label>
                        <div class="controls">
                            <input type="email" value="" required id="email" pattern="[([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)]i">
                        </div>
                    </div>
                    <input type="hidden" id="key" value="" />
                </fieldset>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" id="editPfInfo">Update</button>
            <button class="btn btn-primary" id="editClose" data-dismiss="modal">Close</button>
        </div>
    </div>
<?php endif; ?>
<!-- Add Item Modal -->
    <?php  if (isset($normal)): ?>
    <div class="modal hide fade addItem">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h1>Calzone</h1>
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
                    <label class="control-label" for="itemPrice"><b>Price:</b></label>
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="number" min="0" step="0.01" value="" required="required" id="itemPrice" />
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
    <div class="modal-footer">
        <button class="btn btn-success" id="addbtn">Save</button>
        <button class="btn btn-primary" id="addClose" data-dismiss="modal">Close</button>
    </div>
</div>
    <?php elseif (isset($largeSmall)): ?>
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
            <button class="btn btn-success" id="addbtn">Save</button>
            <button class="btn btn-primary" id="addClose" data-dismiss="modal">Close</button>
        </div>
    </div>
    <?php endif; ?>
<?php if (isset($normal) || isset($largeSmall)): ?>
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
<?php endif; ?>
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
