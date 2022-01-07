<?php
include_once('../config/config.php');

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
}else{
    header("Location: ../index.php");
}
