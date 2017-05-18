<html lang="en">

	<head>
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
						<h1>Hjemmelavet takeaway</h1>
					</div>

					<div class="header-div3 row row-centered">
						<h2>Lad Mahlzeit hjælpe dig med at undgå madspild. Juhu</h2>
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

 
  		<!--script til at vise dynamisk info i modals -->
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
				      $('#ID_ret-id').html(data.ID_ret);
				      $('#titel_ret-id').html(data.titel_ret);
					  $('#beskrivelse_ret-id').html(data.beskrivelse_ret);
					  $('#afhentningstidsrum_ret-id').html(data.afhentningstidsrum_ret);
					  $('#adresse_ret-id').html(data.adresse_ret);
				      $('#postnummer_ret-id').html(data.postnummer_ret);
					  $('#bestillinglukker_ret-id').html(data.bestillinglukker_ret);
				      $('#antal_ret-id').html(data.antal_ret);
				      $('#pris_ret-id').html(data.pris_ret);
				      $('#allergener_ret-id').html(data.allergener_ret);
					  $('#telefonnummer_ret-id').html(data.telefonnummer_ret);
					  $('#emballage_ret-id').html(data.emballage_ret);
					  $('#kok_ret-id').html(data.kok_ret);
					  $('#email_ret-id').html(data.email_ret);
					 
				      $('#modal-loader').hide();    // hide ajax loader
				  })
				  .fail(function(){
				      $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
				  });
				  
				 });
				 
				});

		
	 
		</script> 
 <script>
 	$(document).ready(function() {
	//define variable
	var uid;
  
  $(document).on('click', '#getUser', function(e) {
    e.preventDefault();
    // set it in one function
    uid = $(this).data('id'); // get id of clicked row
    console.log(uid);
    
    
  });

  $("#bestilform").on("submit", function(e) {
    var formURL = $(this).attr("action");
 	    var antal_ordre = $("select[name$='antal_ordre']").val();
    	var navn_ordre = $("input[name$='navn_ordre']").val();
    	var email_ordre = $("input[name$='email_ordre']").val();
    	var telefonnummer_ordre = $("input[name$='telefonnummer_ordre']").val();
		// uid will be avaiable over here
	    $.ajax({
	      url: formURL,
	      type: "POST",
	      data: {
	        'id': uid,
	        'antal_ordre': antal_ordre,
	        'navn_ordre': navn_ordre,
	        'email_ordre': email_ordre,
	        'telefonnummer_ordre': telefonnummer_ordre
	      },
	      dataType: 'json'
	    });    
	    
	     
	    return false;
    });

  //submit form with id #submitForm

  $("#submitForm").on('click', function() {
 
    $("#bestilform").submit();
  });
});
 	
 </script>

<!-- 			<script>	
			//Get data from form in modal step 2 and insert in ordre table - action="bestil.php" står i den form data kommer fra, som er i index.modal.koeb.php
$(document).ready(function () {


    $("#bestilform").on("submit", function(e) {
        //var postData = $(this).serializeArray();
       
        var formURL = $(this).attr("action");
        var antal_ordre = $("antal_ordre").val();
        var navn_ordre = $("navn_ordre").val();
        var email_ordre = $("email_ordre").val();
        var telefonnummer_ordre = $("telefonnummer_ordre").val();
      
      	

       
        $.ajax({
            url: formURL,
            type: "POST",
            data: {'FK_ret': FK_ret, 'antal_ordre': antal_ordre, 'navn_ordre': navn_ordre, 'email_ordre': email_ordre, 'telefonnummer_ordre': telefonnummer_ordre},
            dataType: 'json'
            })


            
			//hide modalcontant and show order
            success: function(data, textStatus, jqXHR) {
                
                $("#seordre").show();
                $("#afgivordre").hide();
            },
            error: function(jqXHR, status, error) {
                console.log(status + ": " + error);
            }
        });
        e.preventDefault();
    });
     
//submit form med id'et #submitForm
    $("#submitForm").on('click', function() {
        $("#bestilform").submit();
    });
});


</script> -->

<script>
	//Frem fra handelsbetingelser-ved-kob (step 1)
		$("#videre1").click(function() {
			 $("#dynamisk-med-info").show();
          	$("#handelsbetingelser-ved-kob").hide();
		});

</script>

<script>
	//Tilbage fra dynamisk-med-info (step 2)
		$("#tilbage2").click(function() {
			 $("#handelsbetingelser-ved-kob").show();
          	$("#dynamisk-med-info").hide();
		});

</script>

<script>
	//Frem fra dynamisk-med-info (step 2)
		$("#videre2").click(function() {
			 $("#formular-til-bestilling").show();
          	$("#dynamisk-med-info").hide();
		});

</script>

<script>
	//Tilbage fra formular-til-bestilling (step 3)
		$("#tilbage3").click(function() {
			 $("#dynamisk-med-info").show();
          	$("#formular-til-bestilling").hide();
		});

</script>

<script>
	//Frem fra formular-til-bestilling (step 3)
		$("#submitForm").click(function() {
			 $("#bestil-med-mobil").show();
          	$("#formular-til-bestilling").hide();
		});

</script>

<script>
	//Tilbage fra bestil-med-mobil (step 4)
		$("#tilbage4").click(function() {
			 $("#formular-til-bestilling").show();
          	$("#bestil-med-mobil").hide();
		});

</script>

<script>
	//Frem fra bestil-med-mobil (step 4)
		$("#videre4").click(function() {
			 $("#du-modtager-mail").show();
          	$("#bestil-med-mobil").hide();
		});

</script>






<!-- <script>
	$(document).ready(function(){
				 
				 $(document).on('click', '#getUser', function(e){
				  
				  e.preventDefault();
				  
				  var uid = $(this).data('id'); // get id of clicked row
					 
					 console.log(uid);


				
			
				  
				  // $.ajax({
				  //     url: 'bestil.php',
				  //     type: 'POST',
				  //     data: 'id='+uid,

				      
				  //   /*  data: {'id': 'uid'}*/
				  // })

				  // })

				

				  	  $.ajax({
				      url: 'bestil.php',
				      type: 'POST',
				      data: {'id': uid, 'antal_ordre': "25", 'navn_ordre': 'tibi', 'email_ordre': 'ff@dr.dk', 'telefonnummer_ordre': '33223344'},
				      dataType: 'json'
				  })


				})
			})


</script> -->



  </body>
</html>
