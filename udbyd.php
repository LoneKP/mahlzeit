
<?php
require_once 'DBconnect.php';

// Escape user inputs for security
$ret = mysqli_real_escape_string($conn, $_REQUEST['ret']);

$afhentningstidsrum_ret = date("Y-m-d H:i:s",strtotime($_POST['afhentningstidsrum_ret']));
$bestillinglukker_ret = date("Y-m-d H:i:s",strtotime($_POST['bestillinglukker_ret']));
$allergener_ret = implode(',', $_POST['allergener_ret']);


 
// attempt insert query execution
$sql = "INSERT INTO ret (titel_ret, beskrivelse_ret, afhentningstidsrum_ret, adresse_ret, postnummer_ret, bestillinglukker_ret, antal_ret, pris_ret, allergener_ret, telefonnummer_ret, emballage_ret, kok_ret, email_ret) 
VALUES ('$_POST[titel_ret]', '$_POST[beskrivelse_ret]', '$afhentningstidsrum_ret', '$_POST[adresse_ret]', '$_POST[postnummer_ret]', '$bestillinglukker_ret', '$_POST[antal_ret]', '$_POST[pris_ret]', '$allergener_ret', '$_POST[telefonnummer_ret]', '$_POST[emballage_ret]', '$_POST[kok_ret]', '$_POST[email_ret]')";
if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}
 




// close connection
mysqli_close($conn);



