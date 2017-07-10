<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="imagenes/persona.jpg">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--bootstrap validator -->
    <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="./bower_components/bootstrapvalidator/dist/css/bootstrapValidator.min.css">
    <script src="./bower_components/jquery/dist/jquery.min.js"></script>
    <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./bower_components/bootstrapvalidator/dist/js/bootstrapValidator.min.js"></script>
    <!--end bootstrap validator -->
    <script src="js/login.js"></script>
    <script src="js/validator.js"></script>
    
    <title>Login</title>
</head>
<body>
  
  <center> 
    <br>
    <img src="imagenes/persona.jpg" class="img-circle" width="100" height="100">
  </center>

    <form action = "" method="POST" class="form-horizontal" id="loginForm" name="loginForm">

             <div class="form-group" >
             <br>
             <label class="control-label col-sm-5" for="usuario">Usuario:</label>
             <div class="col-sm-3">
                 <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingrese usuario">
             </div>
             </div>

            <div class="form-group" >

           <label class="control-label col-sm-5" for="clave">Contraseña:</label>
           <div class="col-sm-3">
                <input type="password" class="form-control" name="clave" id="clave" placeholder="Ingrese contraseña">
           </div>

     </div>
                     
<center>

    <button type="button" class="btn btn-info btn-sm" id="entrarbtn"> 
              <span class="glyphicon glyphicon-user"></span> Entrar
    </button> 
    <button type="button" class="btn btn-danger btn-sm" id="resetbtn">
               <span class="glyphicon glyphicon-refresh"></span> Reiniciar
    </button>
    <br>
    <br>
    <input type="checkbox" id="recordarme" checked> Recordame
    <br>
    <br>
    <br>
    <br>
    <div id="respuesta">
 
    </div>
    
</center>
                     
 </form>
 <br>
</body>
</html>


<?php

session_start();

 if(isset($_SESSION['usuario'])){ 
      
      echo "<script type='text/javascript'>";
      echo "window.location='index.php';"; 
      echo "</script>";
 }
 if(isset( $_COOKIE['login'])){

     echo "<script type='text/javascript'>";
     echo "document.getElementById('usuario').value = '".$_COOKIE['login']."';";
     echo "</script>";        
 }
 
?>