<?php
include("header.php");
	require './login/PHPMailer/PHPMailerAutoload.php';

	$msg = "";
	// use PHPMailer\PHPMailer\PHPMailer;
	//require_once('PHPMailer/PHPMailerAutoload.php');

	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'root', '', 'db');

		$name = $con->real_escape_string($_POST['name']);
		$email = $con->real_escape_string($_POST['email']);
		$message = $con->real_escape_string($_POST['message']);

		if ($name == "" || $email == "" || $message== "")
			$msg = "Please check your inputs!";
		else {
			$sql = $con->query("SELECT id FROM contact WHERE email='$email'");
			if ($sql->num_rows >= 0) {
				$msg = "Email sent! We will get back to you as soon as possible";
			} else {
				$token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
				$token = str_shuffle($token);
				$token = substr($token, 0, 10);


				$con->query("INSERT INTO contact (name,email,message)
					VALUES ('$name', '$email', '$message');
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
					$mail->setFrom($email);
					//Set who the message is to be sent to
					$mail->addAddress('bhattdeepali15@gmail.com');
					//Set the subject line
					$mail->Subject = 'User Message';
					//Read an HTML message body from an external file, convert referenced images to embedded,
					//convert HTML into a basic plain-text alternative body
					$mail->isHTML(true);   
					$message = "$message;<br/>
					The message sent by $email;
					";
					$mail->msgHTML( $message );

                if ($mail->send())
                    $msg = "Your Message has been sent! We will get back to you as soon as possible";
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
    <title>Contact Us</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">

			

				<?php if ($msg != "") echo $msg . "<br><br>" ?>

				<form method="post" action="contact.php">
					<input class="form-control" name="name" placeholder="Name"><br>
					<input class="form-control" name="email" type="email" placeholder="Email"><br>
					<input class="form-control" name="message" type="text" placeholder="Message"><br>
					<input class="btn btn-primary" type="submit" name="submit"  value="Submit">
				</form>

			</div>
		</div>
	</div>
</body>
</html>