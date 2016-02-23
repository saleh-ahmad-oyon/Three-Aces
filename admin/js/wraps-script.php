<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/24/2016
 * Time: 1:23 AM
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
        editWrapKey: x
            },
            cache: false,
            error: function(){
        alert('An error occured !!');
    },
            success: function(response){
        $('#itemName').val(response.wraps_name);
        $('#itemPrice').val(response.wraps_price);
        $('#type').val(response.wraps_id);
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
            deleteWrapKey : x
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
    var cost = $('#itemPrice').val();
    var type = $('#type').val();
    if(name =='' || cost == ''){
        alert('Both fields must be filled');
    }else{
        $.ajax({
                type: 'POST',
                dataType: 'json',
                url: "<?php echo SERVER ?>/controller/changeController",
                data: {
            wrapName: name,
                    wrapCost: cost,
                    wrapAction: type
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