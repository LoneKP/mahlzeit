// JavaScript Document

//få fat i "ret" tabellen og vis den under "køb"
$(document).ready(function() {




    $.ajax({
        type:'post',
        url:"fetch_ret.php",
        datatype:'json',
        success: function (data) {
          console.log(data);
          formatData=data;
          afhentningstidsrum = formatData.afhentningstidsrum_ret;
             afhentningstidsrum_LT = moment(afhentningstidsrum).format('LT');
          afhentningstidsrum_LLLL = moment(afhentningstidsrum).format('LLLL');
          afhentningstidsrum_add = moment(afhentningstidsrum).add(10, 'm');
          afhentningstidsrum_plus10 = moment(afhentningstidsrum_add).format('LT');
               var c = [];
     $.each(data, function(i, item) {             
         c.push("<tr><td>" + afhentningstidsrum_LLLL + "</td>");
         c.push("<td>" + item.titel_ret + "</td>");
         c.push("<td>" + item.adresse_ret + "</td>");
         c.push("<td>" + item.postnummer_ret + "</td>");
         c.push("<td>" + item.antal_ret + "</td>");
         c.push("<td>" + item.pris_ret + "</td>");
         c.push("<td>" + item.emballage_ret + "</td></tr>");               
     });

     $('#tabel2').append(c.join(""));

    
        // var trHTML = '';
        // $.each(data, function (i, item) {
        //     trHTML += '<tr><td>' + item.ID_ret + '</td><td>' + item.titel_ret + '</td><td>' + item.postnummer_ret + '</td></tr>';
        // });
        // $('#tabel2').append(trHTML);





    
//         success:function(data)
//         {
//             console.log(data);

//             function responseHandler(data)
// {
//      var c = [];
//      $.each(data, function(i, item) {             
//          c.push("<tr><td>" + item.titel_ret + "</td>");
//          c.push("<td>" + item.adresse_ret + "</td>");
//          c.push("<td>" + item.postnummer_ret + "</td></tr>");               
//      });

//      $('#tabel2').html(c.join(""));
// }


            // $(function(){
            //     $.each(data,function(i,item){
            //         var tr = $('<tr>').append(
            //         $('<td>').text(item.titel_ret),
            //         $('<td>').text(item.kok_ret),
            //         $('<td>').text(item.postnummer_ret),
            //         //$('<td>').text(item.password),
            //         $('<td>').text(item.telefonnummer_ret),

            //     );
            //     $("#table2 tbody").append(tr); 
            //     //console.log(tr.wrap('<p>').html());
            //     })
            // })

        }
    })
  
});





$('#tabs a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
});

 $(function () {
                $('#datetimepicker1').datetimepicker({ 
                  minDate: moment(), // Current day
                  format: 'DD-MM-YYYY HH:mm',
                  stepping: 15

                });
            });


