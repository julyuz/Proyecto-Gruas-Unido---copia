<?php include('inc/header.php'); ?>
<script src="js/bitacora.js"></script>
<meta chartset="UTF-8">
      <div class="row">

        <div class="col s12 m12 l12">
          <div class="card">
            <div class="card-content">
                <div class="row">
                  <h2 class="title">Memoria descriptiva de salvamento</h2>

                  <form class="col s6 m12 l12">

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="codigo" type="text"  required>
                        <label for="first_name">Placa de vehículo</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="codigo" type="text"  required>
                        <label for="first_name">Núm. de serie remolque</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="codigo" type="text"  required>
                        <label for="first_name">Folio</label>
                      </div>
                    </div>

                  <h4 class="title">Salvamiento</h4>

                   <div class="row">
                      <div class="input-field col s12">
                        <input  id="fecha" type="text"  required>
                        <label for="first_name">Abanderamiento con grúa de</label>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="nombreE" type="text" class="validate" required>
                        <label for="first_name">Abanderamiento con grúa hasta</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="domicilio" type="text" class="validate" required>
                        <label for="first_name">Abanderamiento con grúa total</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="telefono" type="text" class="validate" required>
                        <label for="first_name">Abanderamiento manual de</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="tiposervicio" type="text" class="validate" required>
                        <label for="first_name">Abanderamiento manual hasta</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="modalidad" type="text" class="validate" required>
                        <label for="first_name">Abanderamiento manual total</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="marca" type="text" class="validate" required>
                        <label for="first_name">Abanderamiento custodia del vehículo de</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="modelo" type="text" class="validate" required>
                        <label for="first_name">Abanderamiento custodia del vehículo hasta</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="placas" type="text" class="validate" required>
                        <label for="first_name">Abanderamiento custodia del vehículo total</label>
                      </div>
                    </div>

                    <h4 class="title">Arrastre sobre el camino</h4>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="nombreC" type="text" class="validate" required>
                        <label for="first_name">Tipo de grúa</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="numlic" type="text" class="validate" required>
                        <label for="first_name">Maniobras</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="tipolic" type="text" class="validate" required>
                        <label for="first_name">Banderazo</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="vigencia" type="text" class="validate" required>
                        <label for="first_name">Km. recorridos</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="diascon" type="text"  required>
                        <label for="first_name">Recargo por remisión de vehículo cargado</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="diascon" type="text"  required>
                        <label for="first_name">Corralón o taller</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="diascon" type="text"  required>
                        <label for="first_name">Servicio o particular</label>
                      </div>
                    </div>

                    <h4 class="title">Maniobras especiales</h4>

                    <div class="row">
                      <div class="input-field col s12">
                        <textarea id="ordes" name="ordes" cols="20" rows="20" class="validate" required>
                          
                        </textarea>  
                        <label for="first_name">Descripción</label>
                      </div>
                    </div>

                    <h4 class="title">Deposito</h4>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="diascon" type="text"  required>
                        <label for="first_name">Servicio o particular</label>
                      </div>
                    </div>

                    <a class="waves-effect waves-teal btn-flat" onclick="agregarmemoria()">Guardar datos</a>
                  </form>

                </div>
            </div>
          </div>
        </div>
      </div>
<?php include('inc/footer.php'); ?>