<?php


include_once 'C:\xampp\htdocs\TPProgramcion-laboratorioIII2017\Clases\AccesoDatos.php';
include_once 'C:\xampp\htdocs\TPProgramcion-laboratorioIII2017\Clases\vehiculo.php';

Class Estacionamiento extends Vehiculo{

private $_objVehiculo;
private $_numCochera;
private $_empleado;
private $_importe;
private $_hsEntradaVehiculo;
private $_hsSalidaVehiculo;

public  $horaEstadia = 10;
public  $mediaEstadia = 90;
public  $estadiaCompleta = 170;

public function __construct($numCochera=NULL , $objVehiculo){
    session_start();
  
    $this->_objVehiculo =  $objVehiculo ;//new Vehiculo($patente , $marca , $color ,$disca);   
    $this->_numCochera=$numCochera;
    $this->_empleado= $_SESSION['usuario'];
    $this->_turno= $_SESSION['turno'];
    $this->_hsEntradaVehiculo = time();

}


public function getNumCochera(){
    return $this->_numCochera;
}

public function getEmpleado(){
    return $this->_empleado;
}
public function getTurno(){
    return $this->_turno;
}
public function getHsEntradaVehiculo(){
    return $this->_hsEntradaVehiculo;
}
public function setHsSalidaVehiculo(){
    $this->_hsSalidaVehiculo = time(); //verificar 
}
public function setImporte($importe){
    $this->_importe = $importe;
}
public function setObjVehiculo($obj){
    $this->_objVehiculo = $obj;
}


public static function verificarLugarDisponible ($piso,$cochera,$esDisc){
    if($esDisc == "false")
    {
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta = $objetoAccesoDato->RetornarConsulta(" SELECT numCochera FROM cocheras WHERE ocupada =  'no' AND esDisca = 'no'"); 
        $consulta->execute();
        $cantidad = $consulta->rowCount();
        if($cantidad > 0){
            return true;
        }
        else{
            return false;
        }
    }
    else{
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta = $objetoAccesoDato->RetornarConsulta(" SELECT numCochera FROM cocheras WHERE ocupada =  'no'"); 
        $consulta->execute();
        $cantidad = $consulta->rowCount();
        if($cantidad > 0){
            return true;
        }
        else{
            return false;
        }
    }
}

public function IngresarVehiculo(){


        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta = $objetoAccesoDato->RetornarConsulta("INSERT into cocheras (numCochera,esDisca,ocupada,marca,patente,color,hsingreso,hssalida,empingreso,empsalida)values('$this->_numCochera','". $this->_objVehiculo->getDiscapacitado() ."','si','". $this->_objVehiculo->getMarca() ."','". $this->_objVehiculo->getPatente() ."','". $this->_objVehiculo->getColor() ."', $this->_hsEntradaVehiculo , 0 ,'$this->_empleado',' ')"); 
		
        //$consulta = $objetoAccesoDato->RetornarConsulta(INSERT into cocheras (esDisca)values('asd')");
      //  echo $this->_objVehiculo->getMarca();
		
        $resultado = $consulta->execute();
 
}

}
?>