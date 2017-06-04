<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
include_once 'Clases/estacionamiento.php';
include_once 'Clases/vehiculo.php';
include_once 'funciones.php';

$app = new \Slim\App;
$app->post('/ingresar/{patente}/{marca}/{color}/{esdisca}/{numcochera}', function (Request $request, Response $response) {
//session_start();
//$response = "Usuario no registrado";

 //if(ValidarStatus($_SESSION['usuario'] )) {

   $patente= $request->getAttribute('patente');
   $marca = $request->getAttribute('marca');
   $color = $request->getAttribute('color');
   $esdisca = $request->getAttribute('esdisca');
   $numcochera = $request->getAttribute('numcochera');

    $objVehiculo = new Vehiculo ($patente,$marca,$color,$esdisca);
    $objEstacionamiento = new Estacionamiento($numcochera, $objVehiculo);
    $msj = $objEstacionamiento->IngresarVehiculo();
   // $response->getBody()->write(Estacionamiento::verCocherasOcupadas());
    $response->getBody()->write($msj);
//}
    return $response;
});

// DELETE

$app->delete('/borrar/{patente}', function (Request $request, Response $response) {

   $patente= $request->getAttribute('patente');

    $msj = Estacionamiento::retirarVehiculo($patente);
    
    $response->getBody()->write($msj);

    return $response;
});

$app->get('/mostrar', function (Request $request, Response $response) {

    $msj = Estacionamiento::verCocherasOcupadas();
    
    $response->getBody()->write($msj);

    return $response;
});

$app->get('/mostrar/{patente}', function (Request $request, Response $response) {

    $patente= $request->getAttribute('patente');
    
    $msj = Estacionamiento::buscarVehiculo($patente);
    
    $response->getBody()->write($msj);

    return $response;
});

$app->run();

?>