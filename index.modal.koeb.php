<!DOCTYPE html>

   <!-- Modal til at bestille mad (step 2) -->
			<div class="modal fade all" 
				 id="super-modal" 
				 tabindex="-1" 
				 role="dialog" 
				 aria-labelledby="myModalLabel">
			  
				<div class="modal-dialog" 
				  	 role="document">

				  	
				  	 <!--MODAL MED HANDELSBETINGELSER-->

				  	 <div id="handelsbetingelser-ved-kob" class="modal-content">

								  <!--modal header -->
								<div class="modal-header">
										<button type="button" 
												class="close" 
												data-dismiss="modal" 
												aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" 
											id="myModalLabel0">Handelsbetingelser for brug af Mahlzeit</h4>
								</div>

								<!--modal body -->
								<div class="modal-body" >
										   <p>Denne version er en testversion, så ved at bruge tjenesten er du med til at teste!</p>
										   <p>Fødevarestyrelsen bla bla bla og noget med cvr. Du indvilger i, at hvis du køber fra private, 
										   så er det deres ansvar at lave mad man ikke bliver syg af.
										   </p>
								</div>

						   		<!--modal footer -->
								<div class="modal-footer">
									 <div class="checkbox">
						    			<label>
											<input type="checkbox">Jeg accepterer 
										</label>
									</div>
									
										<button type="button" 
										 		class="btn btn-default" 
										 		data-dismiss="modal">Tilbage
										</button>
									
										<button type="button" 
												class="btn btn-primary" 
												id="videre1">Det er forstået!
										</button>
								</div>
						</div>


				  	 <!--DYNAMISK MODAL MED INFO OM HVAD MAN HAR KLIKKET PÅ-->
				  	 <div class="modal-content" id="dynamisk-med-info">
			  			
						<!-- mysql data will load here --> 
			  			<div id="dynamic-content"> 

				  				<!--modal header -->
					  			<div class="modal-header">
												<button type="button" 
														class="close" 
														data-dismiss="modal" 
														aria-label="Close"><span aria-hidden="true">&times;</span>
												</button>
									
									<h4 class="modal-title" 
										id="myModalLabel">
										Køb: <span class="titel_ret-id"></span>
									</h4>
					  			</div>

					  			<!--modal body-->
							 	<div class="modal-body">	   	 
								   		<h4>Sælgerens beskrivelse af retten</h4>
								   			<p id="beskrivelse_ret-id"></p>
								   
								   		<h4>Afhentning</h4>
								   			<p>Du skal selv afhente din mad 
								   			
								   			<span class="bold afhent_ret"></span> i tidsrummet <span class="bold afhent_ret_tid"></span> - <span class="bold afhent_ret_tid_10"></span> hos: <br></p>
								   			

								   		<p><span class="bold" id="kok_ret-id"></span><br><span class="bold" id="adresse_ret-id"></span><br> 
								   		<span class="bold" id="postnummer_ret-id"></span> <span class="bold" id="by_ret-id"></span><br>
								   		</p>
								     	
								  		
								  		<p><span id="emballage_ret-id"></span></p>

								  		<h4>Allergener i retten</h4>
								  		<p><span id="allergenerlabels"></span></p>
							  	</div>
						  		
						  		<!--modal footer-->
								<div class="modal-footer">
										<button  type="button" 
												 class="btn btn-default" 
												 id="tilbage2"
												 >Tilbage
										</button>

										<button type="button" 
												class="btn btn-primary" 
												id="videre2"
												>Køb Måltid!
										</button>
								</div>
						</div>
			  		</div>

				  	 <!--NY MODAL (BESTIL)-->

					<div id="formular-til-bestilling" class="modal-content">

					 	<!--Modal header-->
					  	<div class="modal-header">
							<button type="button" 
									class="close" 
									data-dismiss="modal" 
									aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>

							<h4 class="modal-title">Sådan gør du</h4>
					  	</div>

				  		<!--Modal body-->
				  		<div class="modal-body">
						  	<p>Dette er kun en testversion, så derfor foregår betaling kun direkte til kokken via mobilepay.</p>
						 	 <p>Når du trykker "køb måltid" vil du modtage en mail med kokkens telefonnummer, og du skal straks overføre pengene for at din bestilling er gyldig.</p>
						 	  
				 
				 			<h4>Din bestilling</h4>
				 
								<form   method="post" 
								 		action="bestil.php"
								 		data-toggle="validator" 
								 		role="form" 
								 		class="form-group"
								 		id="bestilform">
					
									<!-- antal måltider, som køber vil bestille-->
									
									<div class="form-group">
						 			<label>Antal måltider</label>
								
						 	
								 		<select onmousedown="if(this.options.length>20){this.size=5;}"  onchange='this.size=0;' onblur="this.size=0;" id="bestilAntal" class="form-control " 
								 				name="antal_ordre">							  
											   <option></option>
							   			</select>
						   			</div>

						   			<!-- navn på køber-->
									<div class="form-group">
									    <label for="InputName1">Fulde Navn</label>
									    <input  name="navn_ordre" 
									    		type="text" 
									    		class="form-control" 
									    		id="exampleInputName1" 
									    		placeholder="Indtast dit navn">
									</div>

									<!-- email på køber-->
								   	<div class="form-group">
								    <label for="InputEmail1">Email</label>
								    <input  name="email_ordre" 
								    		type="email" 
								    		class="form-control" 
								    		id="exampleInputEmail1" 
								    		placeholder="Indtast din e-mail" 
								    		data-error="Hov! Det er vist ikke en email...">
								    <div class="help-block with-errors"></div>
								  	</div>

								   	<!-- telefonnummer på køber-->
								   	<div class="form-group">
								    		<label for="InputPhonenumber1">Telefonnummer</label>
										    <div class="input-group">
										   	   <span class="input-group-addon">+45 </span>
											   <input 	name="telefonnummer_ordre" 
											   			data-minlength="8" 
											   			type="tel" 
											   			class="form-control" 
											   			id="exampleInputPhone1" 
											   			placeholder="Indtast dit telefonnummer">
								   			</div>
								  	</div>
							
								  		
								  	
								</form>  	
		<div>

		<table class="table-no-border table-checkout margin-top-bottom-tekstafsnit table table-condensed">
			
			<tr id="noborder">
				<td>Du er ved at bestille:</td>
				<td></td>
				
			</tr>
			<tr id="noborder" class="active">
				<th>Ret</th>
				<th>Pris</th>
			</tr>
			<tr id="noborder">
				<td><span id="dynamiskBestilling"></span> x <span class="titel_ret-id"></span>, pr. ret</td>
				<td><span class="pris_ret-id"></span> kr</td>
			</tr>
			<tr id="border-top" class="active">
				<td>I alt</td>
				<td><span id="dynamiskPrisudregning"></span> kr</td>
			</tr>
		
		</table>
		
		<p>Betaling foregår via mobilepay. Du får en mail med sælgers telefonnummer.</p>

		<p>Bestilling er først gyldig når du har betalt.</p>

		</div>

				  
				  		</div>

					  		 		<!--modal footer-->
									<div class="modal-footer">
											<button  type="button" 
													 class="btn btn-default" 
													 id="tilbage3"
													 >Tilbage
											</button>

											<button 
													type="button" 
													class="btn btn-primary" 
													id="submitForm"				
													form="bestilform"
												
													>Køb Måltid!

											</button>
									</div>

					</div>



					<!--NY MODAL-->
					<!--oplysning om, at købet er gjort færdig-->
				  	<div id="du-modtager-mail" class="modal-content">
						<!--modal header-->
				  		<div class="modal-header">
							<button type="button" 
									class="close" 
									data-dismiss="modal" 
									aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>

						<h4 class="modal-title" id="myModalLabel4">Sådan!</h4>
				  		</div>
				  
					  	<!-- modal body-->
					  	<div class="modal-body">
					  		<p>Du modtager oplysninger pr mail om dit køb!</p>
					  	</div>
					  
						<!-- modal footer-->
						<div class="modal-footer">
							<button type="button" 
									class="btn btn-primary center-block" 
									id="afslut"
									data-dismiss="modal">Afslut
							</button>
					  	</div>
					</div>
				
					
				  
				  
					</div>
			  	</div>
			</div>



			
	
   
   
   
   
   