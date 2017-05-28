$(document).ready(function() {

    $('body').css('background', '#CEE3F6');

       $("#ingresabtn").click(function() {
            
         $.ajax({

            url:'partes/formIngreso.php',  
            type:'POST',
            async: true,
            beforeSend: function () {
                        $("#contenido").html("<center><img src='imagenes/spinner.gif'></center>"); 
            },
            success: function (dataRespuesta){
                $("#contenido").html(dataRespuesta);
            }

        });

       });

       
        $("#resetbtn").click(function() {
            
            
             $('#patente').val("");
             $('#marca').val("");
             $('#color').val("");           
             $("#optradiosi").prop("checked", "");
             $("#optradiono").prop("checked", "");
             $("#numPiso").val("1");
             $("#numCochera").val("1");
       });

       $("#guardarbtn").click(function() {

              var discapacitado;

              if($("#optradiosi").is(':checked')){
                discapacitado = "si";
              }else{
                discapacitado = "no";
              }
             
              $.ajax({

                   url:'partes/nexo.php',
                   type:'POST',
                   data:{operacion:"alta",patente: $('#patente').val(), marca: $('#marca').val(),color: $('#color').val(),optradio: discapacitado,cochera:$('#numCochera').val()},
                   async: true,
                   beforeSend: function () {
                             $("#respuesta").html("<center><img src='http://localhost/TP/imagenes/spinner.gif'></center>"); 
                    },
                  success: function (dataRespuesta){
                      $("#respuesta").html(dataRespuesta);
                  }

              });
             
         });

      $('#optradiosi').change(function() {
            
        $('#numCochera').removeAttr('disabled');
        $('#cochera1_1').removeAttr('disabled');
        $('#cochera2_1').removeAttr('disabled');
        $('#cochera3_1').removeAttr('disabled');
        //----
                        $('#cochera1_1').css('color','green');
                        $('#cochera2_1').css('color','green');
                       $('#cochera3_1').css('color','green');
                      $('#cochera1_2').css('color','green');
                       $('#cochera2_2').css('color','green');
                        $('#cochera3_2').css('color','green');
                        $('#cochera1_3').css('color','green');
                        $('#cochera2_3').css('color','green');
                        $('#cochera3_3').css('color','green');
      
         $.ajax({
					url: 'partes/nexo.php',					
					type: 'POST',
					data: {operacion:"ValidarCochera"},                    
					async: true,
                    dataType: 'JSON',
                   success: function (dataRespuesta){                   
                    for(var i=0;i<dataRespuesta.length;i++){
                         
                          var id = dataRespuesta[i]["id"];
                          $('#cochera'+id+'').attr('disabled', 'disabled');
                         // $('#cochera'+id+'').css('background-color','#B0C4D0');
                           $('#cochera'+id+'').css('color','red');
                          
                    }                
                   }
                     

             
            

       });
 });





         $('#optradiono').change(function() {
            
            
        $('#numCochera').removeAttr('disabled');
        $('#cochera1_1').attr('disabled', 'disabled');
        $('#cochera2_1').attr('disabled', 'disabled');
        $('#cochera3_1').attr('disabled', 'disabled');
       $('#cochera1_1').css('color','red');
        $('#cochera2_1').css('color','red');
      $('#cochera3_1').css('color','red');
                        $('#cochera1_2').css('color','green');
                       $('#cochera2_2').css('color','green');
                        $('#cochera3_2').css('color','green');
                        $('#cochera1_3').css('color','green');
                        $('#cochera2_3').css('color','green');
                        $('#cochera3_3').css('color','green');

          $.ajax({
					url: 'partes/nexo.php',					
					type: 'POST',
					data: {operacion:"ValidarCochera"},                    
					async: true,
                    dataType: 'JSON',
                   success: function (dataRespuesta){                   
                    for(var i=0;i<dataRespuesta.length;i++){

                        
                          var id = dataRespuesta[i]["id"];
                          $('#cochera'+id+'').attr('disabled', 'disabled');
                          $('#cochera'+id+'').css('color','red');
                    }                
                   }
                     

             
            

       });

       });



});