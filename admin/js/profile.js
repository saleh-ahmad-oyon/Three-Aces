$(document).ready(function(){
    var $profile = {
        submitURL : $url.root() + '/controller/CountryController'
    };
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: $profile.submitURL,
        cache : false,
        error: function(){
            alert('Failed! An error occured !!');
        },
        success: function( data ) {
            $.each(data, function(i, value) {
                $('select#selectCountry').append($('<option>').text(value.c_name).attr('value', value.c_name));
            });
            $('select#selectCountry').trigger("liszt:updated");
        }
    });
});

$('.editProfile').click(function(){
    var $edit = {
        name : $('table.profile tr:nth-child(1)').find('td').eq(2).text(),
        username : $('table.profile tr:nth-child(2)').find('td').eq(2).text(),
        email : $('table.profile tr:nth-child(3)').find('td').eq(2).text(),
        country : $('table.profile tr:nth-child(4)').find('td').eq(2).text(),
        key : $('table.profile').data('id')
    };

    $('#name').val($edit.name);
    $('#username').val($edit.username);
    $('#email').val($edit.email);
    $('select#selectCountry').val($edit.country);
    $('select#selectCountry').trigger("liszt:updated");
    $('#key').val($edit.key);

    $('#editInfo').modal('show');
});