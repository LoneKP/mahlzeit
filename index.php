<!DOCTYPE html>
<html lang="en"><head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mahlzeit</title>

		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="stylesheet" href="bower_components/bootstrap-select/dist/css/bootstrap-select.css">
		<link rel="stylesheet" href="bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css">
		<link rel="stylesheet" href="css/jquery.restable.css">
		
	
		
		
		<link href="https://fonts.googleapis.com/css?family=Alegreya|Work+Sans:400,600,700" rel="stylesheet">
  </head>
   <body data-spy="scroll" data-target=".navbar">
  <div class="container-fluid">
		
<div class="navbar-link"><a class="navbar-text navbar-right" id="handelsbetingelser" data-toggle="modal" data-target="#myModal">Handelsbetingelser</a></div>

	<!--  header-->
	
	<header id="top" class="row universal-padding header-image">
			<div class="col-lg-12">
			
			<div class="header-div1 row row-centered">
					<img class="logo" src="images/logo.png" alt="Mahlzeit">
				</div>
				<div class="header-div2 row row-centered">
					<h1>Hjemmelavet takeaway</h1>
				</div>
				<div class="header-div3 row row-centered">
					<h2>Lad Mahlzeit hjælpe dig med at undgå madspild</h2>
				</div>
				
					
			</div>
			<div id="tabs">
				<ul class="nav nav-tabs nav-justified"  role="tablist">
					  <li role="tab-panel" class="active"><a href="#Køb-mad" aria-controls="Køb-mad">Køb mad</a></li>
					  <li role="tab-panel"><a href="#Sælg-mad" aria-controls="Sælg-mad">Sælg mad</a></li>
				</ul>
			</div>
		</header>
		
  <div class="tab-content">
    
  <!--  Køb mad faneblad-->
 
     <div role="tabpanel" class="tab-pane active row universal-padding padding-top-bottom-afsnit" id="Køb-mad">
    <h3>Køb takeawaymad</h3>
 

    <p>Her kan du købe takeawaymad, som du selv skal afhente. Maden bliver lavet af foodtrucks, små cateringfirmaer og små madiværksættere.</p>
    

    
    <?php
		
		require_once 'DBconnect.php';
  
		$sql = "SELECT * FROM ret";
$result = $conn->query($sql);
		?>
<!doctype html>
	<table id="tabel" class="table table-hover table-responsive" >
		<tr >
			<th>Titel på ret</th>
			<th>Afhent</th> 
			<th>Adresse</th>
			<th>Postnummer</th>
			<th>Måltider tilbage</th>
			<th>Pris pr. måltid</th>
			<th>Medbring selv emballage</th>
			<th>Navn på kok</th>
			<th></th>
		</tr>
	<?php
//Fetch Data form database
	
if($result->num_rows > 0){
 while($row = $result->fetch_assoc()){
	 
 ?>
<!--<tr style="cursor: pointer" data-toggle="modal" data-target="#lavbestillingaccepter">-->
<td><?php echo $row['ID_ret'];?></td>
 <td><?php echo $row['titel_ret']; ?></td>
 <td><?php echo $row['afhentningstidsrum_ret']; ?></td>
 <td><?php echo $row['adresse_ret']; ?></td>
 <td><?php echo $row['postnummer_ret']; ?></td>
 <td><?php echo $row['postnummer_ret']; ?></td>
 <td><?php echo $row['pris_ret']; ?></td>
 <td><?php echo $row['emballage_ret']; ?></td>
 <td><?php echo $row['kok_ret']; ?></td>

 <td id="getUser" data-target="#view-modal" class="btn btn-default btn-small" data-toggle="modal" data-id="<?php echo $row['ID_ret']; ?>">Køb</a></td>';
 
 

 

 </tr>
 <?php
 }
}
else
{
 ?>
 <tr>
 <th colspan="2">There's No data found!!!</th>
 </tr>
 
 <?php
}
// close connection
mysqli_close($conn);
?>

