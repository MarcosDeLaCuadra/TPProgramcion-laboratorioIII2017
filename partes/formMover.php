<?php
 include_once "../funciones.php";

$patente = $_POST['patente'];


$datos=buscarPorPatente($patente);
?>


  
  <div class="container" >
        <div class="col-md-13">

            <h1 class="page-header">
                  
                  
            </h1>
               

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Mover Vehiculo de cochera</h3>
                    
                   
                </div>

                <div class="panel-body">

                                       
                                         <div class="form-group">
                                            <label for="nombre">Numero de cochera:</label>
                                            <input class="form-control"type="text" id="numcochera" name="numcochera" placeholder=<?php  echo $datos[0]['numcochera'];?> disabled> 
                                        </div>

                                        <div class="form-group">
                                            <label for="nombre">Patente:</label>
                                            <input class="form-control"type="text" id="patente1" name="nombre1" placeholder=<?php  echo $datos[0]['patente'];?>  disabled> 
                                        </div>
                                        
                                   
                
                         
                      </div>            
                  
                          <div class="form-group">      
              <input class="btn btn-primary btnmover "type="button" value="Mover de cochera" name="actualizar">
               </div>