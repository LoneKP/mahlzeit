	<!DOCTYPE html>
	 <!--  Køb mad faneblad-->

				     <div 	role="tabpanel" 
				     		class="tab-pane active row universal-padding padding-top-bottom-afsnit" 
				     		id="Køb-mad">

				    <h3>Køb takeawaymad</h3>
				 
				    <p>Her kan du købe takeawaymad, som du selv skal afhente. 
				    Maden bliver lavet af foodtrucks, små cateringfirmaer,
				     små madiværksættere samt private.</p>
	    

	    
		    <?php
				
				require_once 'DBconnect.php';
		  
				$sql = "SELECT * FROM ret";
				$result = $conn->query($sql);
			?>

	<!doctype html>

		<table 	id="tabel" 
				class="table table-hover table-responsive" >
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
					
				<?php

					//Fetch Data from database
						
						if($result->num_rows > 0){
						 while($row = $result->fetch_assoc()){
						 
				?>

		
					
				 	<td><?php echo $row['titel_ret']; ?></td>
					 <td><?php echo $row['afhentningstidsrum_ret']; ?></td>
					 <td><?php echo $row['adresse_ret']; ?></td>
					 <td><?php echo $row['postnummer_ret']; ?></td>
					 <td><?php echo $row['postnummer_ret']; ?></td>
					 <td><?php echo $row['pris_ret']; ?></td>
					 <td><?php echo $row['emballage_ret']; ?></td>
					 <td><?php echo $row['kok_ret']; ?></td>

					 <td 	id="getUser" 
					 		data-target="#super-modal" 
					 		class="btn btn-default btn-small" 
					 		data-toggle="modal" 
					 		data-id="<?php echo $row['ID_ret']; ?>">Køb</a>
					 </td> 


					 </tr>

				<?php
						 }}
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

					
			
		</table>		
	   

	   
	       </div>
