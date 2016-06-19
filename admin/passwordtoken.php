<?php
require_once '../controller/define.php';
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
                    <h2>Insert token which has send to your email</h2>
                    <form class="form-horizontal" action="<?php echo SERVER ?>/controller/admin-login-success" method="post">
                        <fieldset>
                            <div class="input-prepend" title="Password Token">
                                <span class="add-on"><i class="halflings-icon ke"></i></span>
                                <input required="required" name="token" id="token" type="text"/>
                            </div>
                            <div class="clearfix"></div>
                            <div class="button-login">
                                <button type="submit" name="tokenSubmit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="clearfix"></div>
                        </fieldset>
                    </form>
                    <p>
                        <a href="#">Resend Code</a>
                    </p>
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
<?php include_once 'includes/jsscript.php';?>

</body>
</html>
