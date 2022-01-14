<?php 
    session_start();
    require_once('config/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Garage</title>
    <?php require_once('layouts/header.php'); ?>
</head>
<body>
    <!-- navbar-start -->
    <?php require_once('layouts/navbar.php');?>
    
    <!-- banner-area -->
    <?php require_once('layouts/banner.php');?>

    <!-- card-area -->
    <?php require_once('layouts/card.php');?>
    
    <!-- footer-area -->
    <?php require_once('layouts/footer.php');?>
</body>
</html>