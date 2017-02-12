<?php
require_once '../controller/define.php';
require_once '../controller/mailtoken.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Three Aces</title>
    <?php include_once 'includes/head.php';?>
</head>

<body>
<style type="text/css">
    body { background: url(img/bg-login.jpg) !important; }
</style>
<div class="container-fluid-full">
    <div class="row-fluid">

        <div class="row-fluid">
            <div class="login-box">
                <div class="icons">
                    <a href="<?= SERVER ?>"><i class="halflings-icon home"></i></a>
                </div>
                <!--<h2>Insert Token which has send to your email</h2>-->
                <h2>Insert your email address:</h2>
                <form class="form-horizontal" id="mailsend">
                    <fieldset>
                        <div class="input-prepend" title="Your Email" id="inp-rst">
                            <span class="add-on"><i class="halflings-icon envelope"></i></span>
                            <input required="required" autofocus name="mail" id="mail" type="email"/>
                        </div>
                        <div class="clearfix"></div>

                      <div id="alert-div">
                        <h2 style="color:#881f0e;"></h2>
                      </div>

                      <h2>**A code will be sent to your email.</h2>
                        <div class="button-login">
                            <button type="submit" name="tokenSubmit" class="btn btn-primary">Send Code</button>
                        </div>
                        <div class="clearfix"></div>
                    </fieldset>
                </form>
                <!--<p>
                    <a href="#">Resend Token Number</a>
                </p>-->
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

<!-- start: JavaScript-->
<?php include_once 'includes/jsscript.php'; ?>
<script src="<?= SERVER ?>/admin/js/checkmail.js"></script>

</body>
</html>
