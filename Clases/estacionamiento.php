<?php
Class Estacionamiento{
include_once "AccesoDatos.php";
private $_objVehiculo;
private $_piso;
private $_numCochera;
private $_empleado;
private $_importe;
private $_hsEntradaVehiculo;
private $_hsSalidaVehiculo;

public const $horaEstadia = 10;
public const $mediaEstadia = 90;
public const $estadiaCompleta = 170;

public function __construct($piso=NULL,$numCochera=NULL,$empleado=NULL,$turno=NULL){

    $this->_piso=$piso;
    $this->_numCochera=$numCochera;
    $this->_empleado=$empleado;
    $this->_turno=$turno;
    $this->_hsEntrada = //completar

}

public function getPiso(){
    return $this->_piso;
}
public function getNumCochera(){
    return $this->_numCochera;
}
public function getEsMovil(){
    return $this->_esMovil;
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

}
?>