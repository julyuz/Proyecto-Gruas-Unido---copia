<?php include('inc/header.php');
  date_default_timezone_set('America/Mexico_City');
  session_start();
  if(isset($_SESSION['Usuario'])){

  }else{
    header("Location: iniciar.php?Error=Acceso denegado");
  }
?>
<script src="js/gruas.js"></script>
<script src="js/funciones_generales.js"></script>

<meta chartset="UTF-8">
 <div class="row" id="row1_gruas">

        <div class="col s12 m12 l4" id="agregar_gruas">
          <div class="card">
            <div class="card-content">
                <div class="row">
                  <h2 class="title">Agregar Grúa</h2>
                  <form class="col s12">

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="placas" type="text" class="validate" required
                        onKeyUp="convertir_aMayuscula(this.value, this.id)">
                        <label for="first_name">Placas</label>
                      </div>
                    </div>

                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="tipo" type="text" class="validate" required>
                        <label for="first_name">Tipo</label>
                      </div>
                    </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="marca" type="text" class="validate" required>
                        <label for="first_name">Marca </label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="modelo" type="text" class="validate" required>
                        <label for="first_name">Modelo</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="numero" type="text" class="validate" required>
                        <label for="first_name">Número de grua</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col s12">
                        <!-- Modal Trigger -->
                        <div class="row">
                          <div class="input-field col s6">
                            <input id="id_operador" type="text" class="validate" required placeholder ="Código operador">
                            <label for="first_name">Código operador</label>
                          </div>
                          <div class="col s6">
                            <a class="waves-effect waves-light
                            btn orange modal-triggerGetAllOpe"
                            href="#modalGetAllOpe" onclick="getAllOpe()">Operador</a>

                          </div>


                        </div>

                        <!-- Modal Structure -->
                        <div id="modalGetAllOpe" class="modal">
                          <div class="modal-content" id="model-contentGetAllOpe">
                            <h4>Operadores</h4>
                            <p>Elija un operador:</p>

                            <table id="tableAllOpe" class="display responsive-table"
                             cellspacing="0"  style="font-size:12x;">
                              <thead>
                                <tr id = "pointer">

                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Licencia</th>
                                <th>Tipo licencia</th>
                                <th>No licencia</th>

                                <th>Vigencia licencia</th>



                                </tr>
                              </thead>
                              <tbody id="tbodyAllOpe">

                              </tbody>
                            </table>


                          </div>
                          <div class="modal-footer">
                            <a href="#!" class=" modal-action
                            modal-close waves-effect waves-orange btn-flat">Aceptar</a>
                          </div>
                        </div>
                      </div>

                    </div>

                     <a class="waves-effect btn green" onclick="agregargrua()">Agregar</a>
                  </form>

                </div>
            </div>
          </div>
        </div>

      <div class="col s12 m12 l4" id="modificar_gruas">
        <div class="card">
            <div class="row">
              <div class="col s12">
                <h2 class="title">Modificar Grúa</h2>
              </div>
                  <form action="javascript:buscargrua()">
                  <div class="row">

                     <!-- Modal Trigger -->
                          <div class="row">
                              <div class="input-field col s6">
                                <input  id="vbuscar" placeholder="Código grua" type="text" class="validate" required>
                                <label for="first_name">Código grua</label>
                              </div>

                              <div class="col s6">
                                <a class="waves-effect waves-light
                                btn orange modal-triggerGetAllGruas"
                                href="#modalGetAllGruas" onclick="getAllGruas()">Grúa</a>
                              </div>
                          </div>

                        <!-- Modal Structure -->
                        <div id="modalGetAllGruas" class="modal">
                          <div class="modal-content" id="modal-contentGetAllGruas">
                            <h4>Grua</h4>
                            <p>Elija un grua:</p>

                            <table id="tableAllGruas" class="display responsive-table"  cellspacing="0"  style="font-size:12x;">
                              <thead>
                                <tr id="pointer">

                                <th>Id</th>
                                <th>Placas</th>
                                <th>Tipo</th>
                                <th>Marca</th>

                                <th>Modelo</th>
                                <th>Número</th>
                                <th>Código operador</th>

                                </tr>
                              </thead>
                              <tbody id ="tbodyAllGruas">

                              </tbody>
                            </table>

                          </div>
                          <div class="modal-footer">
                            <a href="#!" class=" modal-action
                            modal-close waves-effect waves-green btn-flat">Aceptar</a>
                          </div>
                        </div>

                    <div class="input-field col s12">
                      <a class="waves-effect waves-green btn-flat" onclick="buscargrua()" >Buscar</a>
                    </div>
                  </div>
                  </form>

                  <form>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="plac" type="text" class="validate" required placeholder="Placas"
                        onKeyUp="convertir_aMayuscula(this.value, this.id)">
                        <label for="first_name">Placas</label>
                      </div>
                      </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="tipoac" type="text" class="validate" required placeholder="Tipo">
                        <label for="first_name">Tipo</label>
                      </div>
                      </div>

                    <div class="row">
                    <div class="input-field col s12">
                      <input  id="marcaac" type="text" class="validate" required placeholder="Marca">
                      <label for="first_name">Marca</label>
                    </div>
                    </div>

                    <div class="row">
                    <div class="input-field col s12">
                      <input  id="modac" type="text" class="validate" required placeholder="Modelo ">
                      <label for="first_name">Modelo</label>
                    </div>
                    </div>

                    <div class="row">
                    <div class="input-field col s12">
                      <input  id="numac" type="text" class="validate" required placeholder="NÚmero">
                      <label for="first_name">Número</label>
                    </div>
                    </div>

                    <!-- Modal Trigger -->
                        <div class="row">
                          <div class="input-field col s6">
                            <input id="id_operadorMod" type="text" class="validate" required placeholder ="Código operador">
                            <label for="first_name">Código operador</label>
                          </div>
                          <div class="col s6">
                            <a class="waves-effect waves-light
                            btn orange modal-triggerGetAllOpe"
                            href="#modalGetAllOpe" onclick="getAllOpe()">Operador</a>

                          </div>


                        </div>

                     <a class="waves-effect btn green" onclick="modificargrua()" >Modificar</a>
                  </form>
                  <div class="row"></div>
             </div>
        </div>
      </div>

        <div class="col s12 m12 l4" id="eliminar_gruas">
          <div class="card">
              <div class="row">
                  <h2 class="title">Eliminar Grúa</h2>

                    <div class="col s12">
                      <!-- Modal Trigger -->
                      <div class="row">
                          <div class="input-field col s6">
                            <input  id="noseliminar" placeholder="Código grua" type="text" class="validate" required>
                            <label for="first_name">Código grua</label>
                          </div>

                          <div class="col s6">
                            <a class="waves-effect waves-light
                            btn orange modal-triggerGetAllGruas"
                            href="#modalGetAllGruas" onclick="getAllGruas()">Grúa</a>
                          </div>
                      </div>
                    </div>

               </div>
                 <a class="waves-effect waves btn red" onclick="eliminargrua()">Eliminar</a>
                 <div class="row">
                   <p></p>
                 </div>

          </div>
        </div>
      </div>

  <div class="row">
      <div class="col s12 m12 l12">
          <div class="card">
           <h2 class="title">Grúas </h2>
            <div class="card-content">
            <table id="example" class="display responsive-table"  cellspacing="0"  style="font-size:12px;">
                <thead>
                  <tr>
                  <th>Código grúa</th>
                  <th>Placas</th>
                  <th>Tipo</th>
                  <th>Marca</th>

                  <th>Modelo</th>
                  <th>Número</th>
                  <th>Código operador</th>
                  </tr>
                </thead>
                <tbody  id="muestra">

                </tbody>
              </table>
            </div>
          </div>
      </div>

  </div>
<?php include('inc/footer.php'); ?>