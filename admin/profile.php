<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/24/2016
 * Time: 12:08 AM
 */
session_start();
require_once '../controller/define.php';

if (isset($_SESSION['user'])) {
    require_once '../controller/adminController.php';
    $key = $_SESSION['id'];
    $row = admininfo($key);
} else {
    header('Location: '.SERVER.'/404');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'includes/head.php';?>
</head>

<body>

    <header>
        <title>Profile</title>
        <?php include_once 'includes/header.php';?>
    </header>

    <div class="container-fluid-full">
        <div class="row-fluid">

            <!-- start: Main Menu -->
            <?php include_once 'includes/menu.php'; ?>
            <!-- end: Main Menu -->

            <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
            </noscript>

            <!-- start: Content -->
            <div id="content" class="span10">


                <ul class="breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="<?= SERVER ?>/admin">Home</a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li><a href="<?= SERVER ?>/admin/profile">Profile</a></li>
                </ul>
                <h1 class="text-center">Personal Information</h1>
                <hr/>
                <div class="row">
                    <button class="btn btn-info editProfile"><i class="icon-pencil"></i> Edit Profile</button>
                    <br/><br/>
                    <table class="table table-striped profile" data-id="<?= $row['id']; ?>">
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td id="nm"><?= $row['name']; ?></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td id="us"><?= $row['username']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td id="em"><?= $row['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>:</td>
                            <td id="cn"><?= $row['country']; ?></td>
                        </tr>
                        <form id="passReset">
                            <tr>
                                <td>New Password</td>
                                <td>:</td>
                                <td><input type="password" required class="form-control" id="newPass" pattern="(?=^.{4,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'The password must contain one or more uppercase characters, one or more lowercase characters, one or more numeric values, one or more special characters, and length must be greater than or equal to 4' : ''); if(this.checkValidity()) form.cpass.pattern = this.value;" /></td>
                            </tr>
                            <tr>
                                <td>Confirm Password</td>
                                <td>:</td>
                                <td><input type="password" required class="form-control" id="confirmNewPass" pattern="(?=^.{4,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');"/></td>
                            </tr>
                    </table>
                    <div class="pull-right">
                        <button class="btn btn-success" type="submit"><i class="icon-upload-alt"></i> Update Password</button>
                    </div>
                        </form>

                </div>
            </div><!--/.fluid-container-->
            <!-- end: Content -->
        </div><!--/#content.span10-->
    </div><!--/fluid-row-->

    <div class="modal hide fade" id="addItem">
        <div class="modal-body">
            <h3>Enter Old Password: </h3>
            <input type="password" id="oldpass">
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" id="Close" data-dismiss="modal">Close</button>
            <button class="btn btn-success" id="update">Update</button>
        </div>
    </div>

    <div class="modal hide fade" id="editInfo">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Edit Profile Information</h3>
        </div>
        <div class="modal-body">
            <h3>Country: </h3>
            <select data-placeholder="Choose a Country" tabindex="3" data-rel="chosen" id="selectCountry">
                <option value=""></option>
                <option></option>
            </select>
            <h3>Name: </h3>
            <input type="text" value="" required id="name">
            <h3>Username: </h3>
            <input type="text" value="" required id="username">
            <h3>Email: </h3>
            <input type="email" value="" required id="email" pattern="[([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)]i">
            <input type="hidden" id="key" value="" />
        </div>
        <div class="modal-footer">
            <button class="btn btn-success" id="editPfInfo">Update</button>
            <button class="btn btn-primary" id="editClose" data-dismiss="modal">Close</button>
        </div>
    </div>
    <div class="clearfix"></div>

    <footer>
        <?php include_once 'includes/footer.php'; ?>
    </footer>

<!-- start: JavaScript-->
<?php include_once 'includes/jsscript.php';?>
    <script src="<?= SERVER ?>/admin/js/profile.js"></script>
<script>
    $('#editPfInfo').click(function(){
        var name = $('#name').val();
        var username = $('#username').val();
        var email = $('#email').val();
        var country = $('select#selectCountry').val();
        var key = $('#key').val();

        if(name =='' || username == '' || email == '' || key == ''){
            alert('You have to fill all the fields');
        }else{
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '<?php echo SERVER ?>/controller/adminController',
                data: {
                    editKey: key,
                    editName: name,
                    editUsername: username,
                    editEmail: email,
                    editCountry: country
                },
                cache : false,
                error: function(){
                    alert('Failed! An error occured !!');
                },
                success: function(data){
                    if(data == 't'){
                        alert('Successfully Updated !!');
                        window.location.reload();
                    }else{
                        alert(data);
                    }
                }
            });
        }

    });
    $('form#passReset').submit(function(e) {
        e.preventDefault();
        $('#oldpass').val('');
        $('#addItem').modal('show');

        $('#update').click(function(){
            var oldpas = $('#oldpass').val();
            var newpas = $('#newPass').val();
            var confirmnewpass = $('#confirmNewPass').val();
            if(oldpas == '' || newpas == '' || confirmnewpass == ''){
                alert('You must field all the password field');
            }else{
                $.ajax({
                    type: 'POST',
                    dataType: 'html',
                    url: '<?php echo SERVER ?>/controller/adminController',
                    data: {
                        oldpa : oldpas,
                        newpa : newpas,
                        confirmpa : confirmnewpass,
                        key: <?php echo $row['id']; ?>
                    },
                    cache: false,
                    error: function(){
                        alert('An error occured !!');
                    },
                    success: function(data){
                        alert(data);
                        $('#newPass').val('');
                        $('#confirmNewPass').val('');
                        $('#Close').click();

                    }
                });
            }
        });
    });
</script>
<!-- end: JavaScript-->

</body>
</html>

