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
<div id="showerror"></div>
	<div class="content" style=" text-align: center;">
		<h3>Say Hello !</h3>
		<h5>Tell Us About Your Problems</h5>
	</div>
  <form action="inc/api.php" method="POST">

    <label for="fname">Full Name</label>
    <input type="text" id="fname" name="name" placeholder="Your name..">

    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Your Email..">

    <label for="subject">Subject</label>
    <input type="text" id="subject" name="subject" placeholder="Your email subject..">


    <label for="message">Message</label>
    <textarea id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>

    <button class="btn btn-lg btn-warning" name="submit_contact" type="submit">submit</button>

  </form>
</div>
<script>
  // it will help to show backend error
  const queryString = window.location.search;
  // find the error query params and the error data
  const urlParams = new URLSearchParams(queryString);
  const getErrors = urlParams.get('error');
  const getSuccess = urlParams.get('success');

  if(getErrors){
    document.getElementById("showerror").innerHTML = `<div class="alert alert-danger" role="alert"> ${getErrors} </div>`;
  }else if(getSuccess){
    document.getElementById("showerror").innerHTML = `<div class="alert alert-danger" role="alert"> ${getSuccess} </div>`;  }
</script>
<!-- footer-area -->
<?php require_once('layouts/footer.php');?>
</body>
</html>