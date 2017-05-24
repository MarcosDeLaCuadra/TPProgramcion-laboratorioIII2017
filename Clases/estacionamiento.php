<?php
Class Estacionamiento{

private $_piso;
private $_numCochera;
private $_esMovil;
private $_empleado;
private $_turno;
private $_importe;
private $_hsEntrada;
private $_hsSalida;

public const $horaEstadia = 10;
public const $mediaEstadia = 90;
public const $estadiaCompleta = 170;

public function __construct($piso=NULL,$numCochera=NULL,$esMovil=NULL,$empleado=NULL,$turno=NULL){

    $this->_piso=$piso;
    $this->_numCochera=$numCochera;
    $this->_esMovil=$esMovil;
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
public function getHsEntrada(){
    return $this->_hsEntrada;
}
public function setHsSalida(){
    $this->_hsSalida = time(); //verificar 
}
public function setImporte($importe){
    $this->_importe = $importe;
}


}
?>