<?php
include("../header.php");
//require_once('phpmailer/PHPMailerAutoload.php');

	$msg = "";

	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'root', '', 'db');

		$email = $con->real_escape_string($_POST['email']);
		$password = $con->real_escape_string($_POST['password']);

		if ($email == "" || $password == "")
			$msg = "Please check your inputs!";
		else {
			$sql = $con->query("SELECT id, password, isEmailConfirmed FROM users WHERE email='$email'");
			if ($sql->num_rows > 0) {
                $data = $sql->fetch_array();
                if (password_verify($password, $data['password'])) {
                    if ($data['isEmailConfirmed'] == 0)
	                    $msg = "Please verify your email!";
                    else {
	                    $msg = "You have been logged in";
                    }
                } else
	                $msg = "Please check your inputs!";
			} else {
				$msg = "Please check your inputs!";
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
    <title>Log In</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<style type="text/css">
		    
.container {
  min-height: 100vh;
  min-width: 100vw;
    background: url(images/rose.jpg);
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

#email{
margin-top: 200px;
}

#password {
	margin-top: 40px;
}
	</style>



</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">

				

				<?php
					if ($msg != ""){
	                    echo "<script>window.location.href = 'welcome.php';</script>";
					}
				?>
				<center>
				<form method="post" action="login.php">
					<input class="form-control" name="email" type="email" placeholder="Email" id="email"><br>
					<input class="form-control" name="password" type="password" placeholder="Password" id="password"><br>
					<input class="btn btn-primary" type="submit" name="submit" value="Log In">
				</form>
				<center><b>No account?</b><br></b><a href="register.php">Create one!</a></center>
				</center>

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