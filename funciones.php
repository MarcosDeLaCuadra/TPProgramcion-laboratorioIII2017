<?php

     function mostrarBotones($rol,$username){

        if($rol == 'admin'){

            $botones =' 
                        <form method="POST" action="logout.php">
                             <button type="submit" class="btn btn-danger btn-sm">
                                 <span class="glyphicon glyphicon-off"></span> <b>Cerrar sesion <font color="#99FF99">'.$username.'</font></b> 
                            </button>
                         </form>
                         <br>
                         <div style="border-left: 5px solid black; background-color: gray; border-top: 5px solid black ;border-right: 5px solid black">
                         <button type="button" class="btn btn-info btn-sm" id="empleadosbtn">
                                <span class="glyphicon glyphicon-paperclip"></span> <b style= "color:black">Detalles de empleados</b>
                         </button>

                         <button type="button" class="btn btn-info btn-sm" id="cocherasbtn">
                                <span class="glyphicon glyphicon-paperclip"></span> <b style= "color:black">Detalles de cocheras</b>
                         </button>

                         <button type="button" class="btn btn-info btn-sm" id="autosbtn">
                                <span class="glyphicon glyphicon-paperclip"></span> <b style= "color:black">Detalle de autos estacionados</b>
                         </button></div> 
                      ';
            
            echo $botones;
       
     
        }
        else if ( $rol == "empleado"){
            
            $botones = '<form method="POST" action="logout.php">
                             <button type="submit" class="btn btn-danger btn-sm">
                                 <span class="glyphicon glyphicon-off"></span> <b>Cerrar sesion <font color="#99FF99">'.$username.'</font></b> 
                            </button>
                         </form>
                         <br>
                         <div style="border-left: 5px solid black; background-color: gray; border-top: 5px solid black ;border-right: 5px solid black">

                         <button type="button" class="btn btn-info btn-sm" id="ingresabtn">
                                  <span class="glyphicon glyphicon-road"></span> <b style= "color:black">Ingresa vehiculo</b> 
                         </button>
                      
                         <button type="button" class="btn btn-info btn-sm" id="salebtn">
                                 <span class="glyphicon glyphicon-road"></span> <b style= "color:black">Sale vehiculo</b>
                         </button>
                    
                         </div>';

            echo $botones;


            
        }
        else {
             header('location: login.php'); 
        }

     }

?>