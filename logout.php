<?php
include_once "Clases/AccesoDatos.php";
session_start(); 

$hsSalida = date("H:i:s");            
$fechaSalida = date('Y-m-d'); 

$id = $_SESSION['idRegistro'];

$fechaSalidaTest = date('Y-m-d'); 
$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$consulta = $objetoAccesoDato->RetornarConsulta(" UPDATE registroempleados SET fechasal = '$fechaSalida',hssal = '$hsSalida' WHERE id = '$id'");
$resultado = $consulta->execute();
session_destroy(); 
  
header('location: login.php'); 

 ?>
 