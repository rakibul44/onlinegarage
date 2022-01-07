<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once('layouts/header.php'); ?>
</head>
<body>
    <?php require_once('layouts/navbar.php'); ?>
    <div class="container mt-4">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="assets/images/avatar.jpg" class="img-fluid rounded-start" alt="...">
                </div>
            
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Rakibul Ahsan</h5>
                        <p class="card-text"> Hello I'm rakibul ahsan, full stack web developer! </p>
                        <p class="card-text">Joined <small class="text-muted">2 January 2022 08:40 PM</small></p>
                    </div>
                </div>
            </div>
        </div>

        <h4 class="mt-4 pt-4">Recent Repairs</h4>
        
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Mechanic Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1354</th>
                    <td>Abid Hasan</td>
                    <td>100 feet</td>
                    <td>
                        <span class="badge bg-success">Completed</span>
                    </td>
                    <td>1 January 2022, 3:10PM</td>
                    <td>
                        <button class="btn btn-sm btn-outline-info">VIEW</button>
                        <button class="btn btn-sm btn-outline-info">RECALL</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php require_once('layouts/footer.php');?>
</body>
</html>