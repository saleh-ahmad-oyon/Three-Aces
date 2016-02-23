<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/24/2016
 * Time: 1:11 AM
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
        editLasagnaKey: x
            },
            cache: false,
            error: function(){
        alert('An error occured !!');
    },
            success: function(response){
        $('#itemName').val(response.lasagna_name);
        $('#itemPrice').val(response.lasagna_price);
        $('#type').val(response.lasagna_id);
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
            deleteLasagnaKey : x
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
            lasagnaName: name,
                    lasagnaCost: cost,
                    lasagnaAction: type
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