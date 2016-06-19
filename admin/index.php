<?php
session_start();
require_once '../controller/define.php';
$islogin = false;
if (isset($_COOKIE['id']) || isset($_SESSION['user'])) {
	$islogin = true;
    require_once '../controller/adminController.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Three Aces</title>
    <?php include_once 'includes/head.php';?>	
</head>

<body>

<?php if($islogin): ?>
    <header>
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
				<li><a href="#">Dashboard</a></li>
			</ul>
                <div class="row-fluid orders">
                    <a class="quick-button metro green span2" href="<?= SERVER ?>/admin/todayOrders">
                        <i class="icon-shopping-cart"></i>
                        <p>Today's Orders</p>
                        <span class="badge" id="today"></span>
                    </a>
                    <a class="quick-button metro pink span2" href="<?= SERVER ?>/admin/allOrders">
                        <i class="icon-shopping-cart"></i>
                        <p>All Orders</p>
                        <span class="badge" id="all"></span>
                    </a>
                </div>
	</div><!--/.fluid-container-->
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
	
	<div class="clearfix"></div>
	
	<footer>
		<?php include_once 'includes/footer.php';?>
	</footer>
<?php else: ?>
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
                    <h2>Login to Admin Panel</h2>
                    <form class="form-horizontal" action="<?php echo SERVER ?>/controller/admin-login-success" method="post">
                        <fieldset>
                            <div class="input-prepend" title="Username">
                                <span class="add-on"><i class="halflings-icon user"></i></span>
                                <input class="input-large span10" required="required" name="username" id="username" type="text" placeholder="Username"/>
                            </div>
                            <div class="clearfix"></div>

                            <div class="input-prepend" title="Password">
                                <span class="add-on"><i class="halflings-icon lock"></i></span>
                                <input class="input-large span10" required="required" name="password" id="password" type="password" placeholder="Password"/>
                            </div>
                            <div class="clearfix"></div>
                            <label class="remember" for="remember">
                                <div class="checker" id="uniform-remember">
                                    <span><input type="checkbox" id="remember" checked="checked" name="remember"></span>
                                </div>Remember me</label>
                            <div class="button-login">
                                <button type="submit" name="loginSubmit" class="btn btn-primary">Login</button>
                            </div>
                            <div class="clearfix"></div>
                        </fieldset>
                    </form>
                    <hr>
                    <h3>Forgot Password?</h3>
                    <p>
                        No problem, <a href="#">click here</a> to get a new password.
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
<?php endif; ?>
	
	<!-- start: JavaScript-->
<?php include_once 'includes/jsscript.php';?>
<script>
    function dataload(){
        $.post('../controller/adminController.php',{day : 'today'},function(data){
            $('#today').html(data);
        });
        $.post('../controller/adminController.php',{day : 'all'},function(data){
            $('#all').html(data);
        });
    }
    $(document).ready(function(){
        dataload();
    });
        function loadlink(){
            $('.orders').load(function () {
                $(this).unwrap();
            });
        }
        loadlink(); // This will run on page load
        setInterval(function(){
            loadlink(); // this will run after every 1 seconds
            dataload();
        }, 1000);
</script>
	<!-- end: JavaScript-->
	
</body>
</html>
