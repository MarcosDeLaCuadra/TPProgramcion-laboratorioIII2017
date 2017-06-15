$(document).ready(function() {
   
   //alert("se cargo el documento");
    $('body').css('background', '#CEE3F6');
   


//____________BOTONES MENU___________________

       $("#ingresabtn").click(function() {
               
           /*
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
        */
        $("#contenido").remove();
        $('body').append('<div id="contenido"></div>'); 
        $("#contenido").load('partes/formIngreso.php');
           
          
    });

    
        $("#buscarbtn").click(function() {
          /* 
         $.ajax({
             url:'partes/formSalida.php',
             type:'POST',
             async: true,
             beforeSend: function () {
                     $("#contenido").html("<center><img src='imagenes/spinner.gif'></center>"); 
             },
             success: function (dataRespuesta){
                      $("#contenido").html(dataRespuesta);
            }
             
           });
        */
        $("#contenido").remove();
        $('body').append('<div id="contenido"></div>'); 
        $("#contenido").load('partes/formSalida.php');
        });


//____________END BOTONES MENU______________



//_____________FORM INGRESO________________

          $("#resetbtn").click(function() {
            
            
             $('#patente').val("");
             $('#marca').val("");
             $('#color').val("");           
             $("#optradiosi").prop("checked", "");
             $("#optradiono").prop("checked", true);
            // $("#numPiso").val("1");
             $('#numCochera > option[value="0"]').attr('selected', 'selected'); // revisar
             $("#respuesta").empty();

       }); 
      // $("#contenido").on("click",".botonguardar", function(){ 
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
                             $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
                    },
                  success: function (dataRespuesta){
                    
                     $("#respuesta").html(dataRespuesta);
          
                  }

              });
              
             
         });

            $("#ocupadasbtn").click(function() {
            
            $.ajax({

                   url:'partes/nexo.php',
                   type:'POST',
                   data:{operacion:"verCocherasOcupadas"},
                   async: true,
                   beforeSend: function () {
                             $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
                    },
                  success: function (dataRespuesta){
                    
                     $("#respuesta").html(dataRespuesta);
          
                  }

            });
                     
        });
  

//_________________END FORM INGRESO________________

//_________________FORM SALIDA_____________________



        $("#resetbtn2").click(function() {

             $('#patente').val("");
             $("#respuesta").empty();

       }); 

        $("#mostrarPatenteBtn").click(function() {
            
             $.ajax({
             url:'partes/nexo.php',
             type:'POST',
             data:{operacion:"mostrar",patente: $('#patente').val()},
             async: true,
             beforeSend: function () {
                     $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
             },
             success: function (dataRespuesta){
               
                  $("#respuesta").html(dataRespuesta);
            }
             
           });
             
      });
      /*
        $("#sacarbtn").click(function() {
        
          
           
             $.ajax({
             url:'partes/nexo.php',
             type:'POST',
             data:{operacion:"borrar",patente: $(this).val()},
             async: true,
             beforeSend: function () {
                     $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
             },
             success: function (dataRespuesta){
               
                  $("#respuesta").html(dataRespuesta);
            }
             
           });
           

       }); 
        */

$("#respuesta").on("click",".botonbaja", function(){ 
   
     $.ajax({
             url:'partes/nexo.php',
             type:'POST',
             data:{operacion:"borrar",patente: $(this).val()},
             async: true,
             beforeSend: function () {
                     $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
             },
             success: function (dataRespuesta){
               
                  $("#respuesta").html(dataRespuesta);
            }
             
           });

 });

 $("#respuesta").on("click",".botonmodif", function(){ 

       
            $.ajax({
             url:'partes/formActualizar.php',
             type:'POST',
             data:{patente: $(this).val()},
             async: true,
             beforeSend: function () {
                     $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
             },
             success: function (dataRespuesta){
               
                  $("#respuesta").html(dataRespuesta);
            }
             
           });
 });
 
//____________________END FORM SALIDA_______________________

//____________________FORM UPDATE___________________________
 $("#respuesta").on("click",".btnactualizar", function(){ 
          
         var oldpatente = document.getElementById("patente1").placeholder; // con jquery no lo agarra
         var patente= $('#patente1').val();// dejarle el id asi sino rompe
         var marca= $('#marca1').val();
         var color= $('#color1').val();
         var id = document.getElementById("id1").placeholder;
         var numcochera = document.getElementById("numcochera").placeholder; 
        var discapacitado;

              if($("#optradiosi").is(':checked')){
                discapacitado = "si";
              }else{
                discapacitado = "no";
              }

       
    

        $.ajax({
             url:'partes/nexo.php',
             type:'POST',
             data:{operacion:"actualizar",patente: patente , marca: marca , color: color,esDisca:discapacitado,oldpatente: oldpatente,id:id,numcochera:numcochera },
             async: true,
             success: function (dataRespuesta){
               
                  $("#respuesta").html(dataRespuesta);
            }
             
           });
           
       
        
 });

//____________________END FORM UPDATE_______________________

//____________________FORM MOVER___________________________

 $("#respuesta").on("click",".botonmover", function(){ 

          $.ajax({
             url:'partes/formMover.php',
             type:'POST',
             data:{patente: $(this).val()},
             async: true,
             beforeSend: function () {
                     $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
             },
             success: function (dataRespuesta){
               
                  $("#respuesta").html(dataRespuesta);
            }
             
           });

        
 });

  $("#respuesta").on("click",".btnmover", function(){ 

        var patente = document.getElementById("patente1").placeholder; 
        var numcochera = document.getElementById("numcochera").placeholder; 

         $.ajax({
             url:'partes/nexo.php',
             type:'POST',
             data:{operacion:"movercochera",patente: patente ,numcochera:numcochera },
             async: true,
             success: function (dataRespuesta){
               
                  $("#respuesta").html(dataRespuesta);
            }
             
           });
           

  });

//____________________END FORM MOVER___________________________
});