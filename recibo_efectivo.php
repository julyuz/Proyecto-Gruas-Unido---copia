<?php include('inc/header.php');
  date_default_timezone_set('America/Mexico_City');
  session_start();
  if(isset($_SESSION['Usuario'])){

  }else{
    header("Location: iniciar.php?Error=Acceso denegado");
  }
 ?>
<script src="js/recibo_efectivo.js"></script>
<script src="js/funciones_generales.js"></script>

<meta chartset="UTF-8">
    <div class="row" id="row1_re">

        <div class="col s12 m12 l4" id="agregar_re">
          <div class="row">
            <div class="row"></div>





          </div>
          <div class="card">
            <!--<div class="card-content">-->
                <div class="row">
                  <h2 class="title">Agregar Recibo efectivo</h2>
                  <form class="col s12">

                    <div class="row">

                      <div class="row">
                        <div class="input-field col s12">
                          <input  id="cantnumero" type="number" class="validate" required onKeyUp="numaLetra(this.id, 'cantletra')">
                          <label for="first_name">Cantidad en número</label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12">
                          <input  id="cantletra" placeholder="Cantidad en letra" type="text" class="validate" required>
                          <label for="first_name">Cantidad en letra</label>
                        </div>
                      </div>

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
                          <input  id="placas" maxLength="10" placeholder ="Placas"
                          onKeyUp ="convertir_aMayuscula(this.value, this.id)" type="text" class="validate" required>
                          <label for="first_name">Placas</label>
                        </div>
                      </div>

                    <!-- Modal Trigger -->
                        <!--<div class="row">
                          <div class="col s4 offset-s4">
                            <a class="waves-effect waves-light
                            btn orange modal-triggerGetAllClients"
                            href="#modalGetAllClients" onclick="getAllClients()">Cliente</a>

                          </div>

                        </div>-->

                        <!-- Modal Structure-->
                        <!--<div id="modalGetAllClients" class="modal">
                          <div class="modal-content" id="model-contentGetAllClients">
                            <h4>Clientes</h4>
                            <p>Elija un cliente:</p>

                            <table id="tableAllClients" class="display responsive-table"
                             cellspacing="0"  style="font-size:12x;">
                              <thead>
                                <tr>

                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Celular</th>

                                <th>Calle</th>

                                </tr>
                              </thead>
                              <tbody id="tbodyAllClients">

                              </tbody>
                            </table>

                          </div>
                          <div class="modal-footer">
                            <a href="#!" class=" modal-action
                            modal-close waves-effect waves-orange btn-flat">Aceptar</a>
                          </div>
                        </div>-->

                      <div class="row">
                        <div class="input-field col s12">
                          <input  id="nombre" type="text" class="validate" placeholder ="Nombre cliente" required>
                          <label for="first_name">Nombre cliente</label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12">
                          <input  id="marca" type="text" class="validate" placeholder ="Marca" required>
                          <label for="first_name">Marca</label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12">
                          <input  id="tipo" type="text" class="validate" placeholder ="Tipo" required>
                          <label for="first_name">Tipo</label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12">
                          <input  id="modelo" type="text" class="validate" placeholder ="Modelo" required>
                          <label for="first_name">Modelo</label>
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
                           <input  required id="fecha_documento" type="date" value="<?PHP  echo date('Y-m-d', strtotime('-1 day')); ?>" >
                         </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12">
                          <input  id="receptor" type="text" class="validate" required>
                          <label for="first_name">Receptor</label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12">
                          <textarea id="descripcion" class="validate materialize-textarea" cols="30" rows="20"></textarea>
                          <label for="first_name">Descripción</label>
                        </div>
                      </div>

                    <a class="waves-effect waves-teal btn-flat" onclick="agregarRecibo_efectivo()">Crear documento</a>
                    <div class="row"></div>
                  </form>

                </div> <!-- fin row -->
          </div>
          </div>
        </div>

        <div class="col s12 m12 l4" id ="modificar_re">
          <div class="card">
              <div class="row" >
                  <h2 class="title">Modificar Recibo efectivo</h2>
                    <form class="col s12" action="javascript:buscarRecibo_efectivo()">
                      <div class="row">

                        <!--<div class="input-field col s6">
                          <input  id="recibo_efectivoBuscar" type="text" class="validate"
                          placeholder ="Código de recibo" maxlength="15" required>
                          <label for="first_name">Código de recibo</label>
                        </div>-->

                        <!--<div class="input-field col s6">
                          <a class="waves-effect btn" onclick="buscarRecibo_efectivo()" >Buscar</a>
                        </div>-->

                        <!-- Modal Trigger -->
                          <div class="col s4 offset-s4">
                            <a class="waves-effect waves-light
                            btn orange modal-triggerGetAllRE"
                            href="#modalGetAllRE" onclick="getAllRE()">Recibo efectivo</a>
                          </div>
                        <!-- Modal Structure -->
                        <div id="modalGetAllRE" class="modal">
                          <div class="modal-content" id="modal-contentGetAllRE">
                            <h4>Recibos efectivo</h4>
                            <p>Elija un recibo:</p>

                            <table id="tableAllRE" class="display responsive-table"  cellspacing="0"  style="font-size:12x;">
                              <thead>
                                <tr>

                                <th>Codigo</th>
                                <th>Nombre cliente</th>
                                <th>Cantidad número</th>
                                <th>Cantidad letra</th>
                                <th>Placas carro</th>

                                <th>Marca</th>
                                <th>Tipo</th>
                                <th>Modelo</th>
                                <th>Fecha ingreso</th>
                                <th>Fecha documento</th>

                                <th>Receptor</th>
                                <th>Descripción</th>

                                </tr>
                              </thead>
                              <tbody id ="tbodyAllRE">

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
                            <input disabled value="co" id="co" type="number" class="validate" placeholder="Codigo de recibo efectivo" required maxlength="20">
                            <label for="first_name">Codigo de recibo efectivo</label>
                          </div>
                          <div class="input-field col s12">
                            <input  id="nombreActualizar" placeholder="Nombre del cliente" type="text" class="validate" required>
                            <label for="first_name">Nombre del cliente</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s12">
                            <input  id="cantnumeroActualizar" type="number" class="validate" onKeyUp="numaLetra(this.id, 'cantletraActualizar')" required placeholder="Cantidad en número">
                            <label for="first_name">Cantidad en número</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s12">
                            <input  id="cantletraActualizar" type="text" class="validate" required placeholder="Cantidad en letra">
                            <label for="first_name">Cantidad en letra</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s12">
                            <input  id="placasActualizar" maxLength="10" onKeyUp ="convertir_aMayuscula(this.value, this.id)" type="text" class="validate" required placeholder="Placas">
                            <label for="first_name">Placas</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s12">
                            <input  id="marcaActualizar" type="text" class="validate" required placeholder="Marca">
                            <label for="first_name">Marca</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s12">
                            <input  id="tipoActualizar" type="text" class="validate" required placeholder="Tipo">
                            <label for="first_name">Tipo</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s12">
                            <input  id="modeloActualizar" type="text" class="validate" required placeholder="Modelo">
                            <label for="first_name">Modelo</label>
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
                           <input  required id="fecha_ingresoActualizar" type="date"  >
                         </div>

                         <div class="input-field col s6">
                           <input  required id="fecha_documentoActualizar" type="date"  >
                         </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s12">
                            <input  id="receptorActualizar" type="text" class="validate" required placeholder="Receptor">
                            <label for="first_name">Receptor</label>
                          </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s12">
                            <textarea id="descripcionActualizar" class="validate materialize-textarea" cols="30" rows="20" placeholder="Descripcion"></textarea>
                            <label for="first_name">Descripción</label>
                          </div>
                        </div>

                         <a class="waves-effect waves-teal btn-flat" onclick="modificarRecibo_efectivo()" >Modificar documento</a>
                    </form>
                    <div class="row"></div>
               </div>
          </div>
        </div>

        <div class="col s12 m12 l4" id="eliminar_re">
          <div class="card">
              <div class="row">
                  <h2 class="title">Eliminar Recibo efectivo</h2>

                     <div class="input-field col s12">
                       <input id="nombreliminar" type="text" class="validate" placeholder="Nombre cliente o codigo de recibo efectivo" required>
                       <label for="icon_prefix">Nombre cliente o codigo de recibo efectivo</label>
                     </div>

                      <!-- Modal Trigger -->
                          <div class="col s4 offset-s4">
                            <a class="waves-effect waves-light
                            btn orange modal-triggerGetAllRE"
                            href="#modalGetAllRE" onclick="getAllRE('eliminar')">Recibo efectivo</a>
                          </div>
                        <!-- Modal Structure -->
                        <div id="modalGetAllRE" class="modal">
                          <div class="modal-content" id="modal-contentGetAllRE">
                            <h4>Recibos efectivo</h4>
                            <p>Elija un recibo:</p>

                            <table id="tableAllRE" class="display responsive-table"  cellspacing="0"  style="font-size:12x;">
                              <thead>
                                <tr>

                                <th>Codigo</th>
                                <th>Nombre cliente</th>
                                <th>Cantidad número</th>
                                <th>Cantidad letra</th>
                                <th>Placas carro</th>

                                <th>Marca</th>
                                <th>Tipo</th>
                                <th>Modelo</th>
                                <th>Fecha ingreso</th>
                                <th>Fecha documento</th>

                                <th>Receptor</th>
                                <th>Descripción</th>

                                </tr>
                              </thead>
                              <tbody id ="tbodyAllRE">

                              </tbody>
                            </table>

                          </div>
                          <div class="modal-footer">
                            <a href="#!" class=" modal-action
                            modal-close waves-effect waves-green btn-flat">Aceptar</a>
                          </div>
                        </div>


              </div>
               <a class="waves-effect waves-red btn-flat" onclick="eliminarRecibo_efectivo()">Eliminar</a>
               <div class="row"><p></p> </div>
          </div>
        </div>

    </div>

    <div class="row" id ="Tabla">
      <div class="col s12 m12 l12">
            <div class="card">
                <h2 class="title">Recibos efectivo</h2>
                <div class="card-content">
                  <table id="example" class="display responsive-table"  cellspacing="0"  style="font-size:12px;">
                    <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Nombre cliente</th>
                        <th>Cantidad número</th>
                        <th>Cantidad letra</th>
                        <th>Placas carro</th>

                        <th>Marca</th>
                        <th>Tipo</th>
                        <th>Modelo</th>
                        <th>Fecha ingreso</th>
                        <th>Fecha documento</th>

                        <th>Receptor</th>
                        <th>Descripción</th>
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