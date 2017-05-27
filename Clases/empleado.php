<?php
Class Empelado{

    private $_nombre;
    private $_turno;
    private $_hrIngreso;
    private $_hrSalida;
    private $_operaciones;

    public function __construct($nombre=NULL,$turno=NULL){
            $this->_nombre = $nombre;
            $this->_turno = $turno;
            $this->_hrIngreso = time();

    }

    public function getNombre(){
        return $this->_nombre;  
    }
     public function getTurno(){
        return $this->_turno;
    }
     public function getHsIngreso(){
        return $this->_hsIngreso;
    }
     public function getHsSalida(){
        return $this->_hsSalida;
    }
     public function getOperaciones(){
        return $this->_operaciones;
    }
    public function setOperaciones($operaciones){
        $this->_operaciones=$operaciones;
    }
    public function setHsSalida($hora){
        $this->_hsSalida=$hora;
    }


    public function ingresarVehiculo(){

    }

    public function retirarVehiculo(){

    }

    public function mostrarVehiculos(){
        
    }

}

?>