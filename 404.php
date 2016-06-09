<?php require_once 'controller/define.php';?>
<!doctype html>
<html lang="en">
<head>
    <title>Page Not Found</title>
    <?php require_once 'includes/head.php';?>
    <style>
        .error-image{
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: -1;
            top:0;
            background: url("img/404.png") center no-repeat fixed;
            background-size: cover;
            height: 100%;
        }
    </style>
</head>
<body>
<div class="error-image"></div>
</body>
</html>