<?php
    session_start();
    include_once('config/config.php');
    if(isset($_SESSION['id'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechanic List </title>
    <?php require_once('layouts/header.php'); ?>
</head>
<body>
    <?php require_once('layouts/navbar.php'); ?>
    <div class="container mt-4 mb-4">
        <h4 class="pt-4">Mechanic List</h4>
    </div>
    <!-- list-card -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="w3-card-4">
                    <div class="w3-container w3-grey">
                        <h3>John Doe</h3>
                    </div>
                    <div class="w3-container">
                        <img src="assets/images/avatar.jpg" alt="Avatar" class="w3-left w3-circle p-4" style="width: 150px;">
                        <span class="mt-2" style="font-size: 12px;font-weight: bold;">Hello, I'm John Doe.I'll really thankfull to help you.</span>
                        <div class="rate">
                            <span class="badge bg-success"><span>Rating</span> 4.5</span>
                        </div>
                    </div>
                    <button class="w3-button w3-block w3-green">+ Connect</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="w3-card-4">
                    <div class="w3-container w3-grey">
                        <h3>John Doe</h3>
                    </div>
                    <div class="w3-container">
                        <img src="assets/images/avatar.jpg" alt="Avatar" class="w3-left w3-circle p-4" style="width: 150px;">
                        <span class="mt-2" style="font-size: 12px;font-weight: bold;">Hello, I'm John Doe.I'll really thankfull to help you.</span>
                        <div class="rate">
                            <span class="badge bg-success"><span>Rating</span> 4.5</span>
                        </div>
                    </div>
                    <button class="w3-button w3-block w3-green">+ Connect</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="w3-card-4">
                    <div class="w3-container w3-grey">
                        <h3>John Doe</h3>
                    </div>
                    <div class="w3-container">
                        <img src="assets/images/avatar.jpg" alt="Avatar" class="w3-left w3-circle p-4" style="width: 150px;">
                        <span class="mt-2" style="font-size: 12px;font-weight: bold;">Hello, I'm John Doe.I'll really thankfull to help you.</span>
                        <div class="rate">
                            <span class="badge bg-success"><span>Rating</span> 4.5</span>
                        </div>
                    </div>
                    <button class="w3-button w3-block w3-green">+ Connect</button>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="w3-card-4">
                    <div class="w3-container w3-grey">
                        <h3>John Doe</h3>
                    </div>
                    <div class="w3-container">
                        <img src="assets/images/avatar.jpg" alt="Avatar" class="w3-left w3-circle p-4" style="width: 150px;">
                        <span class="mt-2" style="font-size: 12px;font-weight: bold;">Hello, I'm John Doe.I'll really thankfull to help you.</span>
                        <div class="rate">
                            <span class="badge bg-success"><span>Rating</span> 4.5</span>
                        </div>
                    </div>
                    <button class="w3-button w3-block w3-green">+ Connect</button>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="w3-card-4">
                    <div class="w3-container w3-grey">
                        <h3>John Doe</h3>
                    </div>
                    <div class="w3-container">
                        <img src="assets/images/avatar.jpg" alt="Avatar" class="w3-left w3-circle p-4" style="width: 150px;">
                        <span class="mt-2" style="font-size: 12px;font-weight: bold;">Hello, I'm John Doe.I'll really thankfull to help you.</span>
                        <div class="rate">
                            <span class="badge bg-success"><span>Rating</span> 4.5</span>
                        </div>
                    </div>
                    <button class="w3-button w3-block w3-green">+ Connect</button>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="w3-card-4">
                    <div class="w3-container w3-grey">
                        <h3>John Doe</h3>
                    </div>
                    <div class="w3-container">
                        <img src="assets/images/avatar.jpg" alt="Avatar" class="w3-left w3-circle p-4" style="width: 150px;">
                        <span class="mt-2" style="font-size: 12px;font-weight: bold;">Hello, I'm John Doe.I'll really thankfull to help you.</span>
                        <div class="rate">
                            <span class="badge bg-success"><span>Rating</span> 4.5</span>
                        </div>
                    </div>
                    <button class="w3-button w3-block w3-green">+ Connect</button>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('layouts/footer.php');?>
</body>
</html>

<?php
    }else {
        header('Location: login.php');
        exit();
    }
?>