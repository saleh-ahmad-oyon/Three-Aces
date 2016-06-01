var $grinder = {
    submitURL : location.protocol + "//" + location.host + '/threeaces/controller/changeController'
};

$('.tableRow').each(function (i) {
    $("td:first", this).html(i + 1);
});

$('button#addGrinder').click(function () {
    $('#addItem').modal('show');
});

$('.editGrinder').click(function () {
    $('#addItem').modal('show', {
        backdrop: 'static'
    });
    
    var $edit = {
        name : $(this).closest('tr').find('td').eq(1).text(),
        pricesmall : $(this).closest('tr').find('td').eq(2).text().split(' ')[1],
        pricelarge : $(this).closest('tr').find('td').eq(3).text().split(' ')[2],
        id : $(this).closest('tr').find('td').eq(5).text()
    };

    $('#itemName').val($edit.name);
    $('#itemPriceSmall').val($edit.pricesmall);
    $('#itemPriceLarge').val($edit.pricelarge);
    $('#type').val($edit.id);
});

$('.dltGrinder').click(function () {
    var $dlt = {
        confirm : confirm("Are you want to delete the selected item ?"),
        key : $(this).closest('tr').find('td').eq(5).text()
    };
    if($dlt.confirm){
        $.ajax({
            type: 'POST',
            url: $grinder.submitURL,
            data: {
                deleteGrinderKey : $dlt.key
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
});

$('#addbtn').click(function(){
    var $add = {
        name : $('#itemName').val(),
        pricesmall : $('#itemPriceSmall').val(),
        pricelarge : $('#itemPriceLarge').val(),
        type : $('#type').val()
    };

    if($add.name =='' || $add.pricesmall == '' || $add.pricelarge == ''){
        alert('Both fields must be filled');
    }else{
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: $grinder.submitURL,
            data: {
                grinderName: $add.name,
                grinderCostSmall: $add.pricesmall,
                grinderCostLarge: $add.pricelarge,
                grinderAction: $add.type
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