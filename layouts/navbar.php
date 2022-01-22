<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="shop.php" class="nav-link px-2 text-white">Shop</a></li> 
          <li><a href="mechanics.php" class="nav-link px-2 text-white">Mechanics List</a></li>
          <li><a href="register.php" class="nav-link px-2 text-white">Mechanic Register</a></li>
          <li><a href="contact.php" class="nav-link px-2 text-white">Contact</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>

        <div class="text-end">
          <?php
            if(isset($_SESSION['id'])){
              echo('<a class="btn btn-outline-light me-2" href="profile.php">Profile</a>');
              echo('<a class="btn btn-warning" href="inc/api.php?logout=true">Logout</a>');
            }else{
              echo('<a class="btn btn-outline-light me-2" href="login.php">Login</a>');
              echo('<a class="btn btn-warning" href="singup.php">Sign-up</a>');
            }
          ?>
        </div>
      </div>
    </div>
  </header>