<?php

     function mostrarBotones($rol,$username){

        if($rol == 'admin'){

            echo "Hola,<b>".$username."</b><br>";

            $botones ='  <form method="POST" action="logout.php">
                             <button type="submit" class="btn btn-danger btn-sm">
                                 <span class="glyphicon glyphicon-off"></span> <b>Cerrar sesion</b> 
                            </button>
                         </form>
                         <br>
                         <button type="button" class="btn btn-info btn-sm" id="empleadosbtn">
                                <span class="glyphicon glyphicon-paperclip"></span> <b style= "color:black">Detalles de empleados</b>
                         </button>
                         <br>
                         <br>
                         <button type="button" class="btn btn-info btn-sm" id="cocherasbtn">
                                <span class="glyphicon glyphicon-paperclip"></span> <b style= "color:black">Detalles de cocheras</b>
                         </button>
                         <br>
                         <br>
                         <button type="button" class="btn btn-info btn-sm" id="autosbtn">
                                <span class="glyphicon glyphicon-paperclip"></span> <b style= "color:black">Detalle de autos estacionados</b>
                         </button>
                      ';
            
            echo $botones;
       
     
        }
        else if ( $rol == "empleado"){
            echo "Hola,".$username."<br>";
            $botones = '<form method="POST" action="logout.php">
                             <button type="submit" class="btn btn-danger btn-sm">
                                 <span class="glyphicon glyphicon-off"></span> <b>Cerrar sesion</b> 
                            </button>
                         </form>
                         <br>
                         <button type="button" class="btn btn-info btn-sm" id="ingresabtn">
                                  <span class="glyphicon glyphicon-road"></span> <b style= "color:black">Ingresa vehiculo</b> 
                         </button>
                         <br>
                         <br>
                         <button type="button" class="btn btn-info btn-sm" id="salebtn">
                                 <span class="glyphicon glyphicon-road"></span> <b style= "color:black">Sale vehiculo</b>
                         </button>
                         <br>';

            echo $botones;


            
        }
        else {
             header('location: login.php'); 
        }

     }

?>