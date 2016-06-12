var $calzone = {
    submitURL : location.protocol + "//" + location.host + '/threeaces/controller/changeController'
};

$('.tableRow').each(function (i) {
    $("td:first", this).html(i + 1);
});

$('button#addCalzone').click(function(){
    $('#addItem').modal('show');
});

$('#addbtn').click(function(){
    var $add = {
        name : $('#itemName').val(),
        cost : $('#itemPrice').val(),
        type : $('#type').val()
    };

    if($add.name == '' || $add.cost == ''){
        alert('Both fields must be filled');
    }else{
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: $calzone.submitURL,
            data: {
                calzoneName: $add.name,
                calzoneCost: $add.cost,
                calzoneAction: $add.type
            },
            cache: false,
            error: function(){
                alert('An Error Occured !!');
            },
            success: function(response){
                alert('Successfully Saved !!');
                $('#itemName').val('');
                $('#itemPrice').val('');
                $('#type').val('');

                $('.datatable').DataTable().destroy();
                $('.dataTable-tbody').html('');
                for(i=0; i<response.length; ++i){
                    var content = '<tr class="tableRow" data-id="' + response[i].id + '">' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + response[i].name + '</td>' +
                        '<td> $ ' + response[i].price + '</td>' +
                        '<td>' +
                            '<div class="text-center">' +
                                '<button class="btn btn-info editCalzone" title="Edit"><i class="halflings-icon white edit"></i> Edit</button>&nbsp;' +
                                '<button class="btn btn-danger dltCalzone" title="Delete"><i class="halflings-icon white trash"></i> Delete</button>' +
                            '</div>' +
                        '</td>' +
                        '</tr>';
                    $('.dataTable-tbody').append(content);
                }
                initDataTable();
                $('#addItem').modal('hide');
            }
        });
    }
});

$(document).on('click', '.editCalzone', function(){
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

$(document).on('click', '.dltCalzone', function(){
    var $dlt = {
        confirm : confirm("Are you want to delete the selected item ?"),
        key : $(this).closest('tr').data('id')
    };
    if($dlt.confirm){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: $calzone.submitURL,
            data: {
                deleteKey : $dlt.key
            },
            error: function(){
                alert('An Error Occured');
            },
            success: function(response){
                alert('Data has been deleted !!');
                $('.datatable').DataTable().destroy();
                $('.dataTable-tbody').html('');
                for(i=0; i<response.length; ++i){
                    var content = '<tr class="tableRow" data-id="' + response[i].id + '">' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + response[i].name + '</td>' +
                        '<td> $ ' + response[i].price + '</td>' +
                        '<td>' +
                        '<div class="text-center">' +
                        '<button class="btn btn-info editCalzone" title="Edit"><i class="halflings-icon white edit"></i> Edit</button>&nbsp;' +
                        '<button class="btn btn-danger dltCalzone" title="Delete"><i class="halflings-icon white trash"></i> Delete</button>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('.dataTable-tbody').append(content);
                }
                initDataTable();
            }
        });
    }else{
        alert('Your data is safe !');
    }
});