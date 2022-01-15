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
    <div class="container mt-4">
    

        <h4 class="mt-4 pt-4">Mechanic List</h4>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Mechanic Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1354</th>
                    <td>Hasan Khan</td>
                    <td>100 feet</td>
                    <td>4.6</td>
                    <td>
                        <button class="btn btn-sm btn-outline-info" style="font-color:#000">Profile</button>
                        <button class="btn btn-sm btn-outline-info" style="font-color:#000">Call</button>
                    </td>
                </tr>
            </tbody>
        </table>
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