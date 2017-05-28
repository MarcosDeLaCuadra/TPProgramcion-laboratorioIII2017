<?php
include_once 'C:\xampp\htdocs\TPProgramcion-laboratorioIII2017\Clases\AccesoDatos.php';
include_once 'C:\xampp\htdocs\TPProgramcion-laboratorioIII2017\Clases\estacionamiento.php';
include_once 'C:\xampp\htdocs\TPProgramcion-laboratorioIII2017\Clases\vehiculo.php';
$operacion = $_POST['operacion'];

switch($operacion){

    case "alta":
  
        

          $objVehiculo = new Vehiculo ($_POST['patente'],$_POST['marca'],$_POST['color'],$_POST['optradio']);
            //$objEstacionamiento = new Estacionamiento($_POST['cochera'],$_POST['patente'],$_POST['marca'],$_POST['color'],$_POST['optradio']);
        $objEstacionamiento = new Estacionamiento($_POST['cochera'], $objVehiculo);

         $objEstacionamiento->IngresarVehiculo();

  
    
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