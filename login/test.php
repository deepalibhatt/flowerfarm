
<!DOCTYPE html>
<html>
<head>
	<?php
$msg = "";
if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'root', '', 'db');

		$date = $con->real_escape_string($_POST['flowerdate']);


		if ($date == "") 
			$msg = "Please check your inputs!";
		}
	
else 
	if ($date >= "29-Sep-2018") {
			//$sql = $con->query("SELECT id FROM flower WHERE flower_startDate='$date'");
			//$Date = "29-Sep-2018";
			
			
	$msg = date('d-m-Y', strtotime($Date. ' + 56 days'));
	$msg = date('d-m-Y', strtotime($Date. ' + 730 days'));
	}
	else {
	$msg = "Invalid!";
	}

	?>
	<title>test</title>
</head>
<body>
<input class="form-control" name="date"  value="flowerdate" type="date" placeholder="Flower Start Date"><br>
<input class="btn btn-primary" type="submit" name="submit" value="Submit">
</body>
</html>