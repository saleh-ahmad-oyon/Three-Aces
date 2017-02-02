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
                        <?php if(!isset($_SESSION['cart'])): ?>
                            <h3>No items found!</h3>
                        <?php else: ?>
                            <div class="small-8 small-centered columns">
                              <div class="panel secondary callout">
                                <h2 class="text-center">Three Aces</h2>
                                <?php if(!isset($_SESSION['invoice'])) $_SESSION['invoice'] = uniqid(''); ?>
                                <h5 class="text-right">Invoice No. <?= $_SESSION['invoice'] ?></h5>
                              </div>
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
                                    <tr data-id="<?= $cart['id']?>" data-session-id="<?= $key?>">
                                        <td><?= $cart['type']," - ", $cart['name']?></td>
                                        <td>
                                            <?php if(isset($cart['size'])){
                                                echo $cart['size'];
                                            }
                                            ?>
                                        </td>
                                        <td><?= $cart['price']?></td>
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
                            <input type="tel" id="phn" value="" placeholder="+880-XXXXXXXXXX"/>
                            <p class="text-center">
                                <button id="checkout" type="button" class="button success">
                                    <strong>Checkout</strong>
                                </button>
                            </p>
                        </div>
                        <?php endif; ?>
                    </div>

                </section>
            </main>
        </div>
        <footer>
            <?php include_once 'includes/footer.php';?>
        </footer>

        <?php include_once 'includes/jsscript.php';?>
    </body>
</html>
