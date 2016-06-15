<?php include('inc/header.php'); ?>
<script src="js/bitacora.js"></script>
<meta chartset="UTF-8">
     <div class="row">

        <div class="col s12 m12 l6">
          <div class="card">
            <div class="card-content">
                <div class="row">
                  <h2 class="title">Bitacora de horas de servicio del conductor</h2>

                  <form class="col s6 m12 l12">


                  

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="codigo" type="text"  required>
                        <label for="first_name">codigo del operador</label>
                      </div>
                     
                    </div>

                   <div class="row">
                      <div class="input-field col s12">
                        <input  id="fecha" type="date"  required>
                        <label for="first_name">Fecha</label>
                      </div>
                     
                    </div>
                    
                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="nombreE" type="text" class="validate" required>
                        <label for="first_name">Nombre de la empresa</label>
                      </div>
                     
                    </div>

                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="domicilio" type="text" class="validate" required>
                        <label for="first_name">domicilio</label>
                      </div>
                    </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="telefono" type="text" class="validate" required>
                        <label for="first_name">telefono</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="tiposervicio" type="text" class="validate" required>
                        <label for="first_name">tipo de servicio</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="modalidad" type="text" class="validate" required>
                        <label for="first_name">modalidad</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="marca" type="text" class="validate" required>
                        <label for="first_name">marca</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="modelo" type="text" class="validate" required>
                        <label for="first_name">modelo</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="placas" type="text" class="validate" required>
                        <label for="first_name">placas</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="nombreC" type="text" class="validate" required>
                        <label for="first_name">Nombre del conductor</label>
                      </div>
                    </div>

                    

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="numlic" type="text" class="validate" required>
                        <label for="first_name">numero de licencia</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="tipolic" type="text" class="validate" required>
                        <label for="first_name">tipo de licencia</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="vigencia" type="text" class="validate" required>
                        <label for="first_name">vigencia</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <textarea id="ordes" name="ordes" cols="20" rows="20" class="validate" required>
                          
                        </textarea>  
                        <label for="first_name">Origen y destino</label>
                      </div>
                    </div>


                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="diascon" type="text"  required>
                        <label for="first_name">N. de dias conducidos</label>
                      </div>
                    </div>

                     

                    <div class="row">
                      <div class="input-field col s12">
                        <textarea id="casosE" name="casosE" cols="20" rows="20" class="validate" required>
                          
                        </textarea>  
                        <label for="first_name">Casos de excepcion</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="hsalida" type="text" class="validate" required>
                        <label for="first_name">hora de salida</label>
                      </div>
                    </div>


                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="hllegada" type="text" class="validate" required>
                        <label for="first_name">hora de llegada</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="husadas" type="text" class="validate" required>
                        <label for="first_name">total de horas usadas por dia</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="nomela" type="text" class="validate" required>
                        <label for="first_name">nombre del elaborador</label>
                      </div>
                    </div>


                     <a class="waves-effect waves-teal btn-flat" onclick="agregarbitacora()">Guardar datos</a>
                     
                  </form>

                </div>
            </div>
          </div>
        </div>
      </div>
<?php include('inc/footer.php'); ?>