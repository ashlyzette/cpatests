<?php
    $err_message='';
    if(isset($_POST['login'])){
        //Sanitize email then save email session
        $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $_SESSION['email'] = $email;
        $login_obj = mysqli_query($con, "SELECT first_name, email, password, verified FROM users WHERE email = '$email'");
        if ($login = mysqli_fetch_array($login_obj)){
            $verify = password_verify($_POST['password'],$login['password']);
            if ($verify){
                if ($login['verified'] == 'yes'){
                    $_SESSION['user']= $login['first_name'];
                    header("Location: index.php");
                    exit();
                } else {
                    $err_message = "Please verify your email address to gain access to test banks";
                }
            } else  {
                $err_message =  "Incorrect email and password, please try again!";
            }
        } else {
            $err_message =  "Email address not found, please try again!";
        }
    }
?>