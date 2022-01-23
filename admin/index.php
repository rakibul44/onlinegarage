<?php
    session_start();
    include_once('../config/config.php');
    if(isset($_SESSION['role']) == "admin") {
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Online Garage</title>
    
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Favicons -->
    
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">
    
    <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }
    
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .counter {
    background-color:#f5f5f5;
    padding: 20px 0;
    border-radius: 5px;
}

.count-title {
    font-size: 40px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
}

.count-text {
    font-size: 13px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
}

.fa-2x {
    margin: 0 auto;
    float: none;
    display: table;
    color: #4ad1e5;
}
    </style>
    
    <!-- Custom styles for this template -->
    <link href="../assets/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
  <?php include_once('layouts/navbar.php'); ?>
  
  <div class="container-fluid">
    <div class="row">
      <?php include_once('layouts/sidebar.php'); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>


		<!-- counter area start -->
      <div class="container mb-4">
    <div class="row">
    </div>
    <div class="row text-center">
        <div class="col">
          <div class="counter">
              <?php
              $sql = "SELECT * FROM orders";
              $result = mysqli_query($conn, $sql);
              $orderCount = mysqli_num_rows($result);
              ?>
              <h2 class="timer count-title count-number"><?php echo($orderCount); ?></h2>
              <p class="count-text ">Service Taken</p>
          </div>
        </div>
        <div class="col">
          <div class="counter">
          <?php
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            $userCount = mysqli_num_rows($result);
            ?>
              <h2 class="timer count-title count-number"><?php echo($userCount); ?></h2>
              <p class="count-text ">Users</p>
          </div>
        </div>
        <div class="col">
          <div class="counter">
          <?php
            $sql = "SELECT * FROM mechanic";
            $result = mysqli_query($conn, $sql);
            $mechanicCount = mysqli_num_rows($result);
            ?>
              <h2 class="timer count-title count-number"><?php echo($mechanicCount); ?></h2>
              <p class="count-text ">Mechanics</p>
          </div>
        </div>
        <div class="col">
          <div class="counter">
          <?php
            $sql = "SELECT * FROM contact";
            $result = mysqli_query($conn, $sql);
            $messageCount = mysqli_num_rows($result);
            ?>
              <h2 class="timer count-title count-number"><?php echo($messageCount); ?></h2>
              <p class="count-text">Message Submitted</p>
          </div>
        </div>
    </div>
  </div>

<!-- counter area end -->

      <div class="table-responsive mt-4">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>text</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
</body>
</html>
<?php
    }else{
      header("Location: login.php");
      exit();
    }
?>