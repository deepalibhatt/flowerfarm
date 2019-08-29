<?php
//session_start();

$_SESSION['email'] = "Welcome";

if(!$_SESSION['email'])
{
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.
}else{
	$_SESSION['email'];// session
}

?>
<?php
	include("../header.php");
	require 'PHPMailer/PHPMailerAutoload.php';// from phpmailer

	$msg = "";

	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'root', '', 'db');//db connect
//submit from input types
		$flowername = $con->real_escape_string($_POST['flowername']);
		$flowertype = $con->real_escape_string($_POST['flowertype']);
		$flowerdate = $con->real_escape_string($_POST['flowerdate']);
		$flowerdetails = $con->real_escape_string($_POST['flowerdetails']);
		$email = $con->real_escape_string($_POST['email']);

		// flower life cycle
		//how long seed takes to germinate
		$seed = date('d-m-Y', strtotime($flowerdate. ' + 56 days'));
		//young flower, also fertilize it
		$fertilze1 = date('d-m-Y', strtotime($seed. ' + 40 days'));
		//leaves, shoot and bud growing also fertilize it
		$growth = date('d-m-Y', strtotime($fertilze1. ' + 122 days'));
		//ready to harvest
		$potential = date('d-m-Y', strtotime($growth. ' + 548 days'));



		//if empty
		if ($flowername == "" || $flowertype == "" || $flowerdate =="" || $flowerdetails == "" || $flowerdate =="" || $email =="")
			$msg = "Please check your inputs!";
		else {
			//row check
			$sql = $con->query("SELECT flower_id FROM flower WHERE email='$email'");
			if ($sql->num_rows == 0) {
				$msg = "Sent!";
			} else {

			//tokens
				$token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
				$token = str_shuffle($token);
				$token = substr($token, 0, 10);
			// saves to db
				$con->query("INSERT INTO flower (flower_name,flower_type,flower_startDate,	flower_details,email)
					VALUES ('$flowername', '$flowertype', '$flowerdate', '$flowerdetails', '$email');
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
					$mail->Subject = '	Flower Life Cycle';
					//Read an HTML message body from an external file, convert referenced images to embedded,
					//convert HTML into a basic plain-text alternative body
					$mail->isHTML(true);   
					//email sent to user
					$message = "
					The following is the life cycle of your roses:
					<b><ul>Your Start Date for planting the rose was on:</b></ul
					<br/>
					<i>$flowerdate<br/></i>
					Seed takes up to 12 weeks to mature. See date below: <br/>
					<i>$seed<br/></i>
					Young flower also fertilize it<br/>
					<i>$fertilze1<br/></i>
					Leaves, shoot and bud growing also fertilize it<br/>
					<i>$growth<br/></i>
					During the date below, one should have fertilzed the flower and natured it to its full potential: <br/>
					 <i>$potential<br/></i><br/>

					 Below is all the information you need regarding your rose flower:<br/>

					<b><ul>Your Start Date for planting the rose was on:</b></ul><br/>
					<i>$flowerdate<br/></i>
					Rose bushes come in a variety of forms, from climbing roses to miniature rose
					plants, blooming mainly in early summer and fall. One way to group roses into
					classes is according to their date of introduction:<br/>
					<b>• Old roses—also called “old-fashioned roses” and “heirloom roses”—</b>are
					those introduced prior to 1867. These are the lush, invariably fragrant roses
					found in old masters’ paintings. There are hundreds of old rose varieties—
					whose hardiness varies—providing choices for both warm and mild climates.<br/>
					<b>• Modern hybrid roses</b> introduced after 1867, are sturdy, long-blooming,
					extremely hardy and disease-resistant, and bred for color, shape, size, and
					fragrance. The hybrid tea roses, with one large flower on a long cutting
					stem, are one of the most popular hybrids.<br/>
					<b>• Species, or wild roses-</b> are those that have been growing wild for many
					thousands of years. These wild roses have been adapted to modern gardens
					and usually bloom from spring to early summer. Most species roses have
					single blossoms. <br/>

					<b>Preparing the Soil</b><br/>
					• Roses prefer a near-neutral pH range of 5.5–7.0. A pH of 6.5 is just about right
					for most home gardens (slightly acidic to neutral).<br/>
					• An accurate soil test will tell you where your pH currently stands. Acidic (sour)
					soil is counteracted by applying finely ground limestone, and alkaline (sweet)
					soil is treated with ground sulfur. Learn more about soil amendments.<br/>

					<b>How to plant the Rose:</b><br/>
			* Before planting, dig the soil over about two spades deep and loosen it thoroughly<br/>
			* Remove larger stones and weeds<br/>
			* Dig a plant whole which is about 40 cm deep and wide<br/>
			* Loosen the excavated soil with peat, humus or rose compost<br/>
			* For better aeration, mix some gravel<br/>
			* Do not add fertilizer or compost, this could burn the roots<br/>
			* When planting, the grafting position should be placed 5 cm below the surface of the soil
			* Fill with excavation<br/>
			* Move the plants gently back and forth when doing this to avoid cavities<br/>
			* Compress the earth carefully and water well<br/>
			* A pouring edge helps with watering<br/>


					<b><ul>Seed takes up to 12 weeks to mature. See date below:</b></ul> <br/>
					<i>$seed<br/></i>
					
					WATERING ROSES<br/>
					Watering is arguably the most important aspect of growing any plant. The right amount of watering will promote a healthy shrub that will flower over a long period.<br/>

					<b>How much water?</b><br/>

					As a guide, we recommend watering the following amount per rose each time you water:<br/>
					*Shrub roses – 5 litres<br/>
					*Climbing roses – 10 litres<br/>
					*Rambling roses – 10 litres<br/>
					*Standard roses – 10 litres<br/>
					*Roses in pots – 5 litres<br/>

					<b>Seasons:</b>
					The need for watering varies greatly throughout the year and is directly related to the amount of rain that has fallen and will depend on the region where you live.<br/>

					We suggest the following:<br/>

					October – February: Ensure that the soil is never allowed to dry out completely, especially in Mediterranean climates for example.<br/>
					March – May: Watch out for particularly prolonged dry spells of two weeks or more, particularly if the weather is warm. Newly planted roses – water every two or three days. Established roses – water once a week.<br/>
					June – September: Established roses – water once a week. As your rose starts blooming, take note if your flowers are wilting. This will happen in extreme heat but is a reliable sign that your roses need more water. Newly planted roses – water every other day.<br/>

					WHAT YOU NEED<br/>
					The best way to water is with a watering can, so that you can see how much water you are using. If you have a lot of roses, then a hose with a rose attachment is more practical.<br/>

					HOW TO WATER<br/>
					It is best to water as close to base of the rose as you can. If the water is starting to flow away from the base, stop for a moment to allow the water to soak in, then continue. Don’t water over the flowers or foliage. Watering foliage can encourage disease problems, particularly if it remains on the leaves overnight. We recommend a softer spray rather than a fierce deluge from a jet spray or pressure hose. If using a hose, try to get a fitting that has a rose setting. If you haven’t got a special fitting, make sure the pressure is not too high on your hose.<br/>

					Roses or situations that require extra attention:<br/>
					*Newly planted roses.<br/>
					*Climbing Roses planted against walls due to the dry nature of the soil in that location.<br/>
					*Roses planted in sandy soil and chalky soil<br/>
					*Roses planted in a pot or container.<br/>


					<b><ul>Young flower also fertilize it</b></ul><br/>
					<i>$fertilze1<br/></i>
					Roses can survive without being fertilized, but they struggle. There are exceptions to this rule: 
						Species or near-species roses that are used to growing in the wild and have adapted to neglect.
						Selections like Rosa Mundi, Rosa glauca, or the Hybrid Rugosas; larger ramblers like ‘Darlow’s Enigma’ and ‘Paul’s Himalayan Musk’ can also fend for themselves. These varieties tend to be once-blooming, but are good choices for rose gardeners that don’t have the time or inclination to fertilize. But, anyone trying to grow repeat-blooming roses, like hybrid teas and floribundas, should fertilize regularly during the growing season<br/>

					  	<b>When to Fertilize</b><br/>
				1. The rule of thumb for granular fertilizer is every 4-6 weeks during the growing season.<br/>
				2. Begin fertilizing when you have 4 to 6 inches of new growth, and can see the first real leaflet with 5 to 7 leaves. Actual weather condition, not a specific date, is what matters. Potential risk of spring frost damage is outweighed by the fact that your roses are hungry.<br/>
				3. Stop fertilizing 8 weeks before you typically get a frost, if you live in a colder winter climate. This will allow any tender new growth to harden off, thereby reducing frost damage.<br/>
				4.Fine-tune your applications for optimum rose health. Liquid fertilizers are more immediately available to the plant and can be used as a rescue treatment for plants with serious deficiencies. This includes foliar fertilizers that are quickly absorbed when sprayed on the leaves.<br/>
				5. Apply fertilizers with little or no nitrogen content later into fall. This includes bone meal or rock phosphate, which helps promote root growth and next year’s blooms.<br/>

				Useful Links<br/>
			Homemade Rose Fertilizer recipe: www.dianeseeds.com/gardening/fertilizer.html<br/>
			Suggested Nutrient Levels for Growing Roses: www.ipm.ucdavis.edu/PMG/PESTNOTES/pn7465.html<br/>


			Have a look at our fertilization articles on this page below:<br/>
			http://localhost/flowerfarm/flower/articles.php<br/>

					<b><ul>Leaves, shoot and bud growing </b></ul><br/>
					<i>$growth<br/></i>
					 Even though you usually do not plant roses in summer, tub roses can be planted then. Because of their
					 taproots the pot should have a diameter of at least 35 cm and be about 40 cm high. Besides that, you
					 should mind a drainage of lava granulate or expanded clay. Special rose earth is used as a substrate.
					 After the rose is planted, pour it with water and place the tub at its intended location.

					<b><ul>During the date below, one should have fertilzed the flower and natured it to its full potential:</b></ul> <br/>
					 <i>$potential<br/></i>
					By mid-August the summer trimming is done on often flowering bed roses, climbing roses, shrubs and hybrid teas. First of all you select all the faded shoots that are healthy and strong and have grown well after the spring trimming. When trimming the roses in summer, five-leaves and three-leaves play an important role.<br/>
					A five-leaf can be found above two-thirds of the height of the flower stalks in strong varieties. Sprouts growing above a five-leaf are a lot stronger than those that grow above a three-leaf. The selected shoots are cut back to 1-2 cm above this five-leaf. In the following weeks new shoots will grow in the leaf axils and the rose will flower even more splendid.<br/>

					 Find below the link to know more information about fertilizers and their suppliers :<br/> 
					 http://localhost/flowerfarm/login/plant.pdf <br/>

					 Find below an exclusive article on how to plant and nuture roses : <br/>
					 http://localhost/flowerfarm/login/plant.pdf <br/>

					<b>The message sent by Rossie Flower Farm</b><br/>
					<b> Contact Us on 0733 880880</b><br/>
					<b> You can reply to this email with your problems or email us on bhattdeepali15@gmail.com</b><br/>

					<b>For more information visit our website on: http://localhost/flowerfarm/flower/index.php <b/>
					";
					$mail->msgHTML( $message );

                if ($mail->send())
                    $msg = "Your Results have been emailed to you!";
                else
                    $msg = "Something wrong happened! Please try again!";
			}
		}
	}
