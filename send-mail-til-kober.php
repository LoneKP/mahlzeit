<?php

header('Content-type: application/json; charset=UTF-8');
   
     require_once 'DBconfig.php';
   
		$STH = $DBcon->query("SELECT * FROM ret WHERE ID_ret=$FK_ret");
		$STH2 = $DBcon->query("SELECT * FROM ordre WHERE FK_ret=$FK_ret AND ID_ordre=$ID_ordre");
		 
		# setting the fetch mode
		$STH->setFetchMode(PDO::FETCH_ASSOC);
		$STH2->setFetchMode(PDO::FETCH_ASSOC);
		 
		while($row = $STH->fetch()) {
		    $titel_ret = $row['titel_ret'];

		    
		    $afhentningstidsrum_ret = $row['afhentningstidsrum_ret'];
		    $afhentningstidsrum_dato_ret = date("d.m.y",strtotime($afhentningstidsrum_ret));
		    $afhentningstidsrum_tid_ret = date("H:i",strtotime($afhentningstidsrum_ret));
		    $adresse_ret = $row['adresse_ret'];
		    $postnummer_ret = $row['postnummer_ret'];
		    $by_ret = $row['by_ret'];
		    $pris_ret = $row['pris_ret'];
		    $telefonnummer_ret = $row['telefonnummer_ret'];
		    $kok_ret = $row['kok_ret'];
		    $email_ret = $row['email_ret'];
		    $emballage_ret_raw = $row['emballage_ret'];

		}

		while($row = $STH2->fetch()) {
		    $ID_ordre = $row['ID_ordre'];
		    $antal_ordre = $row['antal_ordre'];
		    $navn_ordre = $row['navn_ordre'];
		    $email_ordre = $row['email_ordre'];
		    $telefonnummer_ordre = $row['telefonnummer_ordre'];
		    $dato_ordre_raw = $row['dato_ordre'];
		    $dato_ordre = date("d.m.y",strtotime($dato_ordre_raw));
		}

		//omdan binært udtryk for emballage til tekst
		if ($emballage_ret_raw < 1) {
			$emballage_ret = 'Du skal selv have emballage med';
		}
			else { $emballage_ret = ('Sælgeren, ' . $kok_ret. ',' . ' sørger for emballage');
		}

		//hvis der er flere portioner, skriv da portioner i flertal i mailen
			if ($antal_ordre > 1) {
			$portion = 'portioner';
		}
			else { $portion = 'portion';
		}

		$pris_ret_pr_antal = $pris_ret * $antal_ordre;

//udregn 10+ minutter, som er sluttidspunktet for afhentning
$afhentningstidsrum_slut_ret_unformatted = date('Y-m-d H:i',strtotime('+10 minutes',strtotime($afhentningstidsrum_ret)));
$afhentningstidsrum_slut_ret = date("H:i",strtotime($afhentningstidsrum_slut_ret_unformatted));

     require 'vendor/autoload.php';


// Include the PHPMailer class

// include('vendor/phpmailer/phpmailer/class.phpmailer.php');

// Retrieve the email template required
$message = file_get_contents('email-templates/bekraeftelsesmail-kober.html');

// Replace the % with the actual information

$message = str_replace('%titel_ret%', $titel_ret, $message);
$message = str_replace('%adresse_ret%', $adresse_ret, $message);
$message = str_replace('%postnummer_ret%', $postnummer_ret, $message);
$message = str_replace('%by_ret%', $by_ret, $message);
$message = str_replace('%telefonnummer_ret%', $telefonnummer_ret, $message);
$message = str_replace('%antal_ordre%', $antal_ordre, $message);
$message = str_replace('%afhentningstidsrum_dato_ret%', $afhentningstidsrum_dato_ret, $message);
$message = str_replace('%afhentningstidsrum_tid_ret%', $afhentningstidsrum_tid_ret, $message);
$message = str_replace('%afhentningstidsrum_ret%', $afhentningstidsrum_ret, $message);
$message = str_replace('%afhentningstidsrum_slut_ret%', $afhentningstidsrum_slut_ret, $message);
$message = str_replace('%emballage_ret%', $emballage_ret, $message);
$message = str_replace('%portion%', $portion, $message);
$message = str_replace('%kok_ret%', $kok_ret, $message);
$message = str_replace('%pris_ret_pr_antal%', $pris_ret_pr_antal, $message);
$message = str_replace('%ID_ordre%', $ID_ordre, $message);
$message = str_replace('%navn_ordre%', $navn_ordre, $message);
$message = str_replace('%dato_ordre%', $dato_ordre, $message);


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
$mail->AddAddress($email_ordre);

// Set the subject
$mail->Subject = 'Bekræftelse på bestilling fra Mahlzeit';

//Set the message
$mail->MsgHTML($message);
$mail->AltBody = strip_tags($message);

// Send the email
if(!$mail->Send()) {
 echo "Mailer Error: " . $mail->ErrorInfo;
}

?>

 