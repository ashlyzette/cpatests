<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'includes/phpMailer/src/Exception.php';
    require 'includes/phpMailer/src/PHPMailer.php';
    require 'includes/phpMailer/src/SMTP.php';
    include_once 'config/config.php';

    if (isset($_GET['token'])){
        $token = $_GET['token'];
        $verify_obj =mysqli_query($con,"SELECT token, verified, date_verified FROM users WHERE token = '$token'");
        if($verify = mysqli_fetch_array($verify)){
            mysqli_query($con,"UPDATE users SET verified ='yes' WHERE token = '$token'");
            $msg = 'success';
        } else {
            $msg = 'failed';
        }
    }
    if (isset ($_POST['submit'])){
        $email = $_POST['email'];
        $query = mysli_query($con, "SELECT email, token FROM users WHERE email ='$email'");
        $row = mysqli_num_rows($query);
        if ($row >0) {
            $err = '';
            $token = $row['token'];
            $mail = new PHPMailer;
            //Send Email Verification to user
			$mail->isSMTP();                                     	// Set mailer to use SMTP
			$mail->Host = 'mail.amigoha.com;mail.amigoha.com';  	// Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               	// Enable SMTP authentication
			$mail->Username = 'info@amigoha.com';                 	// SMTP username
			$mail->Password = '3nM&l*27AlBRpiwf';                   // SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
			$mail->PORT = 587;
	
			//Recepients
			$mail->setFrom('info@amigoha.com','The Amigoha Team');
			$mail->addAddress($email);
			$mail->isHTML(true);
			$mail->Subject = "USC Student Chronicles Email Verification";
			$mail->Body = "<table width='580' lass='deviceWidth' border='0' cellpadding='0' cellspacing='0' align='center' bgcolor='#ffffff' style='border-collapse: collapse; margin: 0 auto; font-family: Open Sans, sans-serif; font-weight:100; font-size:16px; text-align:center;'> 
							<tbody>
								<tr>
									<td valign='top' align='center' style='padding:0;' bgcolor='#ffffff'>
										<h3> Welcome to <a href = 'https://amigoha.com/' >Amigoha</a></h3>
									</td>
								</tr>
								<tr>
									<td width='100%' valign='top' bgcolor='#ffffff' style='padding-top:20px;'>
										<p>Hi, thank you for registering to <a href = 'http://cpareview.amigoha.com/'> USC Student Chronicles </a>
										</p> 
										<p> You now have access to the comprehensive test bank to help you with your studies. </p>
										<p>	Our test banks are updated regularly by your beloved teachers. </p>
										<p> New questions are uploaded from time to time to help you prepare in your exams. </p>
										<p>	To complete your account sign-up, please click on the button below to confirm your email: </p> 
										<p> 
											<a href = '" . 'http://cpareview.amigoha.com/verification.php?token=' . $token . "' 
											style='padding:10px;width:300px;
											display:block;
											text-decoration:none;
											border:1px solid #FF6C37;
											text-align:center;
											font-weight:bold;
											font-size:14px;
											color:#ffffff;
											background-color:#FF6C37;
											border-radius:5px;
											line-height:17px;
											margin:0 auto;'> 
												Confirm Email 
											</a> 
										</p> 
									</td>
								</tr>
								<tr>
									<td width='100%' valign='top' bgcolor='#ffffff' style='padding-top:20px; font-size:12px;'>
										<p> Note: If you didn't sign up with <a href = 'http://cpareview.amigoha.com/'> USC Student Chronicles</a>, there is no further action required from your end.</p>
									</td>
								</tr>
							</tbody>
						</table>";
			$mail->send();
        } else {
            $err = 'Email Failed';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/verification.css">
    <title>USC Student Chronicles Validation</title>
</head>
<body>
    <!-- Load menu -->
    <?php 
        include_once ("includes/standard/menu.php");
        if ($msg == 'success'){
            echo "<div class='container verification_message'>
                    <h3> Authentication successful </h3>
                    <p> You may now login and have full access to our test banks.</p>
                    <p> Your subsciption will end after the end of the semester. </p>
                </div>";
            
        } else {
            echo "<div class='container verification_message'>
                    <h3> Authentication Failed </h3>
                    <p> Your email verification failed, please make sure you have the correct link from your email.</p>
                    <form method = 'POST'>
                        <input type = 'text' name ='email' placeholder = 'enter registered email' required/>
                        <input type ='submit' class = 'btn btn-primary btn-sm' name ='submit' vallue = 'Send Email Verification'/>
                    </form>
                </div>";
        }
        if ($err == 'Email Failed'){
                echo "<div id ='err_email'> Email not found, please make sure you entered the registered email address </div>";
        }
    ?>
</body>
</html>