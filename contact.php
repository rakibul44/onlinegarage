<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact Us</title>
	<?php require_once('layouts/header.php'); ?>

<style>
		/* Style inputs with type="text", select elements and textareas */
input[type=text], select, textarea {
  width: 100%; /* Full width */
  padding: 12px; /* Some padding */ 
  border: 1px solid #ccc; /* Gray border */
  border-radius: 4px; /* Rounded borders */
  box-sizing: border-box; /* Make sure that padding and width stays in place */
  margin-top: 6px; /* Add a top margin */
  margin-bottom: 16px; /* Bottom margin */
  resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
}

/* Style the submit button with a specific background color etc */
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  border: none;
  cursor: pointer;
}

/* When moving the mouse over the submit button, add a darker green color */
input[type=submit]:hover {
  background-color: #45a049;
}

/* Add a background color and some padding around the form */

</style>
</head>
<body>

    <!-- navbar-start -->
    <?php require_once('layouts/navbar.php');?>

	<div class="container" style="background-color:#dfe6e9;">
		<div class="content" style=" text-align: center; padding:60px 0;">
			<h1>Let's Talk About Your Problems</h1>
			<h4>Your Problems Our Solution</h4>
		</div>
	</div>
<div class="container" style="margin-top: 100px;">
	<div class="content" style=" text-align: center;">
		<h3>Say Hello !</h3>
		<h5>Tell Us About Your Problems</h5>
	</div>
  <form action="#">

    <label for="fname">Full Name</label>
    <input type="text" id="fname" name="fullname" placeholder="Your name..">

    <label for="email">Your Email</label>
    <input type="text" id="email" name="email" placeholder="Your Email..">

    <label for="country">Country</label>
    <select id="country" name="country">
      <option value="bangladesh">Bangladesh</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <button class="btn btn-lg btn-warning" name="user_login" type="submit">submit</button>

  </form>
</div>
<!-- footer-area -->
<?php require_once('layouts/footer.php');?>
</body>
</html>