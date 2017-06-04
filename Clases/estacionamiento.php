<?php
include_once 'AccesoDatos.php';
include_once 'vehiculo.php';
include_once 'C:\xampp\htdocs\TPProgramcion-laboratorioIII2017\funciones.php'; //../funciones.php
Class Estacionamiento{

private $_objVehiculo;
private $_numCochera;
private $_empleado;
private $_importe;
private $_hsEntradaVehiculo;
private $_fechaIngreso;
private $_hsSalidaVehiculo;

public  $horaEstadia = 10;
public  $mediaEstadia = 90;
public  $estadiaCompleta = 170;


public function __construct($numCochera=NULL , $objVehiculo){
    
    $this->_objVehiculo =  $objVehiculo ;   
    $this->_numCochera=$numCochera;
    $this->_empleado= $_SESSION['usuario'];

}


public function getNumCochera(){
    return $this->_numCochera;
}

public function getEmpleado(){
    return $this->_empleado;
}

public function getHsEntradaVehiculo(){
    return $this->_hsEntradaVehiculo;
}


// ALTA
public function IngresarVehiculo(){

    $validacion = 0;
    $resul ='';
      if(estaOcupadaCochera($this->_numCochera)){
          $resul =  "<center><p class='bg-danger'><b>Esta cochera ya esta ocupada</b></p></center>" ;
          $validacion=1;
      }

      if(validarDiscapacitado($this->_objVehiculo->getDiscapacitado(),$this->_numCochera)){
          $resul .= "<center><p class='bg-danger'><b>Esta cochera esta reservada para discapacitados</b></p></center>";
          $validacion=1;
      }
         
      if(validarPatenteRepetida($this->_objVehiculo->getPatente())){
          $resul .= "<center><p class='bg-danger'><b>Patente repetida</b></p></center>";
          $validacion=1;
      }

     if($validacion == 0){

             $hsIngreso = date("H:i");            
             $this->_hsEntradaVehiculo = $hsIngreso;
          
             $fechaIngreso = getdate();
             $fechaIngreso =  $fechaIngreso['mday']."/".$fechaIngreso['mon']."/".$fechaIngreso['year']; 
             $this->_fechaIngreso = $fechaIngreso;

             $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	    	 $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into cocheras (numCochera,esDisca,ocupada,marca,patente,color,hsingreso,fechaingreso,empingreso)values('$this->_numCochera','". $this->_objVehiculo->getDiscapacitado() ."','si','". $this->_objVehiculo->getMarca() ."','". $this->_objVehiculo->getPatente() ."','". $this->_objVehiculo->getColor() ."', '$this->_hsEntradaVehiculo', '$this->_fechaIngreso' ,'$this->_empleado')"); 
		     $resultado = $consulta->execute();
             
              if($resultado){
                     
                    $resul .= "<center><p class='bg-success'><b>Se ingreso correctamente el vehiculo</b></p></center>";           
                    
              }
     }

     return $resul;
         
}

//MOSTRAR
public static function buscarVehiculo($patente){
     sleep(1);
     $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	 $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM  cocheras WHERE patente = '$patente'");
	 $resultado = $consulta->execute();
     $cantidad = $consulta->rowCount();
     $msj = "";
     if($cantidad > 0){

        $msj .= "<center>";
        $msj .= "<table class='table'  style=' background-color: beige;'>";
	        $msj .= "<thead>";
		        $msj .= "<tr>";
			      $msj .=  "<th>Patente</th><th>Marca</th><th>Color</th><th>Discapacitado</th><th>Cochera</th><th>Fecha/Hora entrada</th><th>ing. Empelado</th><th>Sacar de cochera</th><th>Modificar</th>";
		        $msj .= "</tr>";
	        $msj .= "</thead>";
	        $msj .= "<tbody>";
            while ($row = $consulta->fetch())  
	       {
             $valor = "value=".$row['patente'];
              
              $msj .= "<tr>";
		      $msj .=  "<td>".$row['patente']."</td>";
              $msj .=  "<td>".$row['marca']."</td>";
              $msj .=  "<td>".$row['color']."</td>";
              $msj .=  "<td>".$row['esDisca']."</td>";
              $msj .=  "<td>".$row['numCochera']."</td>";
              $msj .=  "<td>".$row['hsingreso']." - ".$row['fechaingreso']."</td>";
              $msj .=  "<td>".$row['empingreso']."</td>"; 
              $msj .=  "<td><button id='sacarbtn'".$valor." class='btn btn-danger btn-sm botonbaja'>Sacar de cochera  
                      <span class='glyphicon glyphicon-arrow-down'></span></button></td>";      
              $msj .=  "<td><button id='modificarbtn'".$valor." class='btn btn-warning btn-sm'>Modificar
                     <span class='glyphicon glyphicon-cog'></span></button></td>";
              $msj .= "</tr>";

           } 
             $msj .=  "</tbody>";
             $msj .=  "</table>";
             $msj .=  "</center>";
             $msj .=  "</body>";
             $msj .=  "</html>";
             $consulta=null;
        
     }else{
        $msj .=  "<center><p class='bg-danger'><b>No se encontro la patente del vehiculo</b></p></center>";
     }

     return $msj;
}



//BAJA
public static function retirarVehiculo($patente){
    $msj = "";
    $msj = Estacionamiento::addOperaciones($patente);
   
    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM  cocheras WHERE patente = '$patente'");
	$resultado = $consulta->execute();
    
    if($resultado){
         $msj .= "<center><b class='bg-success'>El vehiculo se retiro correctamente.<b></center>";
      
    }else{
         $msj .= "<center><b class='bg-success'>El vehiculo no se retiro correctamente.<b></center>";
    }

    return $msj;
}

public static function verCocherasOcupadas(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta = $objetoAccesoDato->RetornarConsulta(" SELECT numCochera,patente FROM cocheras"); 
        $consulta->execute();
        $cantidad = $consulta->rowCount();
        $msj = "";
        if($cantidad == 0){ $msj .= "<center><b class = 'bg-danger'> No hay cocheras ocupadas actualmente </b><br></center>";}
       $msj .=  "<center>";
        while ($row = $consulta->fetch()) 
	    {
		$msj .=  "<b class = 'bg-danger'> Cochera ".$row['numCochera']." ocupada por patente: ".$row['patente']."</b><br>";
	
	    }
        $msj .=  "</center>";
        $consulta=null;
        return $msj;
    }

public static function addOperaciones($patente){
    session_start();
    $hsSalida = date("H:i");
    
    $fechaSalida = getdate();
    $fechaSalida = $fechaSalida['mday']."/".$fechaSalida['mon']."/".$fechaSalida['year']; 

    $empleado = $_SESSION['usuario'];
    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
    $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM cocheras WHERE patente = '$patente'"); 
    $resultado = $consulta->execute(); 
   
    $importe = 0;
    while ($row = $consulta->fetch()) {
       $importe = calcularImporte($row['hsingreso'],$row['fechaingreso'],$hsSalida,$fechaSalida);
       $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into operaciones (numCochera,esDisca,ocupada,marca,patente,color,hsingreso,fechaingreso,empingreso, hssalida, empsalida,fechasalida,importe)values('".$row['numCochera']."','". $row['esDisca'] ."','".$row['ocupada']."','". $row['marca'] ."','". $row['patente'] ."','". $row['color']  ."', '".$row['hsingreso']."', '".$row['fechaingreso']."' ,'".$row['empingreso']."','$hsSalida','$empleado','$fechaSalida','$importe')"); 		                                                                                                                                                                                                                                                                                                                           
        $resultado = $consulta->execute();
        return "<center><b class = 'bg-success'>El importe es de : ".$importe." $</b></center>";

    }
            
   
}
}




