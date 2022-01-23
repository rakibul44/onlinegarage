<?php
    session_start();
    include_once('config/config.php');
    if(isset($_SESSION['id'])) {
        $user_id = $_SESSION['id'];
        $sql = "SELECT * FROM users WHERE id='$user_id'";
        $result = mysqli_query($conn, $sql);
        $profile = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($profile['name']); ?> - Profile</title>
    <?php require_once('layouts/header.php'); ?>
</head>
<body>
    <?php require_once('layouts/navbar.php'); ?>
    <div class="container mt-4">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="assets/images/avatar.jpg" style="padding: 10px;" class="img-fluid rounded-start" alt="...">
                </div>
            
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo($profile['name']); ?> </h5>
                        <p class="card-text"> Hello <?php echo($profile['name']); ?>, you have orderd total 30 times and paid 4041 BDT </p>
                        <p class="card-text">Joined <small class="text-muted"> <?php echo($profile['date']); ?> </small></p>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="mt-4 pt-4">Recent Repairs</h4>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Location</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
//            JOIN QUERY ORDER WITH MECHANIC TABLE
            $order_sql = "SELECT * FROM mechanic INNER JOIN orders ON orders.mechanic_id = mechanic.user_id WHERE orders.user_id = $user_id";
            $result = mysqli_query($conn, $order_sql);
            while ($row = mysqli_fetch_array($result)):
            ?>
                <tr>
                    <th scope="row"><?php echo($row['id']); ?> </th>

                    <td><?php echo($row['address']); ?></td>
                    <td>
                        <span class="badge bg-success">4.5</span>
                    </td>
                    <td> <?php echo($row['date']); ?> </td>
                    <td>
<!--                        <button class="btn btn-sm btn-outline-info">VIEW</button>-->
                        <a class="btn btn-sm btn-outline-info" href="callto:<?php echo($row['phone']); ?>">RECALL</a>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <?php require_once('layouts/footer.php');?>
</body>
</html>

<?php
    }else {
        header('Location: index.php');
        exit();
    }
?>