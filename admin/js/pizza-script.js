var $pizza = {
    submitURL : $url.root() + '/controller/changeController'
};

$('.tableRow').each(function (i) {
    $("td:first", this).html(i + 1);
});

$('button#addPizza').click(function () {
    $('#itemName').val('');
    $('#itemPriceSmall').val('');
    $('#itemPriceLarge').val('');
    $('#type').val('add');

    $('.addItem').modal('show');
});

$('#addbtn').click(function(){
    var $add = {
        name : $('#itemName').val(),
        costSmall : $('#itemPriceSmall').val(),
        costLarge : $('#itemPriceLarge').val(),
        type : $('#type').val()
    };

    if($add.name =='' || $add.costSmall == '' || $add.costLarge == ''){
        alert('All fields must be filled');
    }else{
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: $pizza.submitURL,
            data: {
                pizzaName: $add.name,
                pizzaCostSmall: $add.costSmall,
                pizzaCostLarge: $add.costLarge,
                pizzaAction: $add.type
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
                    $small = (response[i].pizza_small_price != null) ? '$ ' + response[i].pizza_small_price : '';
                    var content = '<tr class="tableRow" data-id="' + response[i].pizza_id + '">' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + response[i].pizza_name + '</td>' +
                        '<td>' + $small + '</td>' +
                        '<td>$ ' + response[i].pizza_large_price + '</td>' +
                        '<td>' +
                        '<div class="text-center">' +
                        '<button class="btn btn-info editPizza" title="Edit"><i class="halflings-icon white edit"></i> Edit</button>&nbsp;' +
                        '<button class="btn btn-danger dltPizza" title="Delete"><i class="halflings-icon white trash"></i> Delete</button>' +
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

$(document).on('click', '.editPizza', function(){
    $('.addItem').modal('show', {
        backdrop: 'static'
    });

    var $edit = {
        name : $(this).closest('tr').find('td').eq(1).text(),
        pricesmall : $(this).closest('tr').find('td').eq(2).text().split(' ')[1],
        pricelarge : $(this).closest('tr').find('td').eq(3).text().split(' ')[1],
        type : $(this).closest('tr').data('id')
    };

    $('#itemName').val($edit.name);
    $('#itemPriceSmall').val($edit.pricesmall);
    $('#itemPriceLarge').val($edit.pricelarge);
    $('#type').val($edit.type);
});

$(document).on('click', '.dltPizza', function(){
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
            url: $pizza.submitURL,
            data: {
                deletePizzaKey : $dlt.key
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
                    $small = (response[i].pizza_small_price != null) ? '$ ' + response[i].pizza_small_price : '';
                    var content = '<tr class="tableRow" data-id="' + response[i].pizza_id + '">' +
                        '<td>' + (i+1) + '</td>' +
                        '<td>' + response[i].pizza_name + '</td>' +
                        '<td>' + $small + '</td>' +
                        '<td>$ ' + response[i].pizza_large_price + '</td>' +
                        '<td>' +
                        '<div class="text-center">' +
                        '<button class="btn btn-info editPizza" title="Edit"><i class="halflings-icon white edit"></i> Edit</button>&nbsp;' +
                        '<button class="btn btn-danger dltPizza" title="Delete"><i class="halflings-icon white trash"></i> Delete</button>' +
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