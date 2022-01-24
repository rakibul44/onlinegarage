<?php
session_start();
include_once('config/config.php');

if(isset($_GET['mechanic_id'])){
    if(!isset($_SESSION["id"])){
        header("Location: login.php");
    }
    $mechanic_id = mysqli_escape_string($conn, $_GET['mechanic_id']);

    $sql = "SELECT * FROM users WHERE id=$mechanic_id";
    $result = mysqli_query($conn, $sql);
    $rowCheck = mysqli_num_rows($result);
    if($rowCheck < 1){
        header("Location: mechanics.php?error=User Not Found");
    }else{
        $user = mysqli_fetch_assoc($result);
        if($user['role'] == "mechanic"){
            // execute the order page
            ?>
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
                <input type="text" name="user_id" value="<?php echo($_SESSION['id']); ?>" style="display: none">
                <input type="text" name="mechanic_id" value="<?php echo($_GET["mechanic_id"]); ?>" style="display: none">
                <div class="container">
                    <h1>Place Order</h1>
                    <p>Please check out the info and place the order</p>
                    <hr>
                    <div class="container" id="viewclientmap">
                    </div>
                    <input type="text" id="latitude" name="latitude" style="display: none">

                    <input type="text" name="longitude" id="longitude" style="display: none" >

                    <div class="form-outline mb-4">
                        <label class="form-label" for="location"> <b>Location</b> </label>
                        <input type="text" id="location" name="location" class="form-control form-control-lg" required>
                    </div>
                    <hr>
                    <button type="submit" name="order_button" class="registerbtn">Place Order</button>
                </div>
                </div>
            </form>

            <!-- footer-area -->
            <?php require_once('layouts/footer.php');?>
            </body>

            <script>
                // map fetching js
                const map = document.getElementById("viewclientmap");
                function getLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition);
                    } else {
                        alert("Geolocation is not supported by this browser.");
                    }
                }

                function showPosition(position){
                    document.getElementById("latitude").value = position.coords.latitude;
                    document.getElementById("longitude").value = position.coords.latitude;
                    map.innerHTML = `<iframe style="border: 0; width: 100%; height: 400px" loading="lazy" allowfullscreen
                    src="https://maps.google.com/maps?key=AIzaSyBQ_3Ab9HTgR5CUeB6Sgj6TI_JAbikBT14&q=${position.coords.latitude},${position.coords.longitude}&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0">
                    </iframe>`;
                    // map-api
                    fetch(`https://api.opencagedata.com/geocode/v1/json?key=6459f6deae0442dc8f1e101ea197c290&q=${position.coords.latitude}+${position.coords.longitude}&pretty=1&no_annotations=1`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById("location").value = data.results[0].formatted;
                        })
                        .catch(err => console.error(err));
                }
                getLocation();
            </script>
            </html>

            <?php
        }else{
            header("Location: index.php?error=Something Wrong");
        }
    }
}