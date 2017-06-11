	<!DOCTYPE html>
	 <!--  Køb mad faneblad-->

				     <div 	role="tabpanel" 
				     		class="tab-pane active row universal-padding padding-top-bottom-afsnit" 
				     		id="Køb-mad">

				    <h3>Køb takeawaymad</h3>
				 
				    <p>Her kan du købe takeawaymad, som du selv skal afhente. 
				    Maden bliver lavet af foodtrucks, små cateringfirmaer,
				     små madiværksættere samt private.</p>

			
	    
<table class="table table-hover table-responsive">
	<thead>
						<tr>
							<th>Afhent</th> 
							<th>Titel på ret</th>	
							<th>Adresse</th>
							<th>Postnummer</th>
							<th>Måltider tilbage</th>
							<th>Pris pr. måltid</th>
							<th>Medbring selv emballage</th>
							<th></th>		
						</tr>
					</thead>
					<tbody id="tabel2">

					</tbody>
</table>
	    
		    <?php
				
				require_once 'DBconnect.php';
		  
				$sql = "SELECT * FROM ret WHERE udsolgt_ret=0";
				$result = $conn->query($sql);
			?>

	<!doctype html>
	<div class="table-responsive">
		<table 	id="tabel" 
				class="table table-hover table-responsive" >
					<thead>
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
					</thead>
				<?php

					//Fetch Data from database
						
						if($result->num_rows > 0){
						 while($row = $result->fetch_assoc()){
						 
						$output = '';
						
						$afhentningstidsrum = date("d.m.y H:i",strtotime($row['afhentningstidsrum_ret']));
						
				?>
			
				 	<td><?php echo $row['titel_ret']; ?></td>
					<td><?php echo $afhentningstidsrum; ?></td>
					<td><?php echo $row['adresse_ret']; ?></td>
					<td><?php echo $row['postnummer_ret']; ?></td>
					<td><?php echo $row['antal_ret']; ?></td>
					<td><?php echo $row['pris_ret']; ?></td>
					<td><?php if ($row['emballage_ret'] < 1) {
						 ?><i class="glyphicon glyphicon-ok"></i><?php echo $output;
						 }?>
					</td>
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

	   
	       </div>
