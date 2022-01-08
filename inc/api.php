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
}else{
    header("Location: ../index.php");
}
