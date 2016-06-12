var $spdinner = {
    submitURL : location.protocol + "//" + location.host + '/threeaces/controller/changeController'
};

$('.tableRow').each(function (i) {
    $("td:first", this).html(i + 1);
});

$('button#addSpDinner').click(function () {
    $('#addItem').modal('show');
});

$('.editSpdinner').click(function () {
    $('#addItem').modal('show', {
        backdrop: 'static'
    });

    var $edit = {
        name : $(this).closest('tr').find('td').eq(1).text(),
        price : $(this).closest('tr').find('td').eq(2).text().split(' ')[2],
        type : $(this).closest('tr').data('id')
    };

    $('#itemName').val($edit.name);
    $('#itemPrice').val($edit.price);
    $('#type').val($edit.type);
});

$('.dltSpdinner').click(function () {
    var $dlt = {
        confirm : confirm("Are you want to delete the selected item ?"),
        key : $(this).closest('tr').data('id')
    };
    if($dlt.confirm){
        $.ajax({
            type: 'POST',
            url: $spdinner.submitURL,
            data: {
                deleteSpDinnerKey : $dlt.key
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
        cost : $('#itemPrice').val(),
        type : $('#type').val()
    };

    if($add.name =='' || $add.cost == ''){
        alert('Both fields must be filled');
    }else{
        $.ajax({
            type: 'POST',
            url: $spdinner.submitURL,
            data: {
                spDinnerName: $add.name,
                spDinnerCost: $add.cost,
                spDinnerAction: $add.type
            },
            cache: false,
            error: function(){
                alert('An Error Occured !!');
            },
            success: function(){
                alert('Successfully Saved !!');
                $('#addItem').modal('hide');
                location.reload();
            }
        });
    }
});