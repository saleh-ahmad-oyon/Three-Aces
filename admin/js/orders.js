$('.orders').click(function(){
    $('#myModal').modal('show');
    
    var $order = {
        submitURL : location.protocol + "//" + location.host + '/threeaces/controller/adminController',
        key : $(this).closest('tr').data('id')
    };
    $.ajax({
        type: 'POST',
        url: $order.submitURL,
        dataType: 'json',
        data: {
            orderKey : $order.key
        },
        cache : false,
        error: function() {
            alert('Failed ! An error occured !!');
        },
        success : function(response) {
            var dtTime = response.o_datetime.split(" ");
            $('#order-date').html(dtTime[0]);
            $('#order-time').html(dtTime[1]);
            $('#cont').html(response.o_contact);
            $('#total').html('<b> $ ' + response.o_total + '</b>');
            var out ='';
            var items = response.o_description.split(';');
            for(var i=0; i<items.length; ++i){
                var arr = items[i].split('|');
                out += '<tr>' +
                    '<td>' + arr[0] + '</td>' +
                    '<td>' + arr[1] + '</td>' +
                    '<td>' + '<div class="pull-right">' + arr[2] + '</div>' + '</td>' +
                    '</tr>';
            }
            $('#menuitems').html(out);
        }
    });
});

$('.tableRow').each(function (i) {
    $("td:first", this).html(i + 1);
});