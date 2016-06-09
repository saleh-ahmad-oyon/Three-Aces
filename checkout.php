<?php
require_once 'controller/define.php';
require_once 'controller/functions.php'; ?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <title>Checkout</title>
        <?php require_once 'includes/head.php'; ?>
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
                    <div class="small-12 columns">
                        <div class="small-8 small-centered columns">
                            <table class="stack" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($_SESSION['cart'] as $key => $cart): ?>
                                    <tr data-id="<?php echo $cart['id']?>" data-session-id="<?php echo $key?>">
                                        <td><?php echo $cart['type']," - ", $cart['name']?></td>
                                        <td>
                                            <?php if(isset($cart['size'])){
                                                echo $cart['size'];
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $cart['price']?></td>
                                        <td><button type="button" class="item-remove button alert hollow expanded">
                                                <i class="fi-x"></i>
                                                <strong>Remove from cart</strong>
                                            </button></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                            <div class="panel primary callout">
                                <p class="text-center">Total : $ <?= get_cart_total() ?></p>
                            </div>
                            <b>Please Enter your Contact Number : </b>
                            <input type="tel" id="phn" value="" />
                            <p class="text-center">
                                <button id="checkout" type="button" class="button success">
                                    <strong>Checkout</strong>
                                </button>
                            </p>
                        </div>
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
