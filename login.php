<?php 
    session_start();
    if(isset($_SESSION['id'])){
      header('Location: profile.php');
      exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php require_once('layouts/header.php'); ?>
    <style>
        
.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>
</head>
<body>
  <?php require_once('layouts/navbar.php'); ?>

  <main class="form-signin container mt-4 pt-4">
    <form class="text-center" method="POST" action="inc/api.php">
      <img class="mb-4 img-fluid" src="assets/images/avatar.jpg" alt="" style="height: auto; width: 120px">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <div id="showerror"></div>

      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" name="pwd" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" name="user_login" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  </form>
</main>
<script>
  // it will help to show backend error
  const queryString = window.location.search;
  // find the error query params and the error data
  const urlParams = new URLSearchParams(queryString);
  const getErrors = urlParams.get('error');
  if(getErrors){
    document.getElementById("showerror").innerHTML = `<div class="alert alert-danger" role="alert"> ${getErrors} </div>`;
  }
</script>
</body>
</html>