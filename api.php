<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
include_once 'Clases/estacionamiento.php';
include_once 'Clases/vehiculo.php';
include_once 'funciones.php';

$app = new \Slim\App;
$app->post('/ingresar/{patente}/{marca}/{color}/{esdisca}/{numcochera}', function (Request $request, Response $response) {

  
   $patente= $request->getAttribute('patente');
   $marca = $request->getAttribute('marca');
   $color = $request->getAttribute('color');
   $esdisca = $request->getAttribute('esdisca');
   $numcochera = $request->getAttribute('numcochera');
/*
   if(empty($patente)||empty($marca)||empty($color)||empty($esdisca)||empty($numcochera)) {
       $json = array("msj"=>"faltan completar datos");
       $response->getBody()->write(json_encode($json));
       return $response;
   }
  */

    $objVehiculo = new Vehiculo ($patente,$marca,$color,$esdisca);
    $objEstacionamiento = new Estacionamiento($numcochera, $objVehiculo);
    $json = $objEstacionamiento->IngresarVehiculo();
    
    $response->getBody()->write($json);

    return $response;
});

// DELETE

$app->delete('/borrar/{patente}', function (Request $request, Response $response) {

   $patente= $request->getAttribute('patente');

    $json = Estacionamiento::retirarVehiculo($patente);
    
    $response->getBody()->write($json);

    return $response;
});

$app->get('/mostrarocupadas', function (Request $request, Response $response) {

    $msj = Estacionamiento::verCocherasOcupadas(); 
    /*
    $texto = strip_tags($msj);
    $arrayTxt = split(",",$texto);
    $json_array = array();

    for($i=0;$i<count($arrayTxt);$i++){
      array_push($json_array,array("msj"=>$arrayTxt[$i]));
    }
     
    $response->getBody()->write(json_encode($json_array));
    */
 
     $response->getBody()->write($msj);
    return $response;
});

$app->get('/buscarvehiculo/{patente}', function (Request $request, Response $response) {

    $patente= $request->getAttribute('patente');
    
    $json = Estacionamiento::buscarVehiculo($patente);
    
    $response->getBody()->write($json);

    return $response;
});

$app->run();

?>