
<?php

include_once 'AccesoDatos.php';
include_once 'vehiculo.php';
include_once '../funciones.php';

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

      if(estaOcupadaCochera($this->_numCochera)){
          echo "<center><p class='bg-danger'><b>Esta cochera ya esta ocupada</b></p></center>";
          $validacion=1;
      }

      if(validarDiscapacitado($this->_objVehiculo->getDiscapacitado(),$this->_numCochera)){
          echo "<center><p class='bg-danger'><b>Esta cochera esta reservada para discapacitados</b></p></center>";
          $validacion=1;
      }
         
      if(validarPatenteRepetida($this->_objVehiculo->getPatente())){
          echo "<center><p class='bg-danger'><b>Patente repetida</b></p></center>";
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
                     
                    echo "<center><p class='bg-success'><b>Se ingreso correctamente el vehiculo</b></p></center>";           
                    
              }
     }
         
}

//MOSTRAR
public static function buscarVehiculo($patente){
     sleep(1);
     $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	 $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM  cocheras WHERE patente = '$patente'");
	 $resultado = $consulta->execute();
     $cantidad = $consulta->rowCount();

     if($cantidad > 0){

        echo "<center>";
        echo"<table class='table'  style=' background-color: beige;'>";
	        echo"<thead>";
		        echo"<tr>";
			      echo "<th>Patente</th><th>Marca</th><th>Color</th><th>Discapacitado</th><th>Cochera</th><th>Fecha/Hora entrada</th><th>ing. Empelado</th><th>Sacar de cochera</th><th>Modificar</th>";
		        echo"</tr>";
	        echo"</thead>";
	        echo"<tbody>";
            while ($row = $consulta->fetch())  
	       {
             $valor = "value=".$row['patente'];
              
              echo"<tr>";
		      echo "<td>".$row['patente']."</td>";
              echo "<td>".$row['marca']."</td>";
              echo "<td>".$row['color']."</td>";
              echo "<td>".$row['esDisca']."</td>";
              echo "<td>".$row['numCochera']."</td>";
              echo "<td>".$row['hsingreso']." - ".$row['fechaingreso']."</td>";
              echo "<td>".$row['empingreso']."</td>"; 
              echo "<td><button id='sacarbtn'".$valor." class='btn btn-danger btn-sm botonbaja'>Sacar de cochera  
                      <span class='glyphicon glyphicon-arrow-down'></span></button></td>";      
              echo "<td><button id='modificarbtn'".$valor." class='btn btn-warning btn-sm'>Modificar
                     <span class='glyphicon glyphicon-cog'></span></button></td>";
              echo"</tr>";

           } 
             echo "</tbody>";
             echo "</table>";
             echo "</center>";
             echo "</body>";
             echo "</html>";
             $consulta=null;
        
     }else{
        echo "<center><p class='bg-danger'><b>No se encontro la patente del vehiculo</b></p></center>";
     }

}



//BAJA
public static function retirarVehiculo($patente){
   
    Estacionamiento::addOperaciones($patente);

    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
	$consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM  cocheras WHERE patente = '$patente'");
	$resultado = $consulta->execute();
    
    if($resultado){
        echo "<center><b class='bg-success'>El vehiculo se retiro correctamente.<b></center>";
    }
}

public static function verCocherasOcupadas(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta = $objetoAccesoDato->RetornarConsulta(" SELECT numCochera,patente FROM cocheras"); 
        $consulta->execute();
        $cantidad = $consulta->rowCount();
        if($cantidad == 0){echo "<center><b class = 'bg-danger'> No hay cocheras ocupadas actualmente </b><br></center>";}
        echo "<center>";
        while ($row = $consulta->fetch()) 
	    {
		echo "<b class = 'bg-danger'> Cochera ".$row['numCochera']." ocupada por patente: ".$row['patente']."</b><br>";
	
	    }
        echo "</center>";
        $consulta=null;
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
        echo "<center><b class = 'bg-success'>El importe es de : ".$importe." $</b></center>";

    }
            
   
}


}

?>