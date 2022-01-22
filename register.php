<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration</title>
	<?php require_once('layouts/header.php'); ?>
<style>

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=password] ,textarea , input[type=date]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus ,textarea:focus{
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>
  
 <!-- navbar-start -->
 <?php require_once('layouts/navbar.php');?>

<form action="inc/api.php" method="POST">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="fname"><b>Full Name</b></label>
    <input type="text" id="fname" name="name" placeholder="Your full name.." required>

    <label for="phone"><b>Phone Number</b></label>
    <input type="text" placeholder="Enter phone number" name="phone" id="phone" required>

    <div class="form-outline mb-4">
    <label class="form-label" for="form3Example3cg"> <b>Your Email</b> </label>
    <input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg" required>
    </div>

    <div class="form-outline datepicker w-100">
    <label for="birthdayDate" class="form-label"> <b>Birthday</b> </label>
    <input type="date" name="birthdate" class="form-control form-control-lg" id="birthdayDate"/>
    </div>

    <label for="message"> <b>Work skills</b> </label>
    <textarea id="message" name="skills" placeholder="Write about your work skills..." style="height:200px" required></textarea>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="psw" required>

    <label for="postcode"><b>Post Code</b></label>
    <input type="number" placeholder="1200" name="postcode" id="postcode" required>
    <br> <br>
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="password-repeat" id="psw-repeat" required>
    <!-- <p><b>Please upload your photo</b></p>

    <div class="input-group mb-3">
      <label class="input-group-text" for="inputGroupFile01"> <b>Upload</b> </label>
      <input type="file" class="form-control" id="inputGroupFile01" required>
    </div>
    <div class="small text-muted mt-2">Upload your photo . Max file size 5 MB</div> -->
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" name="apply_as_mechanic" class="registerbtn">Register</button>
  </div>
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Log-in</a>.</p>
  </div>
</form>

<!-- footer-area -->
<?php require_once('layouts/footer.php');?>
</body>
</html>
