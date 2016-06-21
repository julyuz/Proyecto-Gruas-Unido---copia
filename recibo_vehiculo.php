<?php include('inc/header.php');
  date_default_timezone_set('America/Mexico_City');
  session_start();
  if(isset($_SESSION['Usuario'])){

  }else{
    header("Location: iniciar.php?Error=Acceso denegado");
  }

?>
<script src="js/recibo_vehiculo.js"></script>
<script src="js/funciones_generales.js"></script>

<meta chartset="UTF-8">
    <div class="row" id="row1_rv">

        <div class="col s12 m12 l4" id ="agregar_rv">

          <div class="card">
            <!--<div class="card-content">-->
                <div class="row">
                  <h2 class="title">Agregar Recibo vehiculo</h2>
                  <form class="col s12">

                      <!-- Modal Trigger -->
                      <div class="row">
                          <div class="col s4 offset-s4">
                            <a class="waves-effect waves-light
                            btn orange modal-triggerGetAllCars"
                            href="#modalGetAllCars" onclick="getAllCars()">Vehículo</a>
                          </div>
                      </div>

                        <!-- Modal Structure -->
                        <div id="modalGetAllCars" class="modal">
                          <div class="modal-content" id="modal-contentGetAllCarss">
                            <h4>Vehículos</h4>
                            <p>Elija un vehículo:</p>

                            <table id="tableAllCars" class="display responsive-table"  cellspacing="0"  style="font-size:12x;">
                              <thead>
                                <tr>

                                <th>Placas</th>
                                <th>Marca</th>
                                <th>Tipo</th>
                                <th>Modelo</th>
                                <th>No motor</th>

                                <th>Fecha ingreso</th>
                                <th>Fecha salida</th>
                                <th>Color</th>
                                <th>Codigo cliente</th>
                                <th>Nombre cliente</th>

                                </tr>
                              </thead>
                              <tbody id ="tbodyAllCars">

                              </tbody>
                            </table>

                          </div>
                          <div class="modal-footer">
                            <a href="#!" class=" modal-action
                            modal-close waves-effect waves-green btn-flat">Aceptar</a>
                          </div>
                        </div>


                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="suscriptor" type="text" placeholder="Suscriptor" class="validate" required>
                        <label for="first_name">Suscriptor</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="marca" type="text" placeholder="Marca" class="validate" required>
                        <label for="first_name">Marca</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="tipo" type="text" placeholder="Tipo" class="validate" required>
                        <label for="first_name">Tipo</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="modelo" type="text" placeholder="Modelo" class="validate" required>
                        <label for="first_name">Modelo</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="color" type="text" placeholder="Color" class="validate" required>
                        <label for="first_name">Color</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="placas" type="text" placeholder="Placas" maxlength="10" class="validate" required
                        onKeyUp ="convertir_aMayuscula(this.value, this.id)">
                        <label for="first_name">Placas</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s6">
                       <label for="fecha_ingreso">Fecha de ingreso</label>
                      </div>
                      <div class="input-field col s6">
                       <label for="fecha_documento">Fecha de documento</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s6">
                       <input  required id="fecha_ingreso" type="date"  >
                     </div>

                     <div class="input-field col s6">
                       <input  required id="fecha_documento" type="date" value="<?PHP  echo date('Y-m-d', strtotime('-1 day')); ?> ">
                     </div>
                    </div>

                      <!-- Modal Trigger -->
                      <div class="row">
                          <div class="col s4 offset-s4">
                            <a class="waves-effect waves-light
                            btn orange modal-triggerGetAllAtds"
                            href="#modalGetAllAtds" onclick="getAllAtds()">Autoridad</a>
                          </div>
                      </div>

                        <!-- Modal Structure -->
                        <div id="modalGetAllAtds" class="modal">
                          <div class="modal-content" id="modal-contentGetAllAtds">
                            <h4>Autoridades</h4>
                            <p>Elija una autoridad:</p>

                            <table id="tableAllAtds" class="display responsive-table"  cellspacing="0"  style="font-size:12x;">
                              <thead>
                                <tr>

                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Jefe</th>
                                <th>Puesto</th>
                                <th>Tel jefe</th>

                                </tr>
                              </thead>
                              <tbody id ="tbodyAllAtds">

                              </tbody>
                            </table>

                          </div>
                          <div class="modal-footer">
                            <a href="#!" class=" modal-action
                            modal-close waves-effect waves-green btn-flat">Aceptar</a>
                          </div>
                        </div>


                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="autoridad" type="text" placeholder="Autoridad" class="validate" required>
                        <label for="first_name">Autoridad</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="nombre" type="text" placeholder="Nombre cliente" class="validate" required>
                        <label for="first_name">Nombre cliente</label>
                      </div>
                    </div>

                    <a class="waves-effect waves-teal btn-flat" onclick="agregarRecibo_vehiculo()">Crear documento</a>
                    <div class="row"></div>
                  </form>

                </div>
            <!--</div>-->
          </div>
        </div>

        <div class="col s12 m12 l4" id ="modificar_rv">
          <div class="card">
              <div class="row" >
                  <h2 class="title">Modificar Recibo vehiculo</h2>
                    <form class="col s12" action="javascript:buscarRecibo_vehiculo()">
                      <div class="row">

                        <!--<div class="input-field col s6">
                          <input  id="recibo_vehiculoBuscar" type="text" class="validate" maxlength="15" required>
                          <label for="first_name">Código o cliente</label>
                        </div>

                        <div class="input-field col s6">
                          <a class="waves-effect btn" onclick="buscarRecibo_vehiculo()" >Buscar</a>
                        </div>-->

                        <!-- Modal Trigger -->
                          <div class="col s4 offset-s4">
                            <a class="waves-effect waves-light
                            btn orange modal-triggerGetAllRV"
                            href="#modalGetAllRV" onclick="getAllRV()">Recibo vehiculo</a>
                          </div>
                        <!-- Modal Structure -->
                        <div id="modalGetAllRV" class="modal">
                          <div class="modal-content" id="modal-contentGetAllRV">
                            <h4>Recibos vehiculo</h4>
                            <p>Elija un recibo:</p>

                            <table id="tableAllRV" class="display responsive-table"  cellspacing="0"  style="font-size:12x;">
                              <thead>
                                <tr>

                                <th>Codigo</th>
                                <th>Suscriptor</th>
                                <th>Marca</th>
                                <th>Tipo</th>
                                <th>Modelo</th>

                                <th>Color</th>
                                <th>Placas carro</th>
                                <th>Fecha ingreso</th>
                                <th>Fecha documento</th>
                                <th>Autoridad</th>

                                <th>Nombre cliente</th>

                                </tr>
                              </thead>
                              <tbody id ="tbodyAllRV">

                              </tbody>
                            </table>

                          </div>
                          <div class="modal-footer">
                            <a href="#!" class=" modal-action
                            modal-close waves-effect waves-green btn-flat">Aceptar</a>
                          </div>
                        </div>


                      </div>
                    </form>

                    <form>
                      <div class="row">
                        <div class="input-field col s6">
                          <input disabled value="co" id="co" type="number" class="validate" placeholder="Codigo de recibo vehiculo" required maxlength="20">
                          <label for="first_name">Codigo de recibo vehiculo</label>
                        </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="suscriptorActualizar" placeholder="Suscriptor" type="text" class="validate" required>
                        <label for="first_name">Suscriptor</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="marcaActualizar" placeholder="Marca" type="text" class="validate" required>
                        <label for="first_name">Marca</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="tipoActualizar" placeholder="Tipo" type="text" class="validate" required>
                        <label for="first_name">Tipo</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="modeloActualizar" placeholder="Modelo" type="text" class="validate" required>
                        <label for="first_name">Modelo</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="colorActualizar" placeholder="Color" type="text" class="validate" required>
                        <label for="first_name">Color</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="placasActualizar" placeholder="Placas"
                        maxlength="10" type="text" class="validate" required
                         onKeyUp ="convertir_aMayuscula(this.value, this.id)">
                        <label for="first_name">Placas</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s6">
                       <label for="fecha_ingresoActualizar">Fecha de ingreso</label>
                      </div>
                      <div class="input-field col s6">
                       <label for="fecha_documentoActualizar">Fecha de documento</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s6">
                       <input  required id="fecha_ingresoActualizar"  type="date"  >
                     </div>

                     <div class="input-field col s6">
                       <input  required id="fecha_documentoActualizar" type="date"  >
                     </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="autoridadActualizar" placeholder="Autoridad" type="text" class="validate" required>
                        <label for="first_name">Autoridad</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="nombreActualizar" placeholder="Nombre cliente" type="text" class="validate" required>
                        <label for="first_name">Nombre cliente</label>
                      </div>
                    </div>


                       <a class="waves-effect waves-teal btn-flat" onclick="modificarRecibo_vehiculo()" >Modificar documento</a>
                    </form>
                    <div class="row"></div>
               </div>
          </div>
        </div>

        <div class="col s12 m12 l4" id="eliminar_rv">
          <div class="card">
              <div class="row" id ="Eliminar">
                  <h2 class="title">Eliminar Recibo vehiculo</h2>

                     <div class="input-field col s12">
                       <input id="nombreliminar" type="text" class="validate" placeholder="Nombre cliente o codigo de recibo vehiculo" required>
                       <label for="icon_prefix">Nombre cliente o codigo de recibo vehiculo</label>
                     </div>

                    <!-- Modal Trigger -->
                          <div class="col s4 offset-s4">
                            <a class="waves-effect waves-light
                            btn orange modal-triggerGetAllRV"
                            href="#modalGetAllRV" onclick="getAllRV()">Recibo vehiculo</a>
                          </div>

                        <!-- Modal Structure -->
                        <div id="modalGetAllRV" class="modal">
                          <div class="modal-content" id="modal-contentGetAllRV">
                            <h4>Recibos vehiculo</h4>
                            <p>Elija un recibo:</p>

                            <table id="tableAllRV" class="display responsive-table"  cellspacing="0"  style="font-size:12x;">
                              <thead>
                                <tr>

                                <th>Codigo</th>
                                <th>Suscriptor</th>
                                <th>Marca</th>
                                <th>Tipo</th>
                                <th>Modelo</th>

                                <th>Color</th>
                                <th>Placas carro</th>
                                <th>Fecha ingreso</th>
                                <th>Fecha documento</th>
                                <th>Autoridad</th>

                                <th>Nombre cliente</th>

                                </tr>
                              </thead>
                              <tbody id ="tbodyAllRV">

                              </tbody>
                            </table>

                          </div>
                          <div class="modal-footer">
                            <a href="#!" class=" modal-action
                            modal-close waves-effect waves-green btn-flat">Aceptar</a>
                          </div>
                        </div>


               </div>
               <a class="waves-effect waves-red btn-flat" onclick="eliminarRecibo_vehiculo()">Eliminar</a>
               <div class="row"><p></p> </div>
          </div>
        </div>
      </div>

      <div class="row" id ="Tabla">
        <div class="col s12 m12 l12">
              <div class="card">
               <h2 class="title">Recibos vehiculo</h2>
                <div class="card-content">
                  <table id="example" class="display responsive-table"  cellspacing="0"  style="font-size:12px;">
                    <thead>
                      <tr>
                        <th>Código</th>
                        <th>Suscriptor</th>
                        <th>Marca</th>
                        <th>Tipo</th>
                        <th>Modelo</th>

                        <th>Color</th>
                        <th>Placas carro</th>
                        <th>Fecha ingreso</th>
                        <th>Fecha documento</th>
                        <th>Autoridad</th>

                        <th>Nombre cliente</th>
                      </tr>
                    </thead>
                    <tbody  id="muestra">

                    </tbody>
                  </table>
                </div> <!-- fin card-content -->
              </div> <!-- fin card -->
        </div>
      </div> <!-- fin row -->
<?php include('inc/footer.php'); ?>