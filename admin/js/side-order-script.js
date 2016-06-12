var $sideorder= {
    submitURL : location.protocol + "//" + location.host + '/threeaces/controller/changeController'
};

$('.tableRow').each(function (i) {
    $("td:first", this).html(i + 1);
});

$('#addSideOrder').click(function () {
    $('#addItem').modal('show');
});

$('.editSideOrders').click(function () {
    $('#addItem').modal('show', {
        backdrop: 'static'
    });

    var $edit = {
        name : $(this).closest('tr').find('td').eq(1).text(),
        pricesmall : $(this).closest('tr').find('td').eq(2).text().split(' ')[1],
        pricelarge : $(this).closest('tr').find('td').eq(3).text().split(' ')[1],
        id : $(this).closest('tr').data('id')
    };

    $('#itemName').val($edit.name);
    $('#itemPriceSmall').val($edit.pricesmall);
    $('#itemPriceLarge').val($edit.pricelarge);
    $('#type').val($edit.id);
});

$('.dltSideOrders').click(function () {
    var $dlt = {
        confirm : confirm("Are you want to delete the selected item ?"),
        key : $(this).closest('tr').data('id')
    };

    if($dlt.confirm){
        $.ajax({
            type: 'POST',
            url: $sideorder.submitURL,
            data: {
                deleteSideOrderKey : $dlt.key
            },
            error: function(){
                alert('An Error Occured');
            },
            success: function(){
                alert('Data has been deleted !!');
                location.reload();
            }
        });
    }else{
        alert('Your data is safe !');
    }
});

$('#addbtn').click(function(){
    var $add = {
        name : $('#itemName').val(),
        costSmall : $('#itemPriceSmall').val(),
        costLarge : $('#itemPriceLarge').val(),
        type : $('#type').val()
    };

    if($add.name =='' || $add.costLarge == ''){
        alert('Both fields must be filled');
    }else{
        $.ajax({
            type: 'POST',
            url: $sideorder.submitURL,
            data: {
                sideOrderName: $add.name,
                sideOrderCostSmall: $add.costSmall,
                sideOrderCostLarge: $add.costLarge,
                sideOrderAction: $add.type
            },
            cache: false,
            error: function(){
                alert('An Error Occured !!');
            },
            success: function(response){
                alert('Successfully Saved !!');
                $('#addItem').modal('hide');
                location.reload();
            }
        });
    }
});
