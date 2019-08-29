<?php
session_start();
unset($_SESSION['email']);
include("../header.php");

?>
<!DOCTYPE html>
<html>
<head>
	<title>LogOut</title>
	<style type="text/css">
		img {
			width: 1500px;
			height: 600px;
		}
	</style>
</head>
<body>

<h1>You have been successfully logged out!</h1>
<img src="images/logout.gif">
<footer>
	<?php
include("../footer.php");
	?>
	</footer>
</body>
</html>

					
				
