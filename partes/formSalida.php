<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
    <script src="js/panel.js"></script>
</head>
<body>
    <center><h1 class="alert alert-danger">Salida de vehiculo</h1></center>
    <form action = "formIngresa.php" method="POST" class="form-horizontal">

        <div class="form-group" >
           <br>
           <label class="control-label col-sm-5" for="patente">Patente:</label>
           <div class="col-sm-3">
                 <input type="text" class="form-control" name="patente" id="patente" placeholder="Ingrese patente">
           </div>
       </div>
       
       <center>
         <button type="button" class="btn btn-success btn-sm" id="mostrarPatenteBtn"> <!--button no submit-->
                 <span class="glyphicon glyphicon-search"></span> Buscar vehiculo
         </button> 
         <button type="button" class="btn btn-info btn-sm" id="resetbtn2">
                <span class="glyphicon glyphicon-refresh"></span> Reiniciar
         </button>
       </center>
       <br>

    </form>  

    <div id= "respuesta">
    </div>
</body>
</html>
<?php
//sleep(2);
?>