?>


<html>
<head>

    <title>
        Flower Farm
    </title>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<style type="text/css">
		
		h5 {
			text-align: left;
        margin: 1em 0 0.5em 0;
    color: blue;
    font-weight: normal;
    font-family: 'Ultra', sans-serif;
    font-size: 20px;
    line-height: 42px;
    text-shadow: 0 2px black, 0 3px #777;
}
h6 {
	color: black;
	font-weight: normal;
    font-family: 'Ultra', sans-serif;
    font-size: 20px;
}

.container {
 min-height: 100vh;
  min-width: 100vw;
    background: url(images/form.jpeg);
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    align-items: center;
    justify-content: center;

}
.form-control {
opacity: 0.5;
color: black;
	font-weight: normal;
    font-family: 'Ultra', sans-serif;
    font-size: 20px;

}

	</style>


</head>

<body>
<?php
echo $_SESSION['email'];
?>

	<div class="container" style="margin-top: 0px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">

			

				<?php if ($msg != "") echo $msg . "<br><br>" ?>

				<form method="post" action="welcome.php">
					<h5>Flower Name</h5>
					<input class="form-control" name="flowername" type="text" placeholder="Flower Name"><br>
					<h5>Flower Type</h5>
					<input class="form-control" name="flowertype" type="text" placeholder="Flower Type i.e should be the colour"><br>
					<h5>Flower Start Date</h5>
					<input class="form-control" name="flowerdate" type="date" placeholder="Flower Start Date"><br>
					<h5>Flower Details</h5>
					<input class="form-control" name="flowerdetails" type="text" placeholder="Flower Details i.e input the conditions of the flower"><br>
					<h5>Your Email</h5>
					<input class="form-control" name="email" type="email" placeholder="Email"><br>
					<input class="btn btn-primary" type="submit" name="submit"  value="Submit">
				</form>
		<h6><b>To see previous results please check your email</b></h6>
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

