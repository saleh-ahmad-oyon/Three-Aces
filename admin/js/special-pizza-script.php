<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/24/2016
 * Time: 1:21 AM
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
        editSpPizzaKey: x
            },
            cache: false,
            error: function(){
        alert('An error occured !!');
    },
            success: function(response){
        $('#itemName').val(response.sp_pizza_name);
        $('#itemPriceSmall').val(response.sp_pizza_small_price);
        $('#itemPriceLarge').val(response.sp_pizza_large_price);
        $('#type').val(response.sp_pizza_id);
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
            deleteSpPizzaKey : x
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
    if(name =='' || costSmall == '' || costLarge == ''){
        alert('Both fields must be filled');
    }else{
        $.ajax({
                type: 'POST',
                dataType: 'json',
                url: "<?php echo SERVER ?>/controller/changeController",
                data: {
            spPizzaName: name,
                    spPizzaCostSmall: costSmall,
                    spPizzaCostLarge: costLarge,
                    spPizzaAction: type
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