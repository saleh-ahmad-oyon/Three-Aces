var $grinder = {
    submitURL : location.protocol + "//" + location.host + '/threeaces/controller/changeController'
};

$('.tableRow').each(function (i) {
    $("td:first", this).html(i + 1);
});

$('button#addGrinder').click(function () {
    $('#itemName').val('');
    $('#itemPriceSmall').val('');
    $('#itemPriceLarge').val('');
    $('#type').val('add');
    
    $('.addItem').modal('show');
});

$('#addbtn').click(function(){
    var $add = {
        name : $('#itemName').val(),
        pricesmall : $('#itemPriceSmall').val(),
        pricelarge : $('#itemPriceLarge').val(),
        type : $('#type').val()
    };

    if($add.name =='' || $add.pricelarge == ''){
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
                $('.addItem').modal('hide');
                $('.errorItem').modal('show');
            },
            success: function(response){
                $('.datatable').DataTable().destroy();
                $('.dataTable-tbody').html('');
                var $small = '';
                for(i=0; i<response.length; ++i){
                    $small = (response[i].grinder_small_price != null) ? '$ ' + response[i].grinder_small_price : '';
                    var content = '<tr class="tableRow" data-id="' + response[i].grinder_id + '">' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + response[i].grinder_name + '</td>' +
                        '<td>' + $small + '</td>' +
                        '<td> $ ' + response[i].grinder_large_price + '</td>' +
                        '<td>' +
                        '<div class="text-center">' +
                        '<button class="btn btn-info editGrinder" title="Edit"><i class="halflings-icon white edit"></i> Edit</button>&nbsp;' +
                        '<button class="btn btn-danger dltGrinder" title="Delete"><i class="halflings-icon white trash"></i> Delete</button>' +
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

$(document).on('click', '.editGrinder', function(){
    $('.addItem').modal('show', {
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

$(document).on('click', '.dltGrinder', function(){
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
            url: $grinder.submitURL,
            data: {
                deleteGrinderKey : $dlt.key
            },
            error: function(){
                $('.deleteItem').modal('hide');
                $('.errorItem').modal('show');
            },
            success: function(response){
                $('.datatable').DataTable().destroy();
                $('.dataTable-tbody').html('');
                var $small = '';
                for(i=0; i<response.length; ++i){
                    $small = (response[i].grinder_small_price != null) ? '$ ' + response[i].grinder_small_price : '';
                    var content = '<tr class="tableRow" data-id="' + response[i].grinder_id + '">' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + response[i].grinder_name + '</td>' +
                        '<td>' + $small + '</td>' +
                        '<td> $ ' + response[i].grinder_large_price + '</td>' +
                        '<td>' +
                        '<div class="text-center">' +
                        '<button class="btn btn-info editGrinder" title="Edit"><i class="halflings-icon white edit"></i> Edit</button>&nbsp;' +
                        '<button class="btn btn-danger dltGrinder" title="Delete"><i class="halflings-icon white trash"></i> Delete</button>' +
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