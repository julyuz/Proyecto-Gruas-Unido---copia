<?php include('inc/header.php');
  date_default_timezone_set('America/Mexico_City');
  session_start();
  if(isset($_SESSION['Usuario'])){

  }else{
    header("Location: iniciar.php?Error=Acceso denegado");
  }
?>
<script src="js/cliente.js"></script>
<script src="js/funciones_generales.js"></script>

<meta chartset="UTF-8">
     <div class="row" id="row1_clientes">



        <div class="col s12 m12 l4" id="agregar_clientes">
          <div class="card">
            <!--<div class="card-content">-->
                <div class="row">
                  <h2 class="title">Agregar Cliente</h2>
                  <form class="col s12">

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="nombre" type="text" class="validate" required>
                        <label for="first_name">Nombre completo</label>
                      </div>
                    </div>

                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="correo" type="email" class="validate" required>
                        <label for="first_name">Correo</label>
                      </div>
                    </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="telf" type="number" class="validate" required
                        maxLength="10">
                        <label for="first_name">Teléfono fijo</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="telcel" type="number" class="validate" required
                         maxLength="13">
                        <label for="first_name">Teléfono celular</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="calle" type="text" class="validate" required>
                        <label for="first_name">Calle</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="colonia" type="text" class="validate" required>
                        <label for="first_name">Colonia</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="codpos" type="number" class="validate" required>
                        <label for="first_name">Código postal</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="numext" type="number" class="validate" required>
                        <label for="first_name">Número exterior</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="numint" type="number" class="validate" value ="0" required>
                        <label for="first_name">Número interior</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="ciudad" type="text" class="validate" required>
                        <label for="first_name">Ciudad</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="cont1" type="text" class="validate" required>
                        <label for="first_name">Contacto 1</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="telcont1" type="text" class="validate" required>
                        <label for="first_name">Teléfono contacto 1</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="cont2" type="text" class="validate" required>
                        <label for="first_name">Contacto 2</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="telcont2" type="text" class="validate" required>
                        <label for="first_name">Teléfono contacto 2</label>
                      </div>
                    </div>


                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="curp" type="text" class="validate" required
                        onKeyUp="convertir_aMayuscula(this.value, this.id)">
                        <label for="first_name">Curp</label>
                      </div>
                    </div>

                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="rfc" type="text" class="validate" required
                        onKeyUp="convertir_aMayuscula(this.value, this.id)">
                        <label for="first_name">RFC</label>
                      </div>
                    </div>
                    <a class="waves-effect waves-teal btn green" onclick="agregarclientes()">Agregar</a>
                  </form>

                </div>
            <!--</div>-->
          </div>
        </div>

        <div class="col s12 m12 l4" id="modificar_clientes">
          <div class="card">
              <div class="row">
                  <h2 class="title">Modificar Cliente</h2>
                    <form class="col s12" action="javascript:buscarCliente()">
                      <div class="row">
                        <div class="input-field col s6">
                          <input  id="clienteBuscar" placeholder ="Código de cliente" type="text" class="validate" maxlength="15" required>
                          <label for="first_name">Código de cliente</label>
                        </div>
                        <div class="input-field col s6">
                          <!-- Modal Trigger -->
                          <div class="row">
                              <div class="col s4 offset-s4">
                                <a class="waves-effect waves-light
                                btn orange modal-triggerGetAllUsers"
                                href="#modalGetAllUsers" onclick="getAllUsers()">cliente</a>
                              </div>
                          </div>

                          <!-- Modal Structure -->
                          <div id="modalGetAllUsers" class="modal">
                            <div class="modal-content" id="modal-contentGetAllUsers">
                              <h4>Clientes</h4>
                              <p>Elija un cliente:</p>

                              <table id="tableAllUsers" class="display responsive-table"  cellspacing="0"  style="font-size:12x;">
                                <thead>
                                  <tr id="pointer">

                                  <th>Codigo</th>
                                  <th>Nombre</th>
                                  <th>Correo</th>
                                  <th>Celular</th>
                                  <th>Calle</th>

                                  <th>Colonia</th>
                                  <th>C.P.</th>
                                  <th>Num ext</th>
                                  <th>Num int</th>
                                  <th>Ciudad</th>

                                  <th>Curp</th>
                                  <th>RFC</th>

                                  </tr>
                                </thead>
                                <tbody id ="tbodyAllUsers">

                                </tbody>
                              </table>

                            </div>
                            <div class="modal-footer">
                              <a href="#!" class=" modal-action
                              modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                          </div>
                        </div>
                          <div class="col s12">
                            <a class="waves-effect waves-green btn-flat" onclick="buscarCliente()" >Buscar</a>

                          </div>
                      </div>
                    </form>

                    <form>
                      <div class="row">
                      <div class="input-field col s6">
                          <input disabled value="co" id="co" type="number" class="validate" placeholder="Codigo de cliente" required maxlength="20">
                          <label for="first_name">Codigo de cliente</label>
                        </div>
                        <div class="input-field col s12">
                          <input  id="nombreActualizar" type="text" class="validate" required placeholder="Nombre">
                          <label for="first_name">Nombre</label>
                        </div>
                        </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="correoActualizar" type="text" class="validate" required placeholder="Correo">
                        <label for="first_name">Correo</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="telfActualizar" type="text" class="validate" required placeholder="telefono fijo"
                         maxLength="10">
                        <label for="first_name">Telefono fijo</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="telcActualizar" type="text" class="validate" required placeholder="celular"
                         maxLength="13">
                        <label for="first_name">Celular</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="calleActualizar" type="text" class="validate" required placeholder="Calle">
                        <label for="first_name">Calle</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="coloniaActualizar" type="text" class="validate" required placeholder="Colonia">
                        <label for="first_name">Colonia</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="cpActualizar" type="text" class="validate" required placeholder="C.P.">
                        <label for="first_name">Codigo postal</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="nmexActualizar" type="text" class="validate" required placeholder="Num. exterior">
                        <label for="first_name">Numero exterior</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="nmintActualizar" type="text" class="validate" required placeholder="Num interior">
                        <label for="first_name">Numero interior</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="ciudadActualizar" type="text" class="validate" required placeholder="Ciudad">
                        <label for="first_name">Ciudad</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="cont1Actualizar" type="text" class="validate" required placeholder="Contacto 1">
                        <label for="first_name">Contacto 1</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="telcont1Actualizar" type="text" class="validate" required placeholder="tel. contacto 1">
                        <label for="first_name">Tel. contacto 1</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="cont2Actualizar" type="text" class="validate" required placeholder="Contacto 2">
                        <label for="first_name">Contacto 2</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="telcont2Actualizar" type="text" class="validate" required placeholder="tel. contacto 2">
                        <label for="first_name">Tel. contacto 2</label>
                      </div>
                      </div>

                       <div class="row">
                        <div class="input-field col s12">
                          <input  id="curpActualizar" type="text" class="validate"  placeholder="curp" required
                          onKeyUp="convertir_aMayuscula(this.value, this.id)">
                          <label for="first_name">Curp</label>
                        </div>
                      </div>
                       <div class="row">
                        <div class="input-field col s12">
                          <input  id="rfcActualizar" type="text" class="validate"  placeholder="rfc" required
                          onKeyUp="convertir_aMayuscula(this.value, this.id)">
                          <label for="first_name">RFC</label>
                        </div>
                      </div>
                       <a class="waves-effect  btn green" onclick="modificarCliente()" >Modificar</a>
                    </form>
                    <div class="row"></div>
               </div>
          </div>
        </div>

        <div class="col s12 m12 l4" id="eliminar_clientes">
          <div class="card">
              <div class="row">
                  <div class="col s12">
                    <h2 class="title">Eliminar Cliente</h2>
                  </div>

                  <div class="row">

                     <div class="input-field col s6">
                       <input id="nombreliminar" type="text" class="validate" placeholder="Código cliente" required>
                       <label for="icon_prefix">Código cliente</label>
                     </div>

                     <div class="col s6">
                       <!-- Modal Trigger -->
                          <div class="row">
                              <div class="col s4 offset-s4">
                                <a class="waves-effect waves-light
                                btn orange modal-triggerGetAllUsers"
                                href="#modalGetAllUsers" onclick="getAllUsers()">cliente</a>
                              </div>
                          </div>

                     </div>
                  </div>

               </div>
               <a class="waves-effect  btn red" onclick="eliminarclientes()">Eliminar</a>
               <div class="row">
                 <p></p>
               </div>

          </div>
        </div>
      </div>

  <div class="row">
    <div class="col s12 m12 l12">
          <div class="card">
           <h2 class="title">Clientes </h2>
            <div class="card-content">
              <table id="example" class="display responsive-table"  cellspacing="0"  style="font-size:12px;">
                <thead>
                  <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Calle</th>
                    <th>Colonia</th>
                    <th>C.P.</th>
                    <th>Num ext</th>
                    <th>Num int</th>
                    <th>Ciudad</th>
                    <th>Curp</th>
                    <th>RFC</th>
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