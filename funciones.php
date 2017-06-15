<?php
include_once "Clases/AccesoDatos.php";
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

     function calcularImporte($hsIngreso,$fechaIngreso,$hsSalida,$fechaSalida){
        
       $diaIngresoArray = explode('/',$fechaIngreso);
       $diaIngreso = $diaIngresoArray[0];
       $diaSalidaArray = explode('/',$fechaSalida);
       $diaSalida = $diaSalidaArray[0];

       $hsIngresoArray = explode(':',$hsIngreso);
       $hsIng = $hsIngresoArray[0];
       $hsSalidaArray = explode(':',$hsSalida);
       $hsSal = $hsSalidaArray[0];
    
     /* if($diaIngreso == $diaSalida){
            $importe = $hsSal - $hsIng;
            return $importe; 
      }

     $totaldias =   $diaSalida - $diaIngreso ;
     $calcularIngreso=  24 - $hsIng;

     if($totaldias == 1)
     {
        $calcularEgreso = $hsSalida;
        $totalImporte = $calcularIngreso + $calcularEgreso;
        return $totalImporte;
     }
     if($totaldias > 1)
     {
        $calcularEgreso= (($totaldias - 1 )* 24 ) + $hsSalida;
        $totalImporte = $calcularIngreso + $calcularEgreso;
        return $totalImporte; 

     }*/

     $totalHs = $hsSal - $hsIng; 
     $importe = 0;
     if($totalHs > 0 && $totalHs < 12) 
     {
           $importe = $totalHs * 10 ; 
            return $importe;
     }
     if($totalHs >= 12 && $totalHs < 24){
          $importe = 90;
          return $importe;
     }

     if($totalHs == 24){

          $importe= 170;
          return $improte;
     }
     if($totalHs == 0){
         return $importe;
     }
    
         
      
}
    function ValidarStatus($usuario){

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta = $objetoAccesoDato->RetornarConsulta(" SELECT * FROM empleados WHERE usuario = '$usuario' ");
        $resultado = $consulta->execute();
        $cantidad = $consulta->rowCount();

        if($cantidad > 0){
            return true;
        }
    return false;
    }


    function Update ($oldpatente,$newpatente,$marca,$color,$esDisca){

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta = $objetoAccesoDato->RetornarConsulta(" UPDATE cocheras SET patente = '$newpatente', marca = '$marca',color = '$color', esDisca = '$esDisca' WHERE patente = '$oldpatente' ");
        $resultado = $consulta->execute();
        $cantidad = $consulta->rowCount();
       // meter en tabla operaciones una columna + que diga si es modificacion, alta, baja etc y cambios etc

    }

    function traerPatentes(){

     $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	 $consulta = $objetoAccesoDato->RetornarConsulta("SELECT patente,id FROM  cocheras");
	 $resultado = $consulta->execute();
     $patentes = $consulta->fetchAll();
	 
     return $patentes; 

    }

    function buscarPorPatente($patente){
     $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	 $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM  cocheras WHERE patente = '$patente'");
	 $resultado = $consulta->execute();
     $cantidad = $consulta->rowCount();
     if($cantidad > 0){

         $json_array = array(); 
         while ($row = $consulta->fetch()) {

             array_push($json_array,array("patente"=>$row['patente'],"marca"=>$row['marca'],"color"=>$row['color'],"esDisca"=>$row['esDisca'],"id"=>$row["id"],"numcochera"=>$row['numCochera']));
             
         }
         return  $json_array;
     }
   }

?>