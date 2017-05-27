<?php
session_start(); 

 $_SESSION['hrSalida'] = time();
 $id = $_SESSION['id'];

 // hacer insert  despues aca y que le pase la hs de salida al id  (agregar hs salida / hs entrada en db)

session_destroy(); 
  
header('location: login.php'); 

 ?>
 