var $pizza = {
    submitURL : location.protocol + "//" + location.host + '/threeaces/controller/changeController'
};

$('.tableRow').each(function (i) {
    $("td:first", this).html(i + 1);
});

$('button#addPizza').click(function () {
    $('#addItem').modal('show');
});

$('.editPizza').click(function(){
    $('#addItem').modal('show', {
        backdrop: 'static'
    });

    var $edit = {
        name : $(this).closest('tr').find('td').eq(1).text(),
        pricesmall : $(this).closest('tr').find('td').eq(2).text().split(' ')[1],
        pricelarge : $(this).closest('tr').find('td').eq(3).text().split(' ')[1],
        type : $(this).closest('tr').find('td').eq(4).find('span').text()
    };

    $('#itemName').val($edit.name);
    $('#itemPriceSmall').val($edit.pricesmall);
    $('#itemPriceLarge').val($edit.pricelarge);
    $('#type').val($edit.type);
});

$('.dltPizza').click(function(){
    var $dlt = {
        confirm : confirm("Are you want to delete the selected item ?"),
        key : $(this).closest('tr').find('td').eq(4).find('span').text()
    };

    if($dlt.confirm){
        $.ajax({
            type: 'POST',
            url: $pizza.submitURL,
            data: {
                deletePizzaKey : $dlt.key
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

    if($add.name =='' || $add.costSmall == '' || $add.costLarge == ''){
        alert('Both fields must be filled');
    }else{
        $.ajax({
            type: 'POST',
            url: $pizza.submitURL,
            data: {
                pizzaName: $add.name,
                pizzaCostSmall: $add.costSmall,
                pizzaCostLarge: $add.costLarge,
                pizzaAction: $add.type
            },
            cache: false,
            error: function(){
                alert('An Error Occured !!');
            },
            success: function(){
                alert('Successfully Saved !!');
                $('#addClose').click();
                location.reload();
            }
        });
    }
});