//sæt "her lukker mulighed for bestilling" til altid at være tidligere end "afhentningstidspunkt"
  $('.tidsscript').on('dp.change', function (e) {
    $('#datetimepicker2').data('DateTimePicker').maxDate(e.date);

    //Use moment.js here
    var m = moment(new Date(e.date));
    $('#datetimepicker2').data('DateTimePicker').maxDate(m);
});


   $(function () {
                  $('#datetimepicker2').datetimepicker({
                    minDate: moment(), // Current day   
                    format: 'DD-MM-YYYY HH:mm',
                    stepping: 15,
                    // maxDate: new Date().setDate(new Date().getDate() + 1),
                  });
              });




        // få ID når der klikkes på "køb" knappen, og hent informationer, der relaterer sig til det ID
        $(document).ready(function(){
         
         $(document).on('click', '#getUser', function(e){
          
          e.preventDefault();
          
          var uid = $(this).data('id'); // get id of clicked row
           
           console.log(uid);
          
          
          $.ajax({
              url: 'fetch_record.php',
              type: 'POST',
              data: 'id='+uid,
              dataType: 'json'
          })

          .done(function(data){
              console.log(data);

              dataLogged = data; 

            
              $('#ID_ret-id').html(data.ID_ret);
              $('.titel_ret-id').html(data.titel_ret);
            $('#beskrivelse_ret-id').html(data.beskrivelse_ret);
            // $('.afhentningstidsrum_ret-id').html(data.afhentningstidsrum_ret);
            $('#adresse_ret-id').html(data.adresse_ret);
              $('#postnummer_ret-id').html(data.postnummer_ret);
              $('#by_ret-id').html(data.by_ret);
            $('#bestillinglukker_ret-id').html(data.bestillinglukker_ret);
              $('#antal_ret-id').html(data.antal_ret);
              $('.pris_ret-id').html(data.pris_ret);
              $('#allergener_ret-id').html(data.allergener_ret);
            $('#telefonnummer_ret-id').html(data.telefonnummer_ret);
            $('#allergener_ret-id').html(data.allergener_ret);
            // $('#emballage_ret-id').html(data.emballage_ret);
            $('#kok_ret-id').html(data.kok_ret);
            $('#email_ret-id').html(data.email_ret);   
              

             //lav forskellige formater af det tidspunkt sælgeren har sat ind
          afhentningstidsrum = dataLogged.afhentningstidsrum_ret;
          afhentningstidsrum_LT = moment(afhentningstidsrum).format('LT');
          afhentningstidsrum_LLLL = moment(afhentningstidsrum).format('LLLL');
          afhentningstidsrum_add = moment(afhentningstidsrum).add(10, 'm');
          afhentningstidsrum_plus10 = moment(afhentningstidsrum_add).format('LT');


          $(".afhent_ret").html(afhentningstidsrum_LLLL);
          $(".afhent_ret_tid").html(afhentningstidsrum_LT);
          $(".afhent_ret_tid_10").html(afhentningstidsrum_plus10);


           //vis antal ret tilbage i dropdown ved bestilling, så man ikke kan komme til at bestille flere retter end der er
            var options = [];

            for (var i = 1; i <= dataLogged.antal_ret; i++) {
               options.push(i);
            }
           

            $('#bestilAntal').empty();
            $.each(options, function(i, p) {
                $('#bestilAntal').append($('<option></option>').val(p).html(p));
            });

            //vis antal der er valgt til regnestykke i bestillingmodal
            function displayVals() {
              var singleValues = $( "#bestilAntal" ).val();
                $( "#dynamiskBestilling" ).html(singleValues); 
                $("#dynamiskPrisudregning").html(dataLogged.pris_ret*singleValues);
                  
            }
 
            $( "select" ).change( displayVals );
            displayVals();

              //split allergener op i array, så de kan vises enkeltvist med komma og mellemrum imellem
            var json = [];
            var to = data.allergener_ret;
            var toSplit = to.split(",");
            for (var i = 0; i < toSplit.length; i++) {
                json.push({"allergener":toSplit[i]});
            }
            console.log(toSplit);

                $.each(toSplit, function(i, p) {
                  if(i == toSplit.length-2)
                  {
                    p = p + " & ";

                  }else if(i != toSplit.length-1)
                  {
                    p = p + ", ";
                  }
                  $('#allergenerlabels').append($('<span></span>').val(p).html(p));
                });              
              })

      

            //om sælger eller køber skal have emballage inputtes som boolean, og derfor er 1 at sælger selv sørger for emballage og 0 at køber skal have emballage med. Det vises i modal inden man køber.
            .then(function(data) {
            if (data.emballage_ret > 0) {
                $('#emballage_ret-id').html('<i class="glyphicon glyphicon-info-sign"></i> Sælger sørger for emballage');
            
            }
            else {
                $('#emballage_ret-id').html('<i class="glyphicon glyphicon-info-sign"></i> Du skal selv medbringe emballage');
            }
            
          })

      
          .fail(function(){
              $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Noget gik galt - prøv igen');
          });
          
         });
         
        });



  





 
          //Frem fra handelsbetingelser-ved-kob (step 1)
            $("#videre1").click(function() {
               $("#dynamisk-med-info").show();
                    $("#handelsbetingelser-ved-kob").hide();
            });


          //Tilbage fra dynamisk-med-info (step 2)
            $("#tilbage2").click(function() {
               $("#handelsbetingelser-ved-kob").show();
                    $("#dynamisk-med-info").hide();
            });


          //Frem fra dynamisk-med-info (step 2)
            $("#videre2").click(function() {
               $("#formular-til-bestilling").show();
                    $("#dynamisk-med-info").hide();
            });


          //Tilbage fra formular-til-bestilling (step 3)
            $("#tilbage3").click(function() {
               $("#dynamisk-med-info").show();
                    $("#formular-til-bestilling").hide();
            });

          //afslut efter endt bestilling(step 4)
            $("#afslut").click(function() {
              location.reload();
            });


          //klik på kryds efter endt bestilling (step 4)
            $(".close").click(function() {
              location.reload();
            });

    

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
            // sends information to bestil.php
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

          
              //få ID'et
               $.ajax({
                url: 'fetch_record.php',
                type: 'POST',
                data: 'id='+uid,
                dataType: 'json'
              }).done(function(data){
                //console.log(data);
                pris = data.pris_ret;

         
                $("#antal_ordre-id").html(antal_ordre);
                $("#navn_ordre-id").html(navn_ordre);
                $("#email_ordre-id").html(email_ordre);
                  $("#telefonnummer_ordre-id").html(telefonnummer_ordre);
                  $("#prisudregning-id").html(pris*antal_ordre);

              })  

              return false;
            });

          //submit form with id #submitForm

          $("#submitForm").on('click', function() {
         
            $("#bestilform").submit();
          });

            $("#submitForm").click(function() {
          $("#du-modtager-mail").show();
            $("#formular-til-bestilling").hide();

              return false;
            });

        });
 

