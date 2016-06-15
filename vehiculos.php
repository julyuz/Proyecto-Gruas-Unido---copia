<?php include('inc/header.php'); ?>
<script src="js/vehiculo.js"></script>
<script src ="js/funciones_generales.js"></script>

<meta chartset="UTF-8">

<div class="row" id="row1_vehiculos">

        <div class="col s12 m12 l4" id ="agregar_vehiculos">
          <div class="card">
            <div class="card-content">
                <div class="row">
                  <h2 class="title">Agregar Vehiculo</h2>
                  <form class="col s12">
                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="placas" type="text"  class="validate" required
                        onKeyUp="convertir_aMayuscula(this.value, this.id)" maxLength="10">
                        <label for="first_name">Placas</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col s12">
                        <!-- Modal Trigger -->
                        <div class="row">
                          <div class="col s6">
                            <a class="waves-effect waves-light
                            btn orange modal-triggerGetAllClients"
                            href="#modalGetAllClients" onclick="getAllClients()">Cliente</a>

                          </div>

                          <div class="input-field col s6">
                            <input id="nombreCliente" type="text" class="validate" required placeholder ="Nombre cliente">
                            <label for="first_name">Nombre cliente</label>
                          </div>
                        </div>

                        <!-- Modal Structure -->
                        <div id="modalGetAllClients" class="modal">
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
                        </div>
                      </div>

                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input id="codigo" type="number" class="validate" required placeholder="Código del cliente">
                        <label for="first_name">Código del cliente</label>
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
                        <input  id="color" type="text" class="validate" required>
                        <label for="first_name">Color</label>
                      </div>

                    </div>

                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="marca" type="text" class="validate" required>
                        <label for="first_name">Marca</label>
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
                        <input  id="num_serie_vehiculo" type="text" class="validate" required>
                        <label for="first_name">N. de serie</label>
                      </div>
                    </div>


                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="num_serie_motor" type="text" class="validate" required>
                        <label for="first_name">N. de motor</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <textarea class="materialize-textarea" id="observacion" rows="20" cols="20"
                        name="observacion"  class="validate" required></textarea>
                        <label for="first_name">Observación</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="autoridad_intervino" type="text" class="validate" required>
                        <label for="first_name">¿Autoridad que intervino?</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="motivo" type="text" class="validate" required>
                        <label for="first_name">Motivo</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s6">
                       <label for="fecha_ingreso">Fecha de ingreso</label>
                      </div>
                      <div class="input-field col s6">
                       <label for="fechaFinal">Fecha de salida</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s6">
                       <input  required id="fecha_ingreso" type="date" value="<?PHP  echo date('Y-m-d', strtotime('-1 day')); ?>" >
                     </div>

                     <div class="input-field col s6">
                       <input  required id="fecha_salida" type="date"  >
                     </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="aseguradora" type="text" class="validate" required>
                        <label for="first_name">Aseguradora</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="ajustador" type="text" class="validate" required>
                        <label for="first_name">Ajustador</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="tel_ajustador" type="text" class="validate" required>
                        <label for="first_name">Tel ajustador</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="num_economico" type="text" class="validate" required>
                        <label for="first_name">N. económico</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="razon_social" type="text" class="validate" required>
                        <label for="first_name">Razón social</label>
                      </div>
                    </div>

                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="pa" type="text" class="validate" required>
                        <label for="first_name">P.A.</label>
                      </div>

                    </div>

                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="ac" type="text" class="validate" required>
                        <label for="first_name">A.C.</label>
                      </div>

                    </div>

                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="no_siniestro" type="number" class="validate" required>
                        <label for="first_name">N. de siniestro</label>
                      </div>

                    </div>



                     <a class="waves-effect waves-teal btn-flat" onclick="agregarvehiculo()">Agregar</a>
                  </form>

                </div>
            </div>
          </div>
        </div>

        <div class="col s12 m12 l4" id ="modificar_vehiculos">
          <div class="card">
              <div class="row">
                  <h2 class="title">Modificar Vehiculo</h2>
                    <form class="col s12" action="javascript:buscarvehiculo()">
                    <div class="row">

                      <div class="row">
                        <div class="col s12">
                          <!-- Modal Trigger -->
                          <div class="row">
                            <div class="col s6">
                              <a class="waves-effect waves-light
                              btn orange modal-triggerGetAllCars"
                              href="#modalGetAllCars" onclick="getAllCars()">Placas</a>

                            </div>

                            <div class="input-field col s6">
                              <input  id="vbuscar" type="text" class="validate" required maxLength ="10"
                              onKeyUp ="convertir_aMayuscula(this.value, this.id)"
                              placeholder ="Placas">
                              <label for="first_name">Placas</label>
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
                                  <th>P.A.</th>
                                  <th>A.C.</th>
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
                        </div>

                      </div>

                      <div class="input-field col s12">
                      <a class="waves-effect waves-orange btn-flat" onclick="buscarvehiculo()" >Buscar</a>
                      </div>

                    </div>
                    </form>

                    <form>
                      <div class="row">
                        <div class="input-field col s6">
                          <input disabled value="Placas" id="placasac" type="text" class="validate" placeholder="Placas" required>
                          <label for="first_name">Placas</label>
                        </div>
                          <div class="input-field col s12">
                          <input  id="codigoac" type="number" class="validate" placeholder="codigo del cliente" required>
                          <label for="first_name">Código del cliente</label>
                        </div>
                         <div class="input-field col s12">
                          <input  id="marcaActualizar" type="text" class="validate" placeholder="Marca" required>
                          <label for="first_name">Marca</label>
                        </div>
                        <div class="input-field col s12">
                          <input  id="tipoActualizar" type="text" class="validate" placeholder="Tipo" required >
                          <label for="first_name">Tipo</label>
                        </div>
                        </div>

                        <div class="row">
                        <div class="input-field col s12">
                          <input  id="colorActualizar" type="text" class="validate" placeholder="Color" required>
                          <label for="first_name">Color</label>
                        </div>
                      </div>

                       <div class="row">
                        <div class="input-field col s12">
                          <input  id="modeloActualizar" type="text" class="validate" placeholder="Modelo" required>
                          <label for="first_name">Modelo</label>
                        </div>
                      </div>

                       <div class="row">
                        <div class="input-field col s12">
                          <input  id="noserieActualizar" type="text" class="validate" placeholder="N. de serie" required>
                          <label for="first_name">N. de serie</label>
                        </div>
                      </div>

                       <div class="row">
                        <div class="input-field col s12">
                          <input  id="nomotorActualizar" type="text" class="validate" placeholder="N de motor" required>
                          <label for="first_name">N. de motor</label>
                        </div>
                      </div>

                       <div class="row">
                        <div class="input-field col s12">
                          <textarea class="materialize-textarea" id="obsActualizar" placeholder="Observacion"
                           rows="20" cols="20" name="Observacion"  class="validate" required></textarea>
                          <label for="first_name">Observación</label>
                        </div>
                      </div>

                       <div class="row">
                        <div class="input-field col s12">
                          <input  id="aiActualizar" type="text" class="validate" placeholder="Autoridad que intervino" required>
                          <label for="first_name">Autoridad que intervino</label>
                        </div>
                      </div>

                       <div class="row">
                        <div class="input-field col s12">
                          <input  id="motivoActualizar" type="text" class="validate" placeholder="Motivo" required>
                          <label for="first_name">Motivo</label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s6">
                         <label for="fecha_ingreso">Fecha de ingreso</label>
                        </div>
                        <div class="input-field col s6">
                         <label for="fechaFinal">Fecha de salida</label>
                        </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s6">
                         <input  id="fiActualizar" required  type="date"  >
                       </div>

                       <div class="input-field col s6">
                         <input id="fsActualizar" required type="date"  >
                       </div>
                      </div>


                       <div class="row">
                        <div class="input-field col s12">
                          <input  id="asgActualizar" type="text" class="validate" placeholder="Aseguradora" required>
                          <label for="first_name">Aseguradora</label>
                        </div>
                      </div>


                       <div class="row">
                        <div class="input-field col s12">
                          <input  id="ajActualizar" type="text" class="validate" placeholder="Ajustador" required>
                          <label for="first_name">Ajustador</label>
                        </div>
                      </div>


                       <div class="row">
                        <div class="input-field col s12">
                          <input  id="tajActualizar" type="text" class="validate" placeholder="Tel ajustador" required>
                          <label for="first_name">Tel ajustador</label>
                        </div>
                      </div>


                       <div class="row">
                        <div class="input-field col s12">
                          <input  id="nmeActualizar" type="text" class="validate" placeholder="N. economico" required>
                          <label for="first_name">N. economico</label>
                        </div>
                      </div>


                       <div class="row">
                        <div class="input-field col s12">
                          <input  id="rzsActualizar" type="text" class="validate" placeholder="Razón social" required>
                          <label for="first_name">Razón social</label>
                        </div>
                      </div>

                       <div class="row">
                        <div class="input-field col s12">
                          <input  id="paActualizar" type="text" class="validate" placeholder="P.A." required>
                          <label for="first_name">P.A.</label>
                        </div>

                      </div>

                       <div class="row">
                        <div class="input-field col s12">
                          <input  id="acActualizar" type="text" class="validate" placeholder="A.C." required>
                          <label for="first_name">A.C.</label>
                        </div>

                      </div>

                       <div class="row">
                        <div class="input-field col s12">
                          <input  id="nsiActualizar" type="number" class="validate" placeholder="N.de siniestro" required>
                          <label for="first_name">N. de siniestro</label>
                        </div>

                      </div>

                       <a class="waves-effect waves-teal btn-flat" onclick="modificarvehiculo()" >Modificar</a>
                    </form>
                    <div class="row"></div>
               </div>
          </div>
        </div>

        <div class="col s12 m12 l4" id="eliminar_vehiculos">
            <div class="card">
                <div class="row">
                    <h2 class="title">Eliminar Vehiculo</h2>

                    <div class="row">
                        <div class="col s12">
                          <!-- Modal Trigger -->
                          <div class="row">
                            <div class="col s6">
                              <a class="waves-effect waves-light
                              btn orange modal-triggerGetAllCars"
                              href="#modalGetAllCars" onclick="getAllCars()">Placas</a>

                            </div>

                            <div class="input-field col s6">
                             <input id="noseliminar" type="text" class="validate" placeholder="placas" required
                             onKeyUp="convertir_aMayuscula(this.value, this.id)">
                             <label for="icon_prefix">Placas</label>
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
                                  <th>P.A.</th>
                                  <th>A.C.</th>
                                  <th>Codigo cliente</th>
                                  <th>Nombre cliente</th>

                                  </tr>
                                </thead>
                                <tbody id ="tbodyAllCars"> </tbody>
                              </table>

                            </div>
                            <div class="modal-footer">
                              <a href="#!" class=" modal-action
                              modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                          </div>
                        </div>

                      </div>
                 </div>
                   <a class="waves-effect waves btn red" onclick="eliminarvehiculos()">Eliminar</a>
                   <div class="row">
                     <p></p>
                   </div>

            </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l12">
              <div class="card">
               <h2 class="title">Vehículos Siniestrados </h2>
                <div class="card-content">
                <table id="example" class="display responsive-table"  cellspacing="0"  style="font-size:12x;">
                    <thead>
                      <tr>

                      <th>Placas</th>
                      <th>Marca</th>
                      <th>Tipo</th>
                      <th>Modelo</th>

                      <th>No motor</th>
                      <th>P.A.</th>
                      <th>A.C.</th>
                      <th>No. siniestro</th>
                      <th>Codigo cliente</th>
                      <th>Nombre cliente</th>

                      </tr>
                    </thead>
                    <tbody id ="tbodyVehiculos">

                    </tbody>
                  </table>
                </div>
              </div>
        </div>

      </div>
<?php include('inc/footer.php'); ?>