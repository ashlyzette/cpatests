<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'includes/phpMailer/src/Exception.php';
    require 'includes/phpMailer/src/PHPMailer.php';
    require 'includes/phpMailer/src/SMTP.php';

	$error_array = array();
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	if (isset($_POST['submit'])){	
        $mail = new PHPMailer;
		//Assign variables and clean up - check len characters - store session
		$fname = $_POST['reg_fname'];
		$fname = ucfirst(strtolower($fname));
		echo $fname;
		if (strlen($fname) > 25 || strlen($fname)<2) {
			array_push($error_array,"First name must be between 2 to 25 characters<br/>");
		}
		$_SESSION['reg_fname']= $fname;

		$lname = $_POST['reg_lname'];
		$lname = ucfirst(strtolower($lname));
		if (strlen($lname) > 25 || strlen($lname)<2) {
			array_push($error_array,"Last name must be between 2 to 25 characters<br/>");
		}
		$_SESSION['reg_lname']= $lname;


		$email = $_POST['reg_email'];
		$_SESSION['reg_email']= $email;
        
        $token = bin2hex(openssl_random_pseudo_bytes(16));

        //Send Email Verification to user
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.amigoha.com;mail.amigoha.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'info@amigoha.com';                 // SMTP username
        $mail->Password = '3nM&l*27AlBRpiwf';                           // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
        $mail->PORT = 587;

        //Recepients
        $mail->setFrom('info@amigoha.com','The Amigoha Team');
        $mail->addAddress($email,$fname . ' ' . $lname);
        $mail->isHTML(true);
        $mail->Subject = "USC Student Chronicles Email Verification";
		$mail->Body = "<table width='580' lass='deviceWidth' border='0' cellpadding='0' cellspacing='0' align='center' bgcolor='#ffffff' style='border-collapse: collapse; margin: 0 auto; font-family: Open Sans, sans-serif; font-weight:100; font-size:16px'> 
						<tbody>
							<tr>
								<td valign='top' align='center' style='padding:0;' bgcolor='#ffffff'>
									<h3> Welcome to <a href = 'https://amigoha.com/' >Amigoha</a></h3>
								</td>
							</tr>
							<tr>
								<td width='100%' valign='top' bgcolor='#ffffff' style='padding-top:20px;'>
									<p>Hi " . $fname . ", thank you for registering to <a href = 'http://cpareview.amigoha.com/'> USC Student Chronicles </a>
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
        echo ("An activation code is sent to your email. Please check your email including your junk mail.");

		// $email2 = $_POST['reg_email2'];
		// $_SESSION['reg_email2']= $email2;

		// //Check if emails are identical - correct email format - already in use
		// if ($email == $email2){
		// 	if (filter_var($email,FILTER_VALIDATE_EMAIL)){
		// 		$email = filter_var($email,FILTER_VALIDATE_EMAIL);
		// 		$query = mysqli_query($con, "SELECT email FROM users WHERE email = '$email'");
		// 		$numRows = mysqli_num_rows($query);
		// 		if ($numRows > 0){
		// 			array_push($error_array,"Email already in use<br/>");	
		// 	}
		// 	} else {
		// 		array_push($error_array,"Invalid email format<br/>");
		// 	}
		// } else {
		// 	array_push($error_array,"Emails do not match<br/>");	
		// }

		// $username = $_POST['reg_username'];
		// $username = str_replace(' ','', $username);
		// $_SESSION['reg_username'] = $username;

		// //Check if username already exist
		// $query = mysqli_query($con, "SELECT username FROM amigo WHERE username = '$username'");
		// $numRows = mysqli_num_rows($query);
		// if ($numRows>0){
		// 	array_push($error_array,"Username already in use<br/>");

		// }

		// //Check password length
		// $pass = $_POST['reg_password'];
		// if (strlen($pass)>25 || strlen($pass<8)){
		// 	array_push($error_array, "Password must be between 8 to 25 characters<br/>");
		// }
		// $pass2 = $_POST['reg_password2'];

		// //Check password if the same
		// if ($pass != $pass2){
		// 	array_push($error_array, "Password does not match<br/>");
		// } else {
		// 	//Check password requirements
		// 	if (preg_match('/[^A-Za-z0-9]/',$pass)){
		// 		array_push($error_array,"Your password muct only contain english characters of numbers<br/>");
		// 	}
		// }

		// //Create password hash
		// $pass = password_hash($pass, PASSWORD_DEFAULT,['cost' =>12]);

        // //Create token for email verification
        // $token = bin2hex(openssl_random_pseudo_bytes(16));

		// $gender = $_POST['reg_gender'];
		// switch ($gender) {
		// 	case 'm':
		// 		$profilePics = "assets/images/profile_pics/defaults/male.png";
		// 		break;
		// 	case 'f':
		// 		$profilePics = "assets/images/profile_pics/defaults/female.png";
		// 		break;
		// 	case 'l':
		// 		$profilePics = "assets/images/profile_pics/defaults/lgbtqai.png";
		// 		break;
		// 	default:
		// 		# code...
		// 		break;
		// }

		// //Assign variables manually
		// $status = "online";
		// $account ="active";
		// $sDate = Date("Y-m-d");
		// $banner = "assets/images/banners/default.png";
		
		// //If no error save to database
		// if (empty($error_array)){
		// 	$query = mysqli_query($con, "INSERT INTO amigo VALUES (NULL,'$fname','$lname','$email','$username','$pass','$gender','$profilePics','$status','$account','0','0',',','$sDate','$banner','$sDate')");
		// 	array_push($error_array,"Succefully registered. Continue to login<br/>");

            


		// 	//Clear session variables
		// 	$_SESSION['reg_fname']="";
		// 	$_SESSION['reg_lname'] = "";
		// 	$_SESSION['username'] = "";
		// 	$_SESSION['reg_email'] = "";
		// 	$_SESSION['reg_email2'] = "";
		// 	$_SESSION['reg_password'] = "";
		// 	$_SESSION['reg_password2'] = "";
		// 	$_SESSION['reg_gender'] = "";
		// }
	}
?>