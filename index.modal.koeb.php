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
										Køb: <span id="titel_ret-id"></span>
									</h4>
					  			</div>

					  			<!--modal body-->
							 	<div class="modal-body">	   	 
								   		<h4>Yderligere beskrivelse af ret</h4>
								   			<p id="beskrivelse_ret-id"></p>
								   
								   		<h4>Afhentning</h4>
								   			<p>Dato og tid: 
								   			<span id="afhentningstidsrum_ret-id"></span>
								   			</p>  

								   		<p>Adresse: <span id="adresse_ret-id"></span>, 
								   		<span id="postnummer_ret-id"></span>
								   		</p>		

								   		<h4>Kokkens navn</h4>
								     	<p><span id="kok_ret-id"></span></p>
								  
								  		<h4>Medbring selv emballage</h4>
								  		<p><span id="emballage_ret-id"></span></p>
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
						  	<p>Dette er kun en testversion, så derfor kan du kun betale direkte til kokken.</p>
						 	 <p>Du bestiller derfor et måltid ved at overføre penge til kokken via mobilepay</p>
				 
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
								 		<select class="form-control selectpicker" 
								 				name="antal_ordre">
							  
											   <option value="1" selected>1</option>
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
											   			type="number" 
											   			class="form-control" 
											   			id="exampleInputPhone1" 
											   			placeholder="Indtast dit telefonnummer">
								   			</div>
								  	</div>
							
								  		
								  	
								</form>  	
		
				  
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


					<!--modal content som viser hvad man har bestilt-->
				  	<div id="bestil-med-mobil" class="modal-content">
				  		
				  		<!--modal header-->
				  		<div class="modal-header">
							<button type="button" 
									class="close" 
									data-dismiss="modal" 
									aria-label="Close">
									<span aria-hidden="true">&times;</span>
							</button>
					
							<h4 class="modal-title">Frem med mobilen!</h4>
				  		</div>
				  
				  		<!-- modal body-->
				  		<div class="modal-body">
				  		
				  
							   <p>For at bestille (antal valgt) portioner af (valgte ret) til (pris pr portion) kr pr. portion skal du overføre (antal*pris) kr til (nummer på kok) via mobilepay</p>
							   
							   <p>Maden skal afhentes d. (dato) kl (tid) </p>
							   
							   <p>(Du skal selv have emballage med) / (Kokken sørger for emballage)</p>
							   
							   <p>Overfør via mobilepay for at gennemføre købet!</p>
				  		</div>

				  		<!-- modal footer-->
				  		<div class="modal-footer">
							<button type="button" 
									class="btn btn-default" 
									id="tilbage4"
									>Tilbage
							</button>
					
							<button type="button" 
									class="btn btn-primary"
									id="videre4" 
									>Jeg har overført via mobilepay!
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
									data-dismiss="modal">Afslut
							</button>
					  	</div>
					</div>
				
					
				  
				  
					</div>
			  	</div>
			</div>



			
	
   
   
   
   
   