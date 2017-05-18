<!DOCTYPE html>
 <!-- Sælg mad faneblad-->
 <div   role="tabpanel" 
     	class="tab-pane row universal-padding padding-top-bottom-afsnit" 
     	id="Sælg-mad">
     
 
  <h3>Vil du sælge mad over Mahlzeit?</h3>
      <p>Alle kan sælge mad over Mahlzeit. Du skal bare udfylde nedenstående formular, og være klar med maden til den tid du specificerer!</p>
      

    <form   method="post" 
    		action="udbyd.php" 
    		data-toggle="validator" 
    		role="form">
			  
		<!-- titel-->
			 <div class="form-group">
				   <label>Titel på måltid</label>
				   <input 	type="text" 
				   			name="titel_ret" 
				   			class="form-control" 
				   			placeholder="Hvad kalder du din ret?">
			 </div>

  		<!-- Beskrivelse af måltid-->
		  
			 <div class="form-group">  
				   <label>Beskrivelse af måltid</label>
				   <textarea  placeholder="Hvad skal køberne vide yderligere om det de skal spise? 
				   			  (brug dette felt til at sælge din mad på bedste vis)" 			
				   			  name="beskrivelse_ret" 
				   			  class="form-control" 
				   			  rows="6"></textarea>
			 </div>
 
		<!-- Afhentningstidspunkt-->
  
			 <div class="form-group">
			 <label>Afhentningstidspunkt</label>
				  <div class="input-group date" id="datetimepicker1"> 
					    <input 	name="afhentningstidsrum_ret"  
					    		type="text" 
					    		class="form-control" />
								    <span class="input-group-addon">
								    <span class="glyphicon-calendar glyphicon"></span>
								    </span>
				 </div>
			</div>
    

		<!-- Adresse til afhentning -->

		     <div class="form-group">
				<label>Adresse til afhentning</label>
				<input  type="text" 
						name="adresse_ret" 
						class="form-control" 
						placeholder="Indtast adresse">
		  	</div>
	    
		 <!-- Postnummer -->

		    <div class="form-group">
				<label>Postnummer</label>
				<input 	name="postnummer_ret" 
						type="number" 
						class="form-control" 
						placeholder="Indtast postnummer">
		  	</div>
 
		<!-- Her lukker mulighed for bestilling -->

			<div class="form-group">
			 <label>Her lukker mulighed for bestilling</label>
				  <div class="input-group date" id="datetimepicker2">
				    <input 	name="bestillinglukker_ret"  
				    		type="text" 
				    		class="form-control" />
							    <span class="input-group-addon">
							    <span class="glyphicon-calendar glyphicon"></span>
							    </span>
				  </div>
			</div>
  
   		<!-- antal måltider -->

		    <div class="form-group">
					   		<div class="form-group">
								<label>Antal måltider</label>
							 		<select name="antal_ret"  
							 				title="Antal måltider du vil udbyde" 
							 				class="form-control selectpicker">
						  
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

							<!-- pris pr måltid -->

							<div class="form-group">
								<label>Pris pr. måltid</label>
								<div class="input-group">
									<input  type="number" 
											name="pris_ret" 
											class="form-control" 
											placeholder="Pris i DKK">
									<span class="input-group-addon">kr</span>
								</div>
							</div>

			</div>
	
			<!-- retten indeholder følgende allergener -->

			<div class="form-group"> <label>Retten indeholder følgende allergener</label>
				<select name="allergener_ret[]" 
						data-width="100%" 
						id="allergener" 
						title="Allergener" 
						class="selectpicker" 
						multiple data="true">
				 
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
  

			<!-- Telefonnummer til betaling -->

		  	<div class="form-group">
				<label>Telefonnummer til betaling via mobilepay</label>
					<div class="input-group">
			   	   		<span 	class="input-group-addon">+45 </span>
						
						<input 	name="telefonnummer_ret" 
								data-minlength="8" 	
								type="number" 
								class="form-control" 
								placeholder="Indtast mobilnummer">
				  	</div>
			</div>
  	

			<!-- Navn -->

		  	<div class="form-group">
				<label>Navn</label>
				<input 	name="kok_ret" 
						type="text" 
						class="form-control" 
						placeholder="Indtast dit navn, så køberen ved hvem de handler med">
		  	</div>
     

			<!-- email -->

		    <div class="form-group">
			    <label for="exampleInputEmail1">Email</label>
			    <input 	name="email_ret" 
			    		type="email" 
			    		class="form-control" 
			    		id="exampleInputEmail2" 
			    		placeholder="Indtast din e-mail" 
			    		data-error="Hov! Det er vist ikke en email...">
			    <div class="help-block with-errors"></div>
		  	</div>

    		<!-- Emballage af retten -->

    		<div class="form-group">
			    <label>Emballage af retten</label>
					 <div class="radio">
					  <label>
						    <input 	name="emballage_ret" 
						    		type="radio" 
						    		id="optionsRadios1" 
						    		value="0">
						    Køberen skal selv have en bøtte med for at købe retten
					  </label>
					</div>
					<div class="radio">
					  <label>
						    <input  type="radio" 
						    		name="emballage_ret" 
						    		id="optionsRadios2" 
						    		value="1">
						    Jeg sørger for takeaway emballage
					  </label>
					</div>
			</div>
 

			<!-- alert -->

			<div 
				class="alert alert-info" 
				role="alert">
				Måltidet bookes af køberne ved at overføre måltidsprisen via mobilepay til det angivne mobilnummer. Hold derfor øje med mobilepay, så du ved, hvad der kommer ind.
			</div>

 
			 <!-- accepter handelsbetingelserne -->

			 <div class="checkbox">
			    <label>
				      <input  
				      type="checkbox">Jeg accepterer <a 
				      data-toggle="modal" 
				      data-target="#myModal">handelsbetingelserne</a>
					
			   	</label>
			 </div>
  
  			<button type="submit" class="btn btn-default">Udbyd måltid</button>
	</form>
</div>	