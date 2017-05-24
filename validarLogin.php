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
	

 if($cantidad == 1){
     
     
        if($cookies == "true"){             

            setcookie("login",$usuario,  time()+36000 , '/');         

        }
        else{
            setcookie("login",$usuario,  time()-36000 , '/');
        }
      
    session_start();
    $_SESSION['usuario'] = $usuario;
    $_SESSION['rol']= $rol;
    $error = 'true';
      
 }
 if($error == 'false'){

    echo 'error';

}


?>