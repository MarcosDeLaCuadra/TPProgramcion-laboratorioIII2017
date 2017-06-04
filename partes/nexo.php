
<?php
include_once '../Clases/AccesoDatos.php';
include_once '../Clases/estacionamiento.php';
include_once '../Clases/vehiculo.php';

$operacion = $_POST['operacion'];

switch($operacion){

    case "alta":

    session_start();

    if(empty($_POST['patente']) || 
       empty($_POST['marca']) ||
       empty($_POST['color']) ||
       $_POST['cochera'] == 0 )     
     {
       echo "<center><p class='bg-danger'><b>Faltan completar datos</b></p></center>";
    }else{
      $objVehiculo = new Vehiculo ($_POST['patente'],$_POST['marca'],$_POST['color'],$_POST['optradio']);
      $objEstacionamiento = new Estacionamiento($_POST['cochera'], $objVehiculo);
      $msj = $objEstacionamiento->IngresarVehiculo();
      echo $msj;
    }
     break;

     case "mostrar":
     $patente = $_POST['patente'];
     if(empty($patente)){
        echo "<center><p class='bg-danger'><b>Faltan completar datos</b></p></center>";
     }else{
       $msj = Estacionamiento::buscarVehiculo($patente);
       echo $msj;
     }
     break;

     case "borrar":
      $patente = $_POST['patente'];
     $msj= Estacionamiento::retirarVehiculo($patente);
     echo $msj;
     break;

     case "verCocherasOcupadas":
     $msj = Estacionamiento::verCocherasOcupadas();
     echo $msj;
     break;

}

?>