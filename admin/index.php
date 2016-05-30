<?php
session_start();
require_once '../controller/define.php';
$islogin = false;
if(isset($_SESSION['user'])){
	$islogin = true;
require_once '../controller/adminController.php';
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
                    <a class="quick-button metro blue span2" href="<?= SERVER ?>/admin/allOrders">
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
            loadlink() // this will run after every 5 seconds
            dataload();
        }, 1000);
</script>
	<!-- end: JavaScript-->
	
</body>
</html>
