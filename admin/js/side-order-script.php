<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/24/2016
 * Time: 1:16 AM
 */
header("Content-type: application/javascript");
require_once '../../controller/define.php';
?>

$('.tableRow').each(function (i) {
    $("td:first", this).html(i + 1);
});
function additem(){
    $('#addItem').modal('show');
}
function editItem(x){
    $('#addItem').modal('show', {
            backdrop: 'static'
        });
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "<?php echo SERVER ?>/controller/changeController",
            data: {
        editSideOrderKey: x
            },
            cache: false,
            error: function(){
        alert('An error occured !!');
    },
            success: function(response){
        $('#itemName').val(response.so_name);
        $('#itemPriceSmall').val(response.so_small_price);
        $('#itemPriceLarge').val(response.so_large_price);
        $('#type').val(response.so_id);
    }
        });
    }

function deleteItem(x){
    var r = confirm("Are you want to delete the selected item ?");
    if(r){
        $.ajax({
                type: 'POST',
                url: "<?php echo SERVER ?>/controller/changeController",
                data: {
            deleteSideOrderKey : x
                },
                error: function(){
            alert('An Error Occured');
        },
                success: function(){
            alert('Data has been deleted !!');
            window.location.reload();
        }
            });
        }else{
        alert('Your data is safe !');
    }
}

$('#addbtn').click(function(){
    var name = $('#itemName').val();
    var costSmall = $('#itemPriceSmall').val();
    var costLarge = $('#itemPriceLarge').val();
    var type = $('#type').val();
    if(name =='' || costLarge == ''){
        alert('Both fields must be filled');
    }else{
        $.ajax({
                type: 'POST',
                dataType: 'json',
                url: "<?php echo SERVER ?>/controller/changeController",
                data: {
            sideOrderName: name,
                    sideOrderCostSmall: costSmall,
                    sideOrderCostLarge: costLarge,
                    sideOrderAction: type
                },
                cache: false,
                error: function(){
            alert('An Error Occured !!');
        },
                success: function(response){
            alert('Successfully Saved !!');
            $('#addClose').click();
            window.location.reload();
        }
            });
        }
});
