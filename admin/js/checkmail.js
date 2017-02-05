/**
 * Created by nisso on 2/2/2017.
 */

function validateEmail($email) {
    var emailReg = /^(([^<>()\[\]\\\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return emailReg.test($email);
}

$('#mailsend').submit(function(e){
    e.preventDefault();

    var email = $('#mail').val();

    if (email == '') {
        $('#alert-div h2').html('Please insert your email.');
        return;
    }

    if (!validateEmail(email)) {
        $('#alert-div h2').html('Provided email isn\'t valid. Please provide a valid email.');
        return;
    }

    $.ajax({
        type: 'POST',
        url: $url.root() + '/controller/adminController',
        data: {
            adminMail : email
        },
        cache : false,
        error: function() {
            $('#alert-div h2').html('An error occurred!');
        },
        success : function(response) {
            if (!response) {
                $('#alert-div h2').html('Provided email isn\'t correct. Please insert your email.');
            } else {
                console.log('done');
            }
        }
    });
});