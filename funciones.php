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
                         </button>
                          <button type="button" class="btn btn-info btn-sm" id="promediosbtn">
                                <span class="glyphicon glyphicon-signal"></span> <b style= "color:black">Promedios</b>
                         </button>
                         <button type="button" class="btn btn-info btn-sm" id="pdfbtn">
                                <span class="glyphicon glyphicon-copy"></span> <b style= "color:black">Generar PDF</b>
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
   
       $diaIngresoArray = explode('-',$fechaIngreso);
       $diaIngreso =(int) $diaIngresoArray[2];
       $diaSalidaArray = explode('-',$fechaSalida);
       $diaSalida =(int) $diaSalidaArray[2];

       $hsIngresoArray = explode(':',$hsIngreso);
       $hsIng = (int)$hsIngresoArray[0];
       $hsSalidaArray = explode(':',$hsSalida);
       $hsSal = (int)$hsSalidaArray[0];
       
     // hs = 10, media = 90 , completa = 170
     if($diaIngreso == $diaSalida){
          $totalhs = $hsSal - $hsIng;
          if($totalhs < 0){
                 $totalhs = $hsIng - $hsSal;
          }
          if($totalhs > 0 && $totalhs  <= 11 ){
                 return $totalhs * 10;
          }else if($totalhs >= 12 && $totalhs <= 24 ){
                 return (($totalhs - 12 )*10)+90;
          }else if($totalhs == 24){
                 return 170;
          }      
      }

     $totaldias =   $diaSalida - $diaIngreso ;
     $calcularIngreso=  24 - $hsIng;

     if($totaldias == 01)
     {
        $calcularEgreso = $hsSal;
        $cantHoras = $calcularIngreso + $calcularEgreso;
        $totalImporte = $cantHoras *10;
        return $totalImporte;
     }
     if($totaldias > 01)
     {
        $calcularEgreso= (($totaldias - 1 )* 24 ) + $hsSal;
        $totalImporte = $calcularIngreso + $calcularEgreso;
        $totalImporte = $totalImporte *10;
        return $totalImporte; 

     }

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
        return $cantidad;   

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


        function traerCocherasOcupadas(){

         $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	     $consulta = $objetoAccesoDato->RetornarConsulta("SELECT numCochera FROM  cocheras");
	     $resultado = $consulta->execute();
         $cocheras =  $consulta->fetchAll();

         return $cocheras;
     }

     function ValidarSelect($cocheras , $piso){

        $PisoDeCochera= explode("_",$piso);
         for($i=0;$i<count($cocheras);$i++){
            if($cocheras[$i] == $piso ){
                 echo '<option value="'.$cocheras[$i].'" id=".aca valor." >Cochera '.$PisoDeCochera[1] .' </option>';
            }
         }
    }

    function updateDeCochera($oldcochera,$newcochera){

        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta = $objetoAccesoDato->RetornarConsulta(" UPDATE cocheras SET numCochera = '$newcochera' WHERE numCochera = '$oldcochera' ");
        $resultado = $consulta->execute();
        if($resultado){
             echo "<center><p class='bg-success'><b>Se movio correctamente el vehiculo de cochera</b></p></center>";
             return true;
        }

    }

  function registrarOperacion($usuario,$tipo,$fecha,$numcochera){
      
       $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
       $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into registrooperaciones (nombreempleado,tipo,fecha,numcochera)values('$usuario','$tipo','$fecha','$numcochera');"); 		                                                                                                                                                                                                                                                                                                                           
       $resultado = $consulta->execute();
       
  }
    

?>



