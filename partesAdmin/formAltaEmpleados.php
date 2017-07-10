<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="js/panelAdmin.js"></script> <!--con on en panel no hace falta incluirlo-->
</head>
<body>
<div class="row">
     <div class="col-sm-12">
         <div class="col-xs-3">
             <label class="control-label" for="usuario">Usuario:</label> <!--rol,usuario,turno,clave,suspendido -->
             <input type="text" class="form-control  input-lg" id="usuario" name="usuario" placeholder="ingrese nombre de usuario">
        </div>
        <div class="col-xs-3">
             <label class="control-label" for="usuario">Turno:</label> <!--rol,usuario,turno,clave,suspendido -->
                  <select class="form-control input-lg" id="turno"  name="turno">
                         <option value="Mañana" id="1">Mañana</option>
                         <option value="Tarde" id="2">Tarde</option>
                         <option value="Noche" id="3">Noche</option>
                 </select>         
                  
        </div>
        <div class="col-xs-3">
             <label class="control-label" for="usuario">Clave:</label> <!--rol,usuario,turno,clave,suspendido -->
             <input type="password" class="form-control  input-lg" id="clave" name="clave" placeholder="ingrese clave">
        </div>
        <br>
        <div class="col-xs-3">
             <button type="button" class="btn btn-info btn-lg botoningresar" id="btningresar">
                     <span class="glyphicon glyphicon-plus"></span> Ingresar empleado
                </button>
        </div>
       
 </div> 
 
      <div id="respuesta">
      </div>
</body>
</html>
<?php
//sleep(2);
?>