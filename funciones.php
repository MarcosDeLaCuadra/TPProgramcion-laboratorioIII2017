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
                      
                         <button type="button" class="btn btn-info btn-sm" id="buscarbtn">
                                 <span class="glyphicon glyphicon-road"></span> <b style= "color:black">Buscar vehiculo</b>
                         </button>
                    
                         </div>';

            echo $botones;


            
        }
        else {
             header('location: login.php'); 
        }

     }

     function validarPatenteRepetida($patente){
         $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	     $consulta = $objetoAccesoDato->RetornarConsulta("SELECT patente FROM  cocheras WHERE patente = '$patente'");
	     $resultado = $consulta->execute();
         $cantidad = $consulta->rowCount();         
         if($cantidad >  0 ){
                return true;
         }else{
             return false;
         }
     }

     function estaOcupadaCochera($numCochera){
         $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	     $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM  cocheras WHERE numCochera = '$numCochera'");
	     $resultado = $consulta->execute();
         $cantidad = $consulta->rowCount(); 
         if($cantidad >  0 ){
                return true;
         }else{
             return false;
         }   
     }

     function validarDiscapacitado($esDisca,$numCochera){

         if(($numCochera == "1_1" || $numCochera == "2_1" || $numCochera == "3_1") && $esDisca == "no") {
             return true;
         }else{
            return false;
         }

     }

?>