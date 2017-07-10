<?php

include_once "Clases/AccesoDatos.php";

sleep(2);

$password = $_POST['password'];
$usuario = $_POST['usuario'];
$error =  $_POST['error'];
$cookies = $_POST['cookies'];

$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$consulta = $objetoAccesoDato->RetornarConsulta(" SELECT * FROM empleados WHERE usuario = '$usuario' AND clave = '$password' ");
$resultado = $consulta->execute();
$cantidad = $consulta->rowCount();

 $row = $consulta->fetch();	    
 $rol =	$row['rol'];
 $turno = $row['turno'];
 $id= $row['id'];
 $suspendido = $row['suspendido'];	

 if($cantidad == 1 && $suspendido == 'no'){
     
     
        if($cookies == "true"){             

            setcookie("login",$usuario,  time()+360000 , '/');         
            
        }
        else{
            setcookie("login",$usuario,  time()-360000 , '/');
        }
      
    session_start();
    $_SESSION['usuario'] = $usuario;
    $_SESSION['rol']= $rol;
    $_SESSION['turno'] = $turno;
    $_SESSION['id']= $id;
    $error = 'true';

    if($rol != 'admin'){
    
    $hsIngreso = date("H:i:s");              
    $fechaIngreso =  date('Y-m-d');        

    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
    $consulta = $objetoAccesoDato->RetornarConsulta("INSERT into registroempleados (nombre,fechaing,hsing)values('$usuario','$fechaIngreso','$hsIngreso')");
    $resultado = $consulta->execute();

    
    $consulta = $objetoAccesoDato->RetornarConsulta(" SELECT id FROM registroempleados WHERE fechaing = '$fechaIngreso' AND hsing = '$hsIngreso' ");
    $resultado = $consulta->execute();
    $id = $consulta->fetch();
    $_SESSION['idRegistro']= $id["id"];

   
     }
      
 }
 if($error == 'false'){

    echo 'error';

}


?>