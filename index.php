<html>

	<head>
	   <meta charset="UTF-8">
	  		 <meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Mahlzeit</title>

				<link rel="stylesheet" href="css/bootstrap.css">
				<link rel="stylesheet" href="css/styles.css">
				<link rel="stylesheet" href="bower_components/bootstrap-select/dist/css/bootstrap-select.css">
				<link rel="stylesheet" href="bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css">
				
				
				<link rel="stylesheet" href="css/jquery.restable.css">
			<link href="https://fonts.googleapis.com/css?family=Just+Another+Hand|Open+Sans:300,400,500,600,700|Work+Sans:400,600,700,900" rel="stylesheet">
  	</head>

 <body data-spy="scroll" data-target=".navbar" id="bootstrap-overrides">
 	<div class="container-fluid">
		
					<div class="navbar-link">
					<a 	class="navbar-text navbar-right" 
						id="handelsbetingelser" 
						data-toggle="modal" 
						data-target="#myModal">Handelsbetingelser</a>
					</div>

	<!--  header-->
	
		<header id="top" 
				class="row universal-padding header-image">
					
				<div class="col-lg-12">
					
					<div class="header-div1 row row-centered">
						<img 	class="logo" 
								src="images/logo.png" 
								alt="Mahlzeit">
					</div>

					<div class="header-div2 row row-centered">
						<h1>Mahlzeit</h1>
					</div>

					<!-- <div class="header-div3 row row-centered">
						<h2>Støt den lokale madscene på et nyt online måltidsmarked</h2>
					</div> -->
					<div>
						<p class="text-white header-div4" id="invite-tekst">VIL DU KØBE ELLER SÆLGE HJEMMELAVET MAD?</p>
						

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
		 	<?php
			require 'index.saelg.php';
			require 'index.koeb.php';
			require 'index.modal.koeb.php';
			
			?>
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
<script src="bower_components/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js"></script>	
<script src="bower_components/bootstrap-select/js/bootstrap-select.js"></script>
<script src="bower_components/bootstrap-select/dist/js/i18n/defaults-da_DK.js"></script>  
<script src="plugins/jquery.tablesorter.js"></script>
<script src="js/jquery.restable.js"></script>
<script src="bower_components/bootstrap-validator/js/validator.js"></script>


 	  	 


 	<!-- 	<script>
			$('#tabel').ReStable({
			    keepHtml : true,
			    rowHeaders : false
			});
		</script> 
 -->



  </body>
</html>