?>
		
		</table>		
   
	<!--<table id="tabel" class="table table-hover table-responsive" >
		<tr>
			<th>Titel på ret</th>
			<th>Afhent</th> 
			<th>Adresse</th>
			<th>Postnummer</th>
			<th>Måltider tilbage</th>
			<th>Pris pr. måltid</th>
			<th>Medbring selv emballage</th>
			<th>Navn på kok</th>
			<th></th>
			
			
			
	  	</tr>
	  	<tr style="cursor: pointer" data-toggle="modal" data-target="#lavbestillingaccepter" >
	  	

			<td>Chili sin carne</td>
			<td>10-10-17 kl. 15.13</td> 
			<td>Målevej 13</td>
			<td>2000</td>
			<td>7</td>
			<td>40 kr</td> 
			<td>Ja</td>
			<td>Kokkeline</td>
			<td>Køb</td>
	  	</tr>
	  	<tr>
			<td>Karrysuppe</td>
			<td>05-05-17 kl. 20.00</td> 
			<td>Fremtidsvej 47</td>
			<td>2200</td>
			<td>1</td>
			<td>50 kr</td> 
			<td>Nej</td>
			<td>Chef de la chef</td>
			<td>Køb</td>
	  	</tr>
	</table>-->
   
       </div>

      <!--	testmodal-->	
  <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog"> 
      <div class="modal-content"> 
                  
         <div class="modal-header"> 
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
             <h4 class="modal-title">
             <i class="glyphicon glyphicon-user"></i> User Profile
             </h4> 
         </div> 
         
         <div class="modal-body"> 
                       
             <div id="modal-loader" style="display: none; text-align: center;">
                 <!--<img src="ajax-loader.gif"> -->
             </div>
                       
             <div id="dynamic-content"> <!-- mysql data will load in table -->
                                        
                 <div class="row"> 
                     <div class="col-md-12"> 
                        
                     <div class="table-responsive">
                             
                     <table class="table table-striped table-bordered">
                     <tr>
                     <th>First Name</th>
                     <td id="txt_fname"></td>
                     </tr>
                                     
                     <tr>
                     <th>Last Name</th>
                     <td id="txt_lname"></td>
                     </tr>
                                         
                     <tr>
                     <th>Email ID</th>
                     <td id="txt_email"></td>
                     </tr>
                                         
                     <tr>
                     <th>Position</th>
                     <td id="txt_position"></td>
                     </tr>
                                         
                     <tr>
                     <th>Office</th>
                     <td id="txt_office"></td>
                     </tr>
                                         
                     </table>
                                
                     </div>
                                       
                   </div> 
              </div>
                       
             </div> 
                             
         </div> 
           
       <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
       </div>  
              
      </div> 
   </div>
</div>  

   
    <!-- Modal til at bestille mad (Accepter handelsbetingelserne) -->
			<div class="modal fade all" id="lavbestillingaccepter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel0">Handelsbetingelser for brug af Mahlzeit</h4>
				  </div>
				  <div class="modal-body" >
				   <p>Denne version er en testversion, så ved at bruge tjenesten er du med til at teste!</p>
				   <p>Fødevarestyrelsen bla bla bla og noget med cvr. Du indvilger i, at hvis du køber fra private, så er det deres ansvar at lave mad man ikke bliver syg af.
