<!-- Modals -->
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
            <button class="btn btn-primary" id="addClose" data-dismiss="modal">Close</button>
            <button class="btn btn-success" id="addbtn">Save</button>
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
<?php endif; ?>