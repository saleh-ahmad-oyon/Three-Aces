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

$('#editPfInfo').click(function(){
    var $edit = {
        name : $('#name').val(),
        username : $('#username').val(),
        email : $('#email').val(),
        country : $('select#selectCountry').val(),
        key : $('#key').val()
    };

    if($edit.name =='' || $edit.username == '' || $edit.email == '' || $edit.key == ''){
        alert('You have to fill all the fields');
    }else{
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: $url.root() +'/controller/adminController',
            data: {
                editKey: $edit.key,
                editName: $edit.name,
                editUsername: $edit.username,
                editEmail: $edit.email,
                editCountry: $edit.country
            },
            cache : false,
            error: function(){
                $('#editInfo').modal('hide');
                $('.errorItem').modal('show');
            },
            success: function(data){
                alert(data.msg);
                window.location.reload();
            }
        });
    }
});

$('form#passReset').submit(function(e) {
    e.preventDefault();
    $('#oldpass').val('');
    $('#addItem').modal('show');

    $('#update').click(function(){
        var $pass = {
            oldpass : $('#oldpass').val(),
            newpass : $('#newPass').val(),
            confirmpass : $('#confirmNewPass').val(),
            key : $('table.profile').data('id')
        };

        if($pass.oldpass == '' || $pass.newpass == '' || $pass.confirmpass == ''){
            alert('You must field all the password field');
        }else{
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: $url.root() +'/controller/adminController',
                data: {
                    oldpa : $pass.oldpass,
                    newpa : $pass.newpass,
                    confirmpa : $pass.confirmpass,
                    key: $pass.key
                },
                cache: false,
                error: function(){
                    $('#addItem').modal('hide');
                    $('.errorItem').modal('show');
                },
                success: function(data){
                    $('#newPass').val('');
                    $('#confirmNewPass').val('');
                    $('#addItem').modal('hide');
                    alert(data.msg);
                }
            });
        }
    });
});

