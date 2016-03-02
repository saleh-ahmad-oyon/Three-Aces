<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/24/2016
 * Time: 12:08 AM
 */
session_start();
require_once '../controller/define.php';
$islogin = false;
if(isset($_SESSION['user'])){
    $islogin = true;
    require_once '../controller/adminController.php';
    $key = $_SESSION['id'];
    $row = admininfo($key);
}else{
    header('Location: '.SERVER.'/404');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Three Aces</title>
    <meta name="description" content="Three Aces Dashboard">
    <meta name="author" content="Saleh Ahmad">
    <meta name="keyword" content="Three Aces, restaurant, food, fast-food">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    <link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link id="base-style" href="css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->


    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link id="ie-style" href="css/ie.css" rel="stylesheet">
    <![endif]-->

    <!--[if IE 9]>
    <link id="ie9style" href="css/ie9.css" rel="stylesheet">
    <![endif]-->

    <!-- start: Favicon -->
    <link rel="icon" href="../img/aces_logo.png" />
    <!-- end: Favicon -->




</head>

<body>

<?php if($islogin): ?>
    <!-- start: Header -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="index.php"><span>Three Aces</span></a>

                <!-- start: Header Menu -->
                <div class="nav-no-collapse header-nav">
                    <ul class="nav pull-right">

                        <!-- start: User Dropdown -->
                        <li class="dropdown">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="halflings-icon white user"></i> <?php echo $_SESSION['name'] ?>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-menu-title">
                                    <span>Account Settings</span>
                                </li>
                                <li><a href="<?php echo SERVER ?>/admin/profile"><i class="halflings-icon user"></i> Profile</a></li>
                                <li><a href="<?php echo SERVER ?>/controller/logout.php"><i class="halflings-icon off"></i> Logout</a></li>
                            </ul>
                        </li>
                        <!-- end: User Dropdown -->
                    </ul>
                </div>
                <!-- end: Header Menu -->
            </div>
        </div>
    </div>
    <!-- start: Header -->

    <div class="container-fluid-full">
        <div class="row-fluid">

            <!-- start: Main Menu -->
            <?php include_once 'menu.php'; ?>
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
                        <a href="<?php echo SERVER ?>/admin">Home</a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li><a href="<?php echo SERVER ?>/admin/profile">Profile</a></li>
                </ul>
                <h1 class="text-center">Personal Information</h1>
                <hr/>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn btn-info" onclick="editProfile(<?php echo $row['id']; ?>);"><i class="icon-pencil"></i> Edit Profile</button>
                        <br/><br/>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <table class="table">
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td id="nm"><?php echo $row['name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td id="us"><?php echo $row['username']; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td id="em"><?php echo $row['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td>:</td>
                                    <td id="cn"><?php echo $row['country']; ?></td>
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
                        <div class="col-sm-4"></div>
                    </div>
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
        <form id="infoForm" method="post">
        <div class="modal-body">
            <h3>Name: </h3>
            <input type="text" name="editName" value="<?php echo $row['name']; ?>" required id="name">
            <h3>Username: </h3>
            <input type="text" name="editUsername" value="<?php echo $row['username']; ?>" required id="username">
            <h3>Email: </h3>
            <input type="email" name="editEmail" value="<?php echo $row['email']; ?>" required id="email" pattern="[([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)]i">
            <h3>Country: </h3>
            <input type="text" name="editCountry" value="<?php echo $row['country']; ?>" id="country">
            <input type="hidden" name="editKey" id="key" value="<?php echo $row['id']; ?>" />
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" id="editClose" data-dismiss="modal">Close</button>
            <button class="btn btn-success" type="submit">Update</button>
        </form>
        </div>
    </div>
    <div class="clearfix"></div>

    <footer>
        <p>
            <span style="text-align:left;float:left">&copy; <?php echo date('Y'); ?> Three Aces Restaurant</span>
        </p>

    </footer>
<?php else: ?>
    <style type="text/css">
        body { background: url(img/bg-login.jpg) !important; }
    </style>
    <div class="container-fluid-full">
        <div class="row-fluid">

            <div class="row-fluid">
                <div class="login-box">
                    <h2>Login to Admin Panel</h2>
                    <form class="form-horizontal" action="<?php echo SERVER ?>/controller/admin-login-success" method="post">
                        <fieldset>
                            <div class="input-prepend" title="Username">
                                <span class="add-on"><i class="halflings-icon user"></i></span>
                                <input class="input-large span10"required="required" name="username" id="username" type="text" placeholder="Username"/>
                            </div>
                            <div class="clearfix"></div>

                            <div class="input-prepend" title="Password">
                                <span class="add-on"><i class="halflings-icon lock"></i></span>
                                <input class="input-large span10" required="required" name="password" id="password" type="password" placeholder="Password"/>
                            </div>
                            <div class="clearfix"></div>

                            <div class="button-login">
                                <button type="submit" name="loginSubmit" class="btn btn-primary">Login</button>
                            </div>
                            <div class="clearfix"></div>
                        </fieldset>
                    </form>
                    <label style="color:#881f0e;text-align: center">
                        <?php if(isset($_GET['err']) && $_GET['err'] ==1){
                            echo "Both fields are required !!";
                        }elseif(isset($_GET['err']) && $_GET['err'] ==2){
                            echo "Username and Password didn't match !!";
                        } ?>
                    </label>
                </div><!--/span-->
            </div><!--/row-->


        </div><!--/.fluid-container-->

    </div><!--/fluid-row-->
<?php endif; ?>

<!-- start: JavaScript-->

<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery-migrate-1.0.0.min.js"></script>

<script src="js/jquery-ui-1.10.0.custom.min.js"></script>

<script src="js/jquery.ui.touch-punch.js"></script>

<script src="js/modernizr.js"></script>

<script src="js/bootstrap.min.js"></script>

<script src="js/jquery.cookie.js"></script>

<script src='js/fullcalendar.min.js'></script>

<script src='js/jquery.dataTables.min.js'></script>

<script src="js/excanvas.js"></script>
<script src="js/jquery.flot.js"></script>
<script src="js/jquery.flot.pie.js"></script>
<script src="js/jquery.flot.stack.js"></script>
<script src="js/jquery.flot.resize.min.js"></script>

<script src="js/jquery.chosen.min.js"></script>

<script src="js/jquery.uniform.min.js"></script>

<script src="js/jquery.cleditor.min.js"></script>

<script src="js/jquery.noty.js"></script>

<script src="js/jquery.elfinder.min.js"></script>

<script src="js/jquery.raty.min.js"></script>

<script src="js/jquery.iphone.toggle.js"></script>

<script src="js/jquery.uploadify-3.1.min.js"></script>

<script src="js/jquery.gritter.min.js"></script>

<script src="js/jquery.imagesloaded.js"></script>

<script src="js/jquery.masonry.min.js"></script>

<script src="js/jquery.knob.modified.js"></script>

<script src="js/jquery.sparkline.min.js"></script>

<script src="js/counter.js"></script>

<script src="js/retina.js"></script>

<script src="js/custom.js"></script>
<script>
    function editProfile(x){
        $('#editInfo').modal('show');
    }
    $('form#infoForm').submit(function(e){
        e.preventDefault();
        var name = $('#name').val();
        var username = $('#username').val();
        var email = $('#email').val();
        var key = $('#key').val();
        if(name =='' || username == '' || email == '' || key == ''){
            alert('You have to fill all the fields');
        }else{
            $.ajax({
                type: 'POST',
                dataType: 'html',
                url: '<?php echo SERVER ?>/controller/adminController',
                data: new FormData(this),
                contentType: false,
                cache : false,
                processData: false,
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

