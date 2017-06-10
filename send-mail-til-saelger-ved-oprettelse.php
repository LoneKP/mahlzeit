<?php

header('Content-type: application/json; charset=UTF-8');
   
	
		$bestillinglukker_format_ret = date("d.m.y H:i",strtotime($bestillinglukker_ret));
		// $allergener_ret = implode(',', $_POST['allergener_ret']);

		 $afhentningstidsrum_dato_ret = date("d.m.y",strtotime($afhentningstidsrum_ret));
		 $afhentningstidsrum_tid_ret = date("H:i",strtotime($afhentningstidsrum_ret));


		

		//omdan binært udtryk for emballage til tekst
		if ($emballage_ret_raw < 1) {
			$emballage_ret = 'køber selv skal have emballage med';
		}
		else { 
			$emballage_ret = 'du sørger for emballage';
		}


//udregn 10+ minutter, som er sluttidspunktet for afhentning
$afhentningstidsrum_slut_ret_unformatted = date('Y-m-d H:i',strtotime('+10 minutes',strtotime($afhentningstidsrum_ret)));
$afhentningstidsrum_slut_ret = date("H:i",strtotime($afhentningstidsrum_slut_ret_unformatted));

     require 'vendor/autoload.php';


// Include the PHPMailer class

// include('vendor/phpmailer/phpmailer/class.phpmailer.php');

// Retrieve the email template required
$message = file_get_contents('email-templates/bekraeftelsesmail-til-saelger-ved-oprettelse.html');

// Replace the % with the actual information

$message = str_replace('%titel_ret%', $titel_ret, $message);
$message = str_replace('%beskrivelse_ret%', $beskrivelse_ret, $message);
$message = str_replace('%adresse_ret%', $adresse_ret, $message);
$message = str_replace('%postnummer_ret%', $postnummer_ret, $message);
$message = str_replace('%by_ret%', $by_ret, $message);
$message = str_replace('%antal_ret%', $antal_ret, $message);
$message = str_replace('%pris_ret%', $pris_ret, $message);
$message = str_replace('%telefonnummer_ret%', $telefonnummer_ret, $message);
$message = str_replace('%afhentningstidsrum_dato_ret%', $afhentningstidsrum_dato_ret, $message);
$message = str_replace('%afhentningstidsrum_tid_ret%', $afhentningstidsrum_tid_ret, $message);
$message = str_replace('%afhentningstidsrum_ret%', $afhentningstidsrum_ret, $message);
$message = str_replace('%afhentningstidsrum_slut_ret%', $afhentningstidsrum_slut_ret, $message);
$message = str_replace('%emballage_ret%', $emballage_ret, $message);
$message = str_replace('%kok_ret%', $kok_ret, $message);
$message = str_replace('%bestillinglukker_format_ret%', $bestillinglukker_format_ret, $message);
$message = str_replace('%allergener_ret%', $allergener_ret, $message);


// Setup PHPMailer
$mail = new PHPMailer();
$mail->CharSet = "UTF-8";
$mail->IsSMTP();


// This is the SMTP mail server
$mail->Host = 'send.one.com';


// Remove these next 3 lines if you dont need SMTP authentication
$mail->SMTPAuth = true;
$mail->Username = 'info@mahlzeit.dk';
$mail->Password = 'kJkjslroP03kwjPaw';

// Set who the email is coming from
$mail->SetFrom('info@mahlzeit.dk', 'Mahlzeit');

// Set who the email is sending to
$mail->AddAddress($email_ret);

// Set the subject
$mail->Subject = 'Du har oprettet en ret på Mahlzeit';

//Set the message
$mail->MsgHTML($message);
$mail->AltBody = strip_tags($message);

// Send the email
if(!$mail->Send()) {
 echo "Mailer Error: " . $mail->ErrorInfo;
}

?>

 