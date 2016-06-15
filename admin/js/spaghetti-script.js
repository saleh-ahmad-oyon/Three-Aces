var $spaghetti = {
    submitURL : $url.root() + '/controller/changeController'
};

$('.tableRow').each(function (i) {
    $("td:first", this).html(i + 1);
});

$('button#addSpaghetti').click(function () {
    $('#itemName').val('');
    $('#itemPrice').val('');
    $('#type').val('add');

    $('.addItem').modal('show');
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
            dataType: 'json',
            url: $spaghetti.submitURL,
            data: {
                spaghettiName: $add.name,
                spaghettiCost: $add.cost,
                spaghettiAction: $add.type
            },
            cache: false,
            error: function(){
                $('.addItem').modal('hide');
                $('.errorItem').modal('show');
            },
            success: function(response){
                $('.datatable').DataTable().destroy();
                $('.dataTable-tbody').html('');
                for(i=0; i<response.length; ++i){
                    var content = '<tr class="tableRow" data-id="' + response[i].spaghetti_id + '">' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + response[i].spaghetti_name + '</td>' +
                        '<td> $ ' + response[i].spaghetti_price + '</td>' +
                        '<td>' +
                        '<div class="text-center">' +
                        '<button class="btn btn-info editSpaghetti" title="Edit"><i class="halflings-icon white edit"></i> Edit</button>&nbsp;' +
                        '<button class="btn btn-danger dltSpaghetti" title="Delete"><i class="halflings-icon white trash"></i> Delete</button>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('.dataTable-tbody').append(content);
                }
                initDataTable();
                $('.addItem').modal('hide');
                $('.saveItem').modal('show');
            }
        });
    }
});

$(document).on('click', '.editSpaghetti', function(){
    $('.addItem').modal('show', {
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

$(document).on('click', '.dltSpaghetti', function(){
    var $dlt = {
        key : $(this).closest('tr').data('id')
    };

    $('.deleteItem').modal('show', {
        backdrop: 'static'
    });

    $(document).on('click', '.yes', function(){
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: $spaghetti.submitURL,
            data: {
                deleteSpaghettiKey : $dlt.key
            },
            error: function(){
                $('.deleteItem').modal('hide');
                $('.errorItem').modal('show');
            },
            success: function(response){
                $('.datatable').DataTable().destroy();
                $('.dataTable-tbody').html('');
                for(i=0; i<response.length; ++i){
                    var content = '<tr class="tableRow" data-id="' + response[i].spaghetti_id + '">' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + response[i].spaghetti_name + '</td>' +
                        '<td> $ ' + response[i].spaghetti_price + '</td>' +
                        '<td>' +
                        '<div class="text-center">' +
                        '<button class="btn btn-info editSpaghetti" title="Edit"><i class="halflings-icon white edit"></i> Edit</button>&nbsp;' +
                        '<button class="btn btn-danger dltSpaghetti" title="Delete"><i class="halflings-icon white trash"></i> Delete</button>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('.dataTable-tbody').append(content);
                }
                initDataTable();
                $('.deleteItem').modal('hide');
                $('.dltSuccess').modal('show');
            }
        });
    });
});