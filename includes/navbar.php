<?php
/**
 * Created by PhpStorm.
 * User: Oyon
 * Date: 2/14/2016
 * Time: 6:54 PM
 */
require_once 'controller/define.php';
?>
<div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
    <div class="row">
        <div class="small">
            <button class="menu-icon" type="button" data-toggle></button>
            <div class="title-bar-title">Menu</div>
        </div>
    </div>
</div>
<div class="top-bar" id="example-menu">
    <div class="row">
        <div class="small">
            <div class="top-bar-left">
                <ul class="dropdown menu" data-dropdown-menu>
                    <li <?= $_SERVER['REQUEST_URI'] == '/threeaces/' ? 'class="active"' : '' ?>><a href="<?php echo SERVER ?>">Home</a></li>
                    <li <?= $_SERVER['REQUEST_URI'] == '/threeaces/calzone' ? 'class="active"' : '' ?>><a href="calzone">Calzone</a></li>
                    <li <?= $_SERVER['REQUEST_URI'] == '/threeaces/grinder' ? 'class="active"' : '' ?>><a href="grinder">Grinder</a></li>
                    <li <?= $_SERVER['REQUEST_URI'] == '/threeaces/lasagna' ? 'class="active"' : '' ?>><a href="lasagna">Lasagna</a></li>
                    <li <?= $_SERVER['REQUEST_URI'] == '/threeaces/pizza' ? 'class="active"' : '' ?>><a href="pizza">Pizza</a></li>
                    <li <?= $_SERVER['REQUEST_URI'] == '/threeaces/salad' ? 'class="active"' : '' ?>><a href="salad">Salad</a></li>
                    <li <?= $_SERVER['REQUEST_URI'] == '/threeaces/sideorders' ? 'class="active"' : '' ?>><a href="sideorders">Side Orders</a></li>
                    <li <?= $_SERVER['REQUEST_URI'] == '/threeaces/spaghetti' ? 'class="active"' : '' ?>><a href="spaghetti">Spaghetti</a></li>
                    <li <?= $_SERVER['REQUEST_URI'] == '/threeaces/wraps' ? 'class="active"' : '' ?>><a href="wraps">Wraps</a></li>
                    <li <?= $_SERVER['REQUEST_URI'] == '/threeaces/specialdinners' ? 'class="active"' : '' ?>><a href="specialdinners">Special Dinner</a></li>
                    <li <?= $_SERVER['REQUEST_URI'] == '/threeaces/specialitypizza' ? 'class="active"' : '' ?>><a href="specialitypizza">Speciality Pizza</a></li>
                </ul>
            </div>
            <div class="top-bar-right">
                <ul class="menu">
                    <div>
                        <a href="checkout" class="button primary hollow">
                            <i class="fi-shopping-cart"></i>
                            <strong>
                                <?= !isset($_SESSION['cart']) ? 0 : count($_SESSION['cart']); ?>
                            </strong>
                        </a>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>