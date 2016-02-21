<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/15/2016
 * Time: 1:50 PM
 */

require_once 'controller/functions.php';
require_once 'controller/dataCollector.php';
$row = getwraps();
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Wraps</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="img/aces_logo.png">
    <!--[if IE]>
    <link rel="shortcut icon" href="img/aces_logo.png">
    <![endif]-->
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/foundation.min.css">
    <link rel="stylesheet" href="css/foundation-icons/foundation-icons.css"/>
    <link rel="stylesheet" href="css/main.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
<div class="cover-image"></div>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->
<div id="wrap">
    <main>
<header>
    <?php include_once 'includes/upperHeader.php'; ?>
    <div class="fixed-top-nav-top"></div>
    <nav id="fixed-top-nav-sec">
        <!-- navigation Bar -->
        <?php require_once 'includes/navbar.php'; ?>
    </nav>
</header>
<br/>
<section>
    <div class="small-12 columns">
        <div class="small-8 small-centered columns">
            <div class="panel callout primary"><strong>Wraps</strong></div>
            <table style="width: 100%">
                <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($row as $r): ?>
                    <tr data-id ="<?php echo $r['wraps_id'] ?>" data-type="Wraps">
                        <td><?php echo $r['wraps_name']; ?></td>
                        <td> $ <?php echo $r['wraps_price']; ?></td>
                        <td>
                            <button type="button" class="button hollow primary expanded item">
                                <i class="fi-shopping-cart"></i>
                                <strong>Add to cart</strong>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>
    </div>
</section>
        </main>
    </div>
<footer>
    <?php include_once 'includes/footer.php';?>
</footer>

<script src="js/vendor/jquery-2.2.0.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/foundation.min.js"></script>
<script src="js/foundation.util.mediaQuery.js"></script>
<script src="js/app.js"></script>
<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
</body>
</html>
