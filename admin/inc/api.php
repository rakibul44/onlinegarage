<?php
include_once('../../config/config.php');
session_start();
if(isset($_POST['admin_login'])){
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
                if($row['role'] == "admin"){
                    $checkPwd = password_verify($pwd, $row['password']);
                    if ($checkPwd == false) {
                        # password did not mathced
                        header("Location: ../login.php?error=Password Error");
                        exit();
                    }elseif ($checkPwd == true) {
                        # password matched now session start
                        $_SESSION['role'] = $row['role'];
                        $_SESSION['id'] = $row['id'];
                        
                        //session start succssfully thats mean user logged in
                        header("Location: ../index.php");
                        exit();
                    }
                }else{
                    header("Location: ../login.php?error=Admin Access Only");
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
    echo('NO VALID REQUEST');
}