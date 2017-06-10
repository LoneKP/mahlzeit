
<?php
	 require_once 'DBconfig.php';

   //værdierne hentes via ajax post fra index.php når der klikkes bestil, og sættes ind i tabellen ordre i databasen
   $FK_ret = intval($_POST['id']);
   $antal_ordre = intval($_POST['antal_ordre']);
   $navn_ordre = $_POST['navn_ordre'];
   $email_ordre = $_POST['email_ordre'];
   $telefonnummer_ordre = intval($_POST['telefonnummer_ordre']);
 
try {

    $sql_ordre = "INSERT INTO ordre (FK_ret, antal_ordre, navn_ordre, email_ordre, telefonnummer_ordre) 
    VALUES ('$FK_ret','$antal_ordre', '$navn_ordre', '$email_ordre', '$telefonnummer_ordre')";
    // use exec() because no results are returned
    $DBcon->exec($sql_ordre);

    //ID'et for ordren hentes fra databasen
  $ID_ordre = $DBcon->lastInsertId();
    echo "New record created successfully. Last inserted ID is: " . $ID_ordre;
    }
catch(PDOException $e)
    {
    echo $sql_ordre . "<br>" . $e->getMessage();
    }

      //hent antal retter tilbage for ID'et der netop er købt
      $q= $DBcon->query("SELECT antal_ret FROM ret WHERE ID_ret=$FK_ret");
        
      $antal_ret = $q->fetchColumn();

      //Udregn hvor mange antal_ret der er tilbage for den pågældende ret gemt i variablen $antal_ret_update
      $antal_ret_update = $antal_ret - $antal_ordre;

        //sæt $udsolgt_ret til 1 hvis den er udsolgt
        if ($antal_ret_update < "1") {

        $udsolgt_ret=1;
        }
        else{

        $udsolgt_ret=0;
        }

try {
$sql = "UPDATE ret SET antal_ret=$antal_ret_update, udsolgt_ret=$udsolgt_ret WHERE ID_ret=$FK_ret";  
 $sql2 = "UPDATE ordre SET ispayed_ordre=1 WHERE ID_ordre=$ID_ordre";   

    // Prepare statement
    $stmt = $DBcon->prepare($sql);
    $stmt2 = $DBcon->prepare($sql2);

    // execute the query
    $stmt->execute();
    $stmt2->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    echo $stmt2->rowCount() . " records2 UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    echo $sql2 . "<br>" . $e->getMessage();
    }

require_once 'send-mail-til-kober.php';
require_once 'send-mail-til-saelger-ved-salg.php';


$conn = null;
 






 

