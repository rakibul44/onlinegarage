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
    <!-- navbar-end -->
      
    <?php require_once('layouts/banner.php');?>

    <!-- content-text -->
    <div class="container">
        <div class="content" style="text-align: center; margin-top:30px">
            <h2>Introducing you to the Online Garage</h2>
            <h5>A one-stop solution for your journey</h5>
        </div>
    </div>
    <!-- footer-area-start -->
    <?php require_once('layouts/footer.php');?>
</body>
</html>