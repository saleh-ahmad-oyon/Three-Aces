<?php
require_once 'controller/functions.php';
require_once 'controller/dataCollector.php';
$row = getPizza();
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>Pizza</title>
        <?php require_once 'includes/head.php';?>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="cover-image"></div>

        <div id="wrap">
            <main>
                <header>
                    <?php include_once 'includes/upperHeader.php';?>
                    <div class="fixed-top-nav-top"></div>
                    <nav id="fixed-top-nav-sec">
                        <!-- navigation Bar -->
                        <?php require_once 'includes/navbar.php'; ?>
                    </nav>
                </header>
                <br/>
                <section>
                    <div class="row">
                        <div class="panel callout primary" data-closable>
                            <strong>Pizzas</strong>
                            <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <table style="width: 100%">
                            <thead>
                            <tr>
                                <th>Item</th>
                                <th>Small</th>
                                <th></th>
                                <th>Large</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($row as $r): ?>
                                <tr data-id ="<?= htmlentities(stripcslashes($r['pizza_id']), ENT_QUOTES, 'UTF-8'); ?>" data-type="Pizza">
                                    <td><?= htmlentities(stripcslashes($r['pizza_name']), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td> $ <?= htmlentities(stripcslashes($r['pizza_small_price']), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <button type="button" class="button hollow primary expanded item-small">
                                            <i class="fi-shopping-cart"></i>
                                            <strong>Add to cart</strong>
                                        </button>
                                    </td>
                                    <td> $ <?= htmlentities(stripcslashes($r['pizza_large_price']), ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <button type="button" class="button hollow primary expanded item-large">
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
                </section>
            </main>
        </div>
        <footer>
            <?php include_once 'includes/footer.php';?>
        </footer>

        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-2.2.4.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/app.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/foundation.util.mediaQuery.js"></script>

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
