<?php
	include("../header.php");
	require 'PHPMailer/PHPMailerAutoload.php';

	$msg = "";
	// use PHPMailer\PHPMailer\PHPMailer;
	//require_once('PHPMailer/PHPMailerAutoload.php');

	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'root', '', 'db');

		$name = $con->real_escape_string($_POST['name']);
		$email = $con->real_escape_string($_POST['email']);
		$password = $con->real_escape_string($_POST['password']);
		$cPassword = $con->real_escape_string($_POST['cPassword']);

		if ($name == "" || $email == "" || $password != $cPassword)
			$msg = "Please check your inputs!";
		else {
			$sql = $con->query("SELECT id FROM users WHERE email='$email'");
			if ($sql->num_rows > 0) {
				$msg = "Email already exists in the database!";
			} else {
				$token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
				$token = str_shuffle($token);
				$token = substr($token, 0, 10);

				$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

				$con->query("INSERT INTO users (name,email,password,isEmailConfirmed,token)
					VALUES ('$name', '$email', '$hashedPassword', '0', '$token');
				");

               		date_default_timezone_set('Etc/UTC');
					//Create a new PHPMailer instance
					$mail = new PHPMailer;
					//Tell PHPMailer to use SMTP
					$mail->isSMTP();
					//Enable SMTP debugging
					// 0 = off (for production use)
					// 1 = client messages
					// 2 = client and server messages
					$mail->SMTPDebug = 0;
					//Ask for HTML-friendly debug output
					$mail->Debugoutput = 'html';
					//Set the hostname of the mail server
					$mail->Host = 'smtp.gmail.com';
					// use
					// $mail->Host = gethostbyname('smtp.gmail.com');
					// if your network does not support SMTP over IPv6
					//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
					$mail->Port = 587;
					//Set the encryption system to use - ssl (deprecated) or tls
					$mail->SMTPSecure = 'tls';
					//Whether to use SMTP authentication
					$mail->SMTPAuth = true;
					//Username to use for SMTP authentication - use full email address for gmail
					$mail->Username = "bhattdeepali15@gmail.com";
					//Password to use for SMTP authentication
					$mail->Password = "mynameisdeepali";
					//Set who the message is to be sent from
					$mail->setFrom('bhattdeepali15@gmail.com');
					//Set who the message is to be sent to
					$mail->addAddress($email);
					//Set the subject line
					$mail->Subject = 'Verification';
					//Read an HTML message body from an external file, convert referenced images to embedded,
					//convert HTML into a basic plain-text alternative body
					$mail->isHTML(true);   
					$message = "Please click on the link below:<br><br>
                    
                     <a href='http://localhost/flowerfarm/flower/login/confirm.php?email=$email&token=$token'>Click Here</a>";
					$mail->msgHTML( $message );

                if ($mail->send())
                    $msg = "You have been registered! Please verify your email!";
                else
                    $msg = "Something wrong happened! Please try again!";
			}
		}
	}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

	<style type="text/css">
		.container {
  min-height: 100vh;
  min-width: 100vw;
    background: url(images/rose1.jpg);
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
   
    align-items: center;
    justify-content: center;
}
.form-control {
height: 40px;
width: 350px;
opacity: 0.5;
}

#name{
margin-top: 100px;
}
#email{
margin-top: 20px;
}

#password {
	margin-top: 20px;
}
#cpassword{
margin-top: 20px;
}
	</style>
	</style>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">

			

				<?php if ($msg != "") echo $msg . "<br><br>" ?>

				<form method="post" action="register.php">
					<input class="form-control" name="name" placeholder="Name" id="name"><br>
					<input class="form-control" name="email" type="email" placeholder="Email" id="email"><br>
					<input class="form-control" name="password" type="password" placeholder="Password" id="password"><br>
					<input class="form-control" name="cPassword" type="password" placeholder="Confirm Password" id="cPassword"><br>
					<input class="btn btn-primary" type="submit" name="submit" value="Register">
				</form>
				  <center><b>Already registered ?</b> <br></b><a href="login.php">Login here</a></center><!--for centered text-->
			</div>
		</div>
	</div>
	<footer>
	<?php
include("../footer.php");
	?>
	</footer>
</body>
</html>