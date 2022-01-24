<?php
include_once('../config/config.php');
session_start();

if(isset($_POST['create_account'])){
    # for security reason only
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    // error handeller start
    
    //if there any emty fields it will return sign up page again
    if (empty($name) || empty($email) || empty($pwd)) {
        // here is something empty that's why we are sending user to sign up page again
        header("Location: ../singup.php?error=All Fields Required");
        exit();
    }else{
        // database row number check
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $rowCheck = mysqli_num_rows($result);
        
        # we got the row numbers, if the row is getter then 0 that's mean it already used 
        # beacuse we need empty with is not use before
        if ($rowCheck > 0) {
            // we got more then 0 row thats why returning to sign up page
            header("Location: ../singup.php?error=Already Exist");
            exit();
        }else{
            // we have the plain text password now hash it
            $hasedPwd = password_hash($pwd, PASSWORD_DEFAULT);
             // sub-query
            //now we can insert into the data into the database
            $sql = "INSERT INTO users (name, email, role, password) VALUES ('$name', '$email', 'user', '$hasedPwd');";
            
            //query the data into database
            mysqli_query($conn, $sql);
            //return to the login page
            header("Location: ../login.php");
            exit();
        }
    }
}else if(isset($_POST['user_login'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //error handeller start here

    //if input data empty retun to the login page again
    if (empty($email) || empty($pwd)) {
        # data is empty that's why sending to login page again
        header("Location: ../login.php?error=All Fields Required");
        exit();
    }else{
        // search the users phone or email for veryfing login
        $sql = "SELECT * FROM users WHERE email='$email'";

        // get the all users data
        $result = mysqli_query($conn, $sql);

        //now we fetch the rows
        $rowCheck = mysqli_num_rows($result);

        // we got the row, now if there is more then 0 rows that's mean it have 1 user otherwise don't have
        if ($rowCheck < 1) {
            // we don't have any users
            header("Location: ../login.php?error=User Not Found");
            exit();
        }else{
            if($row = mysqli_fetch_assoc($result)) {
                // now we check the password
                $checkPwd = password_verify($pwd, $row['password']);
                if ($checkPwd == false) {
                    # password did not mathced
                    header("Location: ../login.php?error=Password Error");
                    exit();
                }elseif ($checkPwd == true) {
                # password matched now session start
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['role'] = $orw['role'];

                    //session start succssfully thats mean user logged in
                    header("Location: ../profile.php");
                    exit();
                }
            }
        }
    }
}else if(isset($_GET['logout'])){
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
}else if(isset($_POST['submit_contact'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if(empty($name) || empty($email) || empty($subject) || empty($message)){
        header('Location: ../contact.php?error=All Fields Are Required');
        exit();
    }else{
         // sub-query
        $sql = "INSERT INTO `contact` (`name`, `email`, `subject`, `message`) VALUES ('$name', '$email', '$subject', '$message')";
        if(mysqli_query($conn, $sql)){
            header('Location: ../contact.php?success=Message Sent');
        }else{
            header('Location: ../contact.php?error=Database Service Error');
        }
    }
}else if(isset($_POST['apply_as_mechanic'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $birth_date = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $skill = mysqli_real_escape_string($conn, $_POST['skills']);
    $post_code = mysqli_real_escape_string($conn, $_POST['postcode']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    if(empty($name) || empty($phone) || empty($skill) || empty($post_code) || empty($password)){
        header("Location: ../register.php?error=All Fields Required");
        exit();
    }else{
        $hasedPwd = password_hash($password, PASSWORD_DEFAULT);
         // sub-query
        $sql = "INSERT INTO `mechanic_requests` (`name`, `phone`, `email`, `borth_date`, `skill`, `password`, `post_code`) VALUES ('$name', '$phone', '$email', '$birth_date', '$skill', '$hasedPwd', '$post_code');";
        if(mysqli_query($conn, $sql)){
            header("Location: ../index.php?success=Form Submitted");
        }else{
            header("Location: ../register.php?error=DB Error");
        }
    }
}else if(isset($_POST['order_button'])){
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $mechanic_id = mysqli_real_escape_string($conn, $_POST["mechanic_id"]);
    $latitude = mysqli_real_escape_string($conn, $_POST['latitude']);
    $longitude = mysqli_real_escape_string($conn, $_POST['longitude']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);

    if(empty($user_id) || empty($latitude) || empty($longitude) || empty($location)){
        header("Location: ../index.php?mechanics.php?error=All Fields Required");
        exit();
    }else{
         // sub-query
        $sql = "INSERT INTO `orders` (`user_id`, `mechanic_id`, `c_latitude`, `c_longitude`, `address`, `status`) VALUES ('$user_id', '$mechanic_id', '$latitude', '$longitude', '$location', 'pending')";
        if(mysqli_query($conn, $sql)){
            header("Location: ../profile.php");
        }else{
            header("Location: ../index.php?mechanics.php?error=Something Error");
            exit();
        }
    }
} else{
    header("Location: ../index.php");
    exit();
}
