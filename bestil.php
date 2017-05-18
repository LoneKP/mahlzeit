
<?php
	 require_once 'DBconnect.php';


   $FK_ret = intval($_POST['id']);
   $antal_ordre = intval($_POST['antal_ordre']);
   $navn_ordre = $_POST['navn_ordre'];
   $email_ordre = $_POST['email_ordre'];
   $telefonnummer_ordre = intval($_POST['telefonnummer_ordre']);
 


// Escape user inputs for security
$ordre = mysqli_real_escape_string($conn, $_REQUEST['ordre']);
 
// attempt insert query execution
// $sql = "INSERT INTO ordre (FK_ret, antal_ordre, navn_ordre, email_ordre, telefonnummer_ordre) 
// VALUES ('$FK_ret','$_POST[antal_ordre]', '$_POST[navn_ordre]', '$_POST[email_ordre]', '$_POST[telefonnummer_ordre]')";

$sql = "INSERT INTO ordre (FK_ret, antal_ordre, navn_ordre, email_ordre, telefonnummer_ordre) 
VALUES ('$FK_ret','$antal_ordre', '$navn_ordre', '$email_ordre', '$telefonnummer_ordre')";

if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}
 

// close connection
mysqli_close($conn);









/*require_once 'DBconfig.php'*/




/*try {
 
    $sql = "INSERT INTO ordre (FK_ret, antal_ordre, navn_ordre, email_ordre, telefonnummer_ordre)
    VALUES ('35','$_POST[antal_ordre]', '$_POST[navn_ordre]', '$_POST[email_ordre]', '$_POST[telefonnummer_ordre]')";
    // use exec() because no results are returned
    $DBcon->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$DBcon = null;*/







 

