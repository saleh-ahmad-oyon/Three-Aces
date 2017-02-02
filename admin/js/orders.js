$('.orders').click(function(){
    var $order = {
        submitURL : $url.root() + '/controller/adminController',
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
            $('.errorItem').modal('show');
        },
        success : function(response) {
            $('#myModal').modal('show');
            var dtTime = dateFormat(response.o_datetime, "dd mmm, yyyy;h:MM:ss TT");
            var dateAndTime = dtTime.split(";");
            $('#order-date').html(dateAndTime[0]);
            $('#order-time').html(dateAndTime[1]);
            $('#order-inv').html(response.o_invoice);
            $('#cont').html(response.o_contact);
            $('#total').html('<b> $ ' + response.o_total + '</b>');
            var out = '';

            for(var i=0; i<response.o_description.length; ++i){
                var arr = response.o_description[i];
                var size = arr.size ? arr.size : '';
                out += '<tr>' +
                    '<td>' + arr.type + ' - ' + arr.name + '</td>' +
                    '<td>' + size.capitalizeFirstLetter() + '</td>' +
                    '<td>' + '<div class="pull-right">' + arr.price + '</div>' + '</td>' +
                    '</tr>';
            }
            $('#menuitems').html(out);
        }
    });
});

$('.tableRow').each(function (i) {
    $("td:first", this).html(i + 1);
});