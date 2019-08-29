<?php
// download fpdf class (http://fpdf.org)
require("fpd/fpdf.php");
// fpdf object
$pdf = new FPDF();
// generate a simple PDF (for more info, see http://fpdf.org/en/tutorial/)
$pdf->AddPage();
$pdf->SetFont("Arial","B",14);
$pdf->Cell(40,10, "this is a pdf example");
// email stuff (change data below)
$to = "sashabrown20@gmail.com"; 
$from = "bhattdeepali15@gmail.com"; 
$subject = "Flower Life Cycle"; 
$message = "<p>Please see the attachment.</p>";
// a random hash will be necessary to send mixed content
$separator = md5(time());
// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;
// attachment name
$filename = "FLC.pdf";
// encode data (puts attachment in proper format)
$pdfdoc = $pdf->Output("Hello", "S");
$attachment = chunk_split(base64_encode($pdfdoc));
// main header (multipart mandatory)
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"".$eol.$eol; 
$headers .= "Content-Transfer-Encoding: 7bit".$eol;
$headers .= "This is a MIME encoded message.".$eol.$eol;
// message
$headers .= "--".$separator.$eol;
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$headers .= $message.$eol.$eol;
// attachment
$headers .= "--".$separator.$eol;
$headers .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
$headers .= "Content-Transfer-Encoding: base64".$eol;
$headers .= "Content-Disposition: attachment".$eol.$eol;
$headers .= $attachment.$eol.$eol;
$headers .= "--".$separator."--";
// send message
mail($to, $subject, '', $from);
?>
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
					 <i>$potential<br/></i>

					 Find below an exclusive article on how to plant and nuture roses : 
					 http://localhost/flowerfarm/login/plant.pdf 

					<b>The message sent by Rossie Flower Farm</b><br/>
					<b> Contact Us on 0733 880880</b><br/>
					<b> You can reply to this email with your problems or email us on bhattdeepali15@gmail.com</b><br/>

					<b>For more information visit our website on: http://localhost/flowerfarm/flower/index.php <b/>
					";

					