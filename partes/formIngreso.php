<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="js/panel.js"></script>
</head>
<body>
    <center><h1 class="alert alert-success">Ingreso de vehiculo</h1></center>
    <form   class="form-horizontal">

        <div class="form-group" >
           <br>
           <label class="control-label col-sm-5" for="patente">Patente:</label>
           <div class="col-sm-3">
                 <input type="text" class="form-control" name="patente" id="patente" placeholder="Ingrese patente" name="txtpatente">
           </div>
       </div>
       <div class="form-group" >
           <br>
           <label class="control-label col-sm-5" for="marca">Marca:</label>
           <div class="col-sm-3">
                 <input type="text" class="form-control" name="marca" id="marca" placeholder="Ingrese marca" name="txtmarca">
           </div>
       </div>
       <div class="form-group" >
           <br>
           <label class="control-label col-sm-5" for="color">Color:</label>
           <div class="col-sm-3">
                 <input type="text" class="form-control" name="color" id="color" placeholder="Ingrese color" name="txtcolor">
           </div>
       </div>
        <br>
       <center>
       <label for="optradio">Es discapacitado/embarazada: </label>
       <input type="radio" name="optradio" id="optradiosi" ><b>Si</b>
       <input type="radio" name="optradio" id="optradiono" checked ><b>No</b>
       </center>
       <br>
       
       <center>
       <div class="form-group">
       <br>
       <label class="control-label col-sm-5" for="numCochera">Numero de cochera: </label>
       <div class="col-sm-4">
             <select class="form-control" id="numCochera"  name="lista">
                <option hidden value="0" id="0">Seleccione una Cochera</option>
             <optgroup label="Piso numero 1" name = "piso1">
                 <option value="1_1" id="1_1"   >Cochera 1 - (Reservada)</option>
                 <option value="1_2" id="1_2">Cochera 2 </option>
                 <option value="1_3" id="1_3">Cochera 3 </option>
               </optgroup>
                <optgroup label="Piso numero 2" name = "piso2">
                 <option value="2_1" id="2_1" >Cochera 1 - (Reservada)</option>
                 <option value="2_2" id="2_2">Cochera 2 </option>
                 <option value="2_3"id= "2_3">Cochera 3 </option>
               </optgroup>
                <optgroup label="Piso numero 3"  name = "piso3">
                 <option value="3_1" id="3_1"  >Cochera 1 - (Reservada)</option>
                 <option value="3_2" id="3_2">Cochera 2 </option>
                 <option value="3_3" id="3_3">Cochera 3 </option>
               </optgroup>
            </select>
       </div>
       </div>
       </center>    
       <br>
       <center>
         <button type="button" class="btn btn-success btn-sm" id="guardarbtn" > 
                 <span class="glyphicon glyphicon-floppy-disk"></span> Guardar 
         </button> 
         <button type="button" class="btn btn-info btn-sm" id="resetbtn">
                <span class="glyphicon glyphicon-refresh"></span> Reiniciar
         </button>
       <button type="button" class="btn btn-info btn-sm" id="ocupadasbtn">
                <span class="glyphicon glyphicon-eye-open "></span> Ver cocheras ocupadas
       </button>
          
       </center>
       <br>

    </form>  
    <br>
    <div id= "respuesta">
    </div>

</body>
</html>
<?php
sleep(2);
?>