</p>
		
        	
 
				  </div>
				   	
				  <div class="modal-footer">
				  <div class="checkbox">
    <label>
		<input type="checkbox">Jeg accepterer </label></div>
					
					 <button type="button" class="btn btn-default" data-dismiss="modal">Tilbage</button>
					 <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#lavbestillingmodal">Det er forstået!</button>
				  </div>
				</div>
			  </div>
			</div>
   
   
   
   <!-- Modal til at bestille mad (step 1) -->
			<div class="modal fade all" id="lavbestillingmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Køb (Titel på ret)</h4>
				  </div>
				  <div class="modal-body">
				   <h4>Yderligere beskrivelse af ret</h4>
				   <p>...</p>
				   <h4>Afhentning</h4>
				   <p>Dato, tid, adresse</p>		   
				   <h4>Kokkens navn</h4>
				     <p>...</p>
				   <h4>Emballage</h4>
				   <p>Medbring selv emballage / Sælger sørger for emballage</p>
				  </div>
				  <div class="modal-footer">
					 <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#lavbestillingaccepter">Tilbage</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#lavbestillingmodal2">Køb Måltid!</button>
				  </div>
				</div>
			  </div>
			</div>
   
   
   <!-- Modal til at bestille mad (step 2) -->
			<div class="modal fade all" id="lavbestillingmodal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Sådan gør du</h4>
				  </div>
				  <div class="modal-body">
				  <p>Dette er kun en testversion, så derfor kan du kun betale direkte til kokken.</p>
				  <p>Du bestiller derfor et måltid ved at overføre penge til kokken via mobilepay</p>
				  <h4>Din bestilling</h4>
				 	<form class="form-group">
		<div class="form-group">
	 		<label>Antal måltider</label>
		 		<select class="form-control selectpicker">
	  
					   <option value="" selected>1</option>
					   <option value="">2</option>
					   <option value="">3</option>
					   <option value="">4</option>
					   <option value="">5</option>
					   <option value="">6</option>
					   <option value="">7</option>
					   <option value="">8</option>
					   <option value="">9</option>
					   <option value="">10</option>
	   
	   			</select>
	   			</div>
	   			 <div class="form-group">
    <label for="InputName1">Fulde Navn</label>
    <input type="text" class="form-control" id="exampleInputName1" placeholder="Indtast dit navn">
  </div>
   	 <div class="form-group">
    <label for="InputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Indtast din email">
  </div>
   	 <div class="form-group">
  	  
    <label for="InputPhonenumber1">Telefonnummer</label>
     <div class="input-group">
   	   <span class="input-group-addon">+45 </span>
   <input data-minlength="8" type="number" class="form-control" id="exampleInputPhone1" placeholder="Indtast dit telefonnummer">
    </div>
  </div>
	   	
				</form>
				  </div>
				  <div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#lavbestillingmodal1">Tilbage</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#lavbestillingmodal3">Videre</button>
				  </div>
				</div>
			  </div>
			</div>
			
			
			   <!-- Modal til at bestille mad (step 3) -->
			<div class="modal fade all" id="lavbestillingmodal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Frem med mobilen!</h4>
				  </div>
				  <div class="modal-body">
				  
				   <p>For at bestille (antal valgt) portioner af (valgte ret) til (pris pr portion) kr pr. portion skal du overføre (antal*pris) kr til (nummer på kok) via mobilepay</p>
				   
				   <p>Maden skal afhentes d. (dato) kl (tid) </p>
				   
				   <p>(Du skal selv have emballage med) / (Kokken sørger for emballage)</p>
				   
				   <p>Overfør via mobilepay for at gennemføre købet!</p>
				   
				 
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#lavbestillingmodal2">Tilbage</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#lavbestillingmodal4">Jeg har overført via mobilepay!</button>
				  </div>
				</div>
			  </div>
			</div>
   
    <!-- Modal til at bestille mad (step 4) -->
			<div class="modal fade all" id="lavbestillingmodal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel4">Sådan!</h4>
				  </div>
				  <div class="modal-body">
				  <p>Du modtager oplysninger pr mail om dit køb!</p>
				  <div class="modal-footer">
					<button type="button" class="btn btn-primary center-block" data-dismiss="modal">Afslut</button>
				  </div>
				</div>
			  </div>
			</div>
			</div>
   
   
   
   
   
   
   
   
   
    
    <!-- Sælg mad faneblad-->
     <div role="tabpanel" class="tab-pane row universal-padding padding-top-bottom-afsnit" id="Sælg-mad">
     
 
  <h3>Vil du sælge mad over Mahlzeit?</h3>
      <p>Alle kan sælge mad over Mahlzeit. Du skal bare udfylde nedenstående formular, og være klar med maden til den tid du specificerer!</p>
      
<!--         <form method="post" action="udbyd.php">
   <input type="text" name="text"/>
   <input type="submit" value="submit"/>
</form>-->
      
      <form method="post" action="udbyd.php" data-toggle="validator" role="form">
  <div class="form-group">
    <label>Titel på måltid</label>
    <input type="text" name="titel_ret" class="form-control" placeholder="Hvad kalder du din ret?">
  </div>
  
  <div class="form-group">  
    <label>Beskrivelse af måltid</label>
    <textarea  placeholder="Hvad skal køberne vide yderligere om det de skal spise? (brug dette felt til at sælge din mad på bedste vis)" name="beskrivelse_ret" class="form-control" rows="6"></textarea>
  </div>
  
 <div class="form-group">
 <label>Afhentningstidspunkt</label>
  <div class="input-group date" id="datetimepicker1"> 
    <input name="afhentningstidsrum_ret"  type="text" class="form-control" />
    <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
  </div>
</div>
    

     <div class="form-group">
		<label>Adresse til afhentning</label>
		<input  type="text" name="adresse_ret" class="form-control" placeholder="Indtast adresse">
  	</div>
    <div class="form-group">
		<label>Postnummer</label>
		<input name="postnummer_ret" type="number" class="form-control" placeholder="Indtast postnummer">
  	</div>
 
 <div class="form-group">
 <label>Her lukker mulighed for bestilling</label>
  <div class="input-group date" id="datetimepicker2">
    <input name="bestillinglukker_ret"  type="text" class="form-control" />
    <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
  </div>
</div>
  
   <div class="form-group">
   		<div class="form-group">
		<label>Antal måltider</label>
		 		<select name="antal_ret"  title="Antal måltider du vil udbyde" class="form-control selectpicker">
	  
					   <option value="1">1</option>
					   <option value="2">2</option>
					   <option value="3">3</option>
					   <option value="4">4</option>
					   <option value="5">5</option>
					   <option value="6">6</option>
					   <option value="7">7</option>
					   <option value="8">8</option>
					   <option value="9">9</option>
					   <option value="10">10</option>
	   
	   			</select>
	   	
				</div>

					<div class="form-group">
						<label>Pris pr. måltid</label>
						<div class="input-group">
						<input  type="number" name="pris_ret" class="form-control" placeholder="Pris i DKK">
						<span class="input-group-addon">kr</span>
						</div>
					</div>

	</div>
	
 <div class="form-group"> <label>Retten indeholder følgende allergener</label>
	<select name="allergener_ret[]" data-width="100%" id="allergener" title="Allergener" class="selectpicker" multiple data="true">
	 
   		<optgroup label="Nødder" >
		  <option>Jordnød</option>
		  <option>Valnød</option>
		  <option>Cashew</option>
		  <option>Mandel</option>
		  <option>Hasselnød</option>
		  <option>Pekannød</option>
		  <option>Paranød</option>
		  <option>Pistacie</option>
	 	</optgroup> 

	    <optgroup label="Animalsk" >
			<option>Æg</option>
			<option>Mælk</option>
			<option>Fisk</option>
			<option>Krebsdyr</option>
		</optgroup>
  
  	  	<optgroup label="Andet" >
			<option>Gluten</option>
			<option>Soja</option>
			<option>Selleri</option>
			<option>Sennep</option>
			<option>Sesamfrø</option>
	  	</optgroup>


	</select>
		  </div>
  <div class="form-group">
		<label>Telefonnummer til betaling via mobilepay</label>
		  <div class="input-group">
   	   <span class="input-group-addon">+45 </span>
		<input name="telefonnummer_ret" data-minlength="8" type="number" class="form-control" placeholder="Indtast mobilnummer">
	  </div></div>
  	<div class="form-group">
		<label>Navn</label>
		<input name="kok_ret" type="text" class="form-control" placeholder="Indtast dit navn, så køberen ved hvem de handler med">
  	</div>
     <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input name="email_ret" type="email" class="form-control" id="exampleInputEmail2" placeholder="Indtast din e-mail" data-error="Hov! Det er vist ikke en email...">
    <div class="help-block with-errors"></div>
  </div>

    <div class="form-group"><label>Emballage af retten</label>
 <div class="radio">
  <label>
    <input name="emballage_ret" type="radio" id="optionsRadios1" value="Ja">
    Køberen skal selv have en bøtte med for at købe retten
  </label>
</div>
<div class="radio">
  <label>
    <input  type="radio" name="emballage_ret" id="optionsRadios2" value="Nej">
    Jeg sørger for takeaway emballage
  </label>
</div>
</div>
 
 <div class="alert alert-info" role="alert">Måltidet bookes af køberne ved at overføre måltidsprisen via mobilepay til det angivne mobilnummer. Hold derfor øje med mobilepay, så du ved, hvad der kommer ind.</div>
 
 <div class="checkbox">
    <label>
      <input  type="checkbox">Jeg accepterer <a data-toggle="modal" data-target="#myModal">handelsbetingelserne</a>
		
   	</label>
  </div>
  
  <button type="submit" class="btn btn-default">Udbyd måltid</button>
</form>
   
   	 <!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel5">Handelsbetingelser for brug af Mahlzeit</h4>
				  </div>
				  <div class="modal-body">
				   <p>Denne version er en testversion, så ved at bruge tjenesten er du med til at teste!</p>
				   <p>Fødevarestyrelsen bla bla bla og noget med cvr. Du indvilger i, at hvis du køber fra private, så er det deres ansvar at lave mad man ikke bliver syg af.</p>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Det er forstået!</button>
				  </div>
				</div>
			  </div>
			</div>
    
     
     </div>

  </div>

</div>
				

    
    <!-- Latest compiled and minified JavaScript -->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.easing.min.js"></script>
<script src="js/bootstrap.min.js"></script>	
<script src="bower_components/moment/min/moment.min.js"></script> 
<script src="bower_components/moment/locale/da.js"></script> 
<script src="js/scripts.js"></script>		
<script src="bower_components/bootstrap-select/js/bootstrap-select.js"></script>
<script src="bower_components/bootstrap-select/dist/js/i18n/defaults-da_DK.js"></script>  
<script src="bower_components/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js"></script>
<script src="js/jquery.restable.js"></script>
<script src="bower_components/bootstrap-validator/js/validator.js"></script>
 	  	 
	
 	<script>
	
		$('#tabel').ReStable({
    keepHtml : true,
    rowHeaders : false
});
</script> 
 
  <script> 
  
$(document).ready(function(){
 
 $(document).on('click', '#getUser', function(e){
  
  e.preventDefault();
  
  var uid = $(this).data('id'); // get id of clicked row
	 
	 console.log(uid);
  
  $('#dynamic-content').hide(); // hide dive for loader
  $('#modal-loader').show();  // load ajax loader
  
  $.ajax({
      url: 'fetch_record.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'json'
  })
  .done(function(data){
      console.log(data);
      $('#dynamic-content').hide(); // hide dynamic div
      $('#dynamic-content').show(); // show dynamic div
      $('#txt_fname').html(data.kok_ret);
      $('#txt_lname').html(data.beskrivelse_ret);
      $('#txt_email').html(data.allergener_ret);
      $('#txt_position').html(data.adresse_ret);
      $('#txt_office').html(data.postnummer_ret);
      $('#modal-loader').hide();    // hide ajax loader
  })
  .fail(function(){
      $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
  });
  
 });
 
});
</script> 
  </body>
</html>
