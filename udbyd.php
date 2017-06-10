
<?php

require_once 'DBconfig.php';

// Escape user inputs for security
// $ret = mysqli_real_escape_string($conn, $_REQUEST['ret']);


		$titel_ret = $_POST['titel_ret'];
		$beskrivelse_ret = $_POST['beskrivelse_ret'];
		$adresse_ret = $_POST['adresse_ret'];
		$postnummer_ret = $_POST['postnummer_ret'];
		$by_ret = $_POST['by_ret'];
		$antal_ret = $_POST['antal_ret'];
		$pris_ret = $_POST['pris_ret'];
		$telefonnummer_ret = $_POST['telefonnummer_ret'];
		$emballage_ret_raw = $_POST['emballage_ret'];
		$kok_ret = $_POST['kok_ret'];
		$email_ret = $_POST['email_ret'];


$afhentningstidsrum_ret = date("Y-m-d H:i:s",strtotime($_POST['afhentningstidsrum_ret']));
$bestillinglukker_ret = date("Y-m-d H:i:s",strtotime($_POST['bestillinglukker_ret']));


$allergener_ret = implode(',', $_POST['allergener_ret']);



try {
	$sql = "INSERT INTO ret (titel_ret, beskrivelse_ret, afhentningstidsrum_ret, adresse_ret, postnummer_ret, by_ret, bestillinglukker_ret, antal_ret, pris_ret, allergener_ret, telefonnummer_ret, emballage_ret, kok_ret, email_ret) 
			
			VALUES ('$titel_ret', '$beskrivelse_ret', '$afhentningstidsrum_ret', '$adresse_ret', '$postnummer_ret', '$by_ret', '$bestillinglukker_ret', '$antal_ret', '$pris_ret', '$allergener_ret', '$telefonnummer_ret', '$emballage_ret_raw', '$kok_ret', '$email_ret')";
    // use exec() because no results are returned
    $DBcon->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }




include 'send-mail-til-saelger-ved-oprettelse.php';


$conn = null;
?>
