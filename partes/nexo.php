<?php
include_once 'C:\xampp\htdocs\prog3\tpestacionamiento-master\Clases\AccesoDatos.php';
$operacion = $_POST['operacion'];

switch($operacion){

    case "alta":
  /*
  if(Estacionamiento::VerificarlugarDisponible($_POST['piso'],$_POST['cochera'],$_POST['discapacitado'])){ 

        $objVehiculo = new Vehiculo ($_POST['patente'],$_POST['marca'],$_POST['color'],$_POST['discapacitado']);

         $objVehiculo->IngresarVehiculo($objVehiculo);

  }
  */
    
    break;

    case "baja":

    break;

    case "ValidarCochera":

   $miArray = array();  

    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
    $consulta = $objetoAccesoDato->RetornarConsulta("SELECT numCochera FROM cocheras WHERE ocupada = 'si'"); 
    $consulta->execute();

    $cont= 0;
    while ($row = $consulta->fetch()) 
	 {

         $miArray[$cont] = array("id"=> $row['numCochera']); 
		//array_push($cocherasArray, $row['numCochera']);
        $cont = $cont + 1;
	 }

$encodato=json_encode($miArray);
 echo $encodato;
     
    break;
    

}

?>