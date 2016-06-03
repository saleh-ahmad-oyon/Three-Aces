var $sppizza = {
    submitURL : location.protocol + "//" + location.host + '/threeaces/controller/changeController'
};

$('.tableRow').each(function (i) {
    $("td:first", this).html(i + 1);
});

$('button#addSpPizza').click(function () {
    $('#addItem').modal('show');
});

$('.editSpPizza').click(function () {
    $('#addItem').modal('show', {
        backdrop: 'static'
    });

    var $edit = {
        name : $(this).closest('tr').find('td').eq(1).text(),
        pricesmall : $(this).closest('tr').find('td').eq(2).text().split(' ')[1],
        pricelarge : $(this).closest('tr').find('td').eq(3).text().split(' ')[1],
        id : $(this).closest('tr').find('td').eq(4).find('span').text()
    };

    $('#itemName').val($edit.name);
    $('#itemPriceSmall').val($edit.pricesmall);
    $('#itemPriceLarge').val($edit.pricelarge);
    $('#type').val($edit.id);
});

$('.dltSpPizza').click(function () {
    var $dlt = {
        confirm : confirm("Are you want to delete the selected item ?"),
        key : $(this).closest('tr').find('td').eq(4).find('span').text()
    };
    if($dlt.confirm){
        $.ajax({
            type: 'POST',
            url: $sppizza.submitURL,
            data: {
                deleteSpPizzaKey : $dlt.key
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
        costSmall : $('#itemPriceSmall').val(),
        costLarge : $('#itemPriceLarge').val(),
        type : $('#type').val()
    };

    if($add.name =='' || $add.costSmall == '' || $add.costLarge == ''){
        alert('Both fields must be filled');
    }else{
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: $sppizza.submitURL,
            data: {
                spPizzaName: $add.name,
                spPizzaCostSmall: $add.costSmall,
                spPizzaCostLarge: $add.costLarge,
                spPizzaAction: $add.type
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