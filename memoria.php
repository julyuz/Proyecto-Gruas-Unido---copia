<?php include('inc/header.php');
  date_default_timezone_set('America/Mexico_City');
  session_start();
  if(isset($_SESSION['Usuario'])){

  }else{
    header("Location: iniciar.php?Error=Acceso denegado");
  }

?>
<script src="js/memoria_grafica.js"></script>
<script src="js/funciones_generales.js"></script>



<meta chartset="UTF-8">
<div class="row" id="row1_memoria">

      <div class="row"></div>
      <div class="row">

        <!-- Modal Trigger -->
          <div class="row">
            <div class="col s6">

              <div class="input-field col s12">
               <input id="id_MG" type="text" class="validate" placeholder="Código de memoria gráfica" required>
               <label for="icon_prefix">Código de memoria gráfica</label>
             </div>

            </div>

            <div class="col s6">
              <a class="waves-effect waves-light
              btn orange modal-triggerGetAllMG"
              href="#modalGetAllMG" onclick="getAllMG()">Memoria gráfica</a>
            </div>
          </div>

      </div>

        <div class="row">
          <div id="output">A</div>
        </div>
        <div class="row">
          <a class="waves-effect waves-light btn green" onclick="crearPDF_img()">Crear PDF</a>
        </div>

        <div class="col s12 m12 l4" id ="agregar_memoria">

          <div class="card">
            <!--<div class="card-content">-->
                <div class="row">
                  <h2 class="title">Agregar Memoria gráfica</h2>
                  <form class="col s12" method="POST" name="form_add" enctype="multipart/form-data">

                    <div class="row">
                      <div class="input-field col s2 offset-s2">
                       <label for="fecha_documento">Fecha:</label>
                      </div>

                      <div class="input-field col s6">
                       <input  required id="fecha_documento" type="date" value="<?PHP  echo date('Y-m-d', strtotime('-1 hour')); ?>"
                       class="datepicker">

                      <!--<input type="text" value="Default time zone:: <?php echo date_default_timezone_get(); ?>">-->

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
                                <tr id="pointer">

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
                        <input  id="placas" type="text" placeholder="Placas"
                        onKeyUp = "convertir_aMayuscula(this.value, this.id)" maxlength="10" class="validate" required
                        >
                        <label for="first_name">Placas</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s2 offset-s2">
                       <label for="fecha_ingreso">Fecha de ingreso</label>
                      </div>

                      <div class="input-field col s6">
                       <input  required id="fecha_ingreso" type="date"  >
                     </div>

                    </div>

                   <div class="row">
                        <div class="input-field col s12">
                          <label for="first_name">Imagen</label>
                        </div>
                   </div>

                   <div class="row" id="campo_extra_add">

                      <div class="row">
                        <!--<div class="input-field col s12">
                           <input type="file" id="img_add_1" class="validate" required>
                           <input type="file" name="imagenes_add[]" class="validate" required>
                        </div>-->

                        <div class="file-field input-field col s12">
                          <div class="btn blue">
                            <span>Seleccione la imagen</span>
                            <input type="file" name="imagenes_add[]" id="imagenes_add_1" accept="image/*">
                          </div>

                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                          </div>
                        </div>

                      </div>
                   </div>

                    <div class="row">
                      <!--<div class="btn-floating blue ">-->
                        <a onclick="agregar_campoIMG_add()"
                           class="btn-floating blue">
                         <i class="material-icons">add</i>
                       </a>
                      <!--</div>-->
                    </div>

                    <div class="row"><div id="output"></div></div>

                    <!--<div class="row">
                      <a class="waves-effect btn green" onclick="subirImagenes()">Subir imágenes</a>

                    </div>-->

                    <div class="row">
                      <a class="waves-effect btn green" onclick="agregarMemoria_grafica()">Agregar</a>
                    </div>



                    <div class="row"></div>
                  </form>


                </div>
            <!--</div>-->
          </div>
        </div>

        <div class="col s12 m12 l4" id ="modificar_memoria">
          <div class="card">
              <div class="row" >
                  <h2 class="title">Modificar Memoria gráfica</h2>
                    <form class="col s12" action="javascript:buscarMemoria_grafica()" >
                      <div class="row">

                        <!-- Modal Trigger -->
                        <div class="row">

                          <div class="input-field col s6">
                            <input id="memoria_graficaBuscar" type="number" class="validate" placeholder="Codigo de memoria gráfica" required maxlength="20">
                            <label for="first_name">Codigo de memoria_gráfica</label>
                          </div>

                          <div class="col s6">
                            <a class="waves-effect waves-light
                            btn orange modal-triggerGetAllMG"
                            href="#modalGetAllMG" onclick="getAllMG()">Memoria gráfica</a>
                          </div>

                          <div class="input-field col s12">
                            <a class="waves-effect btn-flat waves-green" onclick="buscarMemoria_grafica()" >Buscar</a>
                          </div>
                        </div>

                        <!-- Modal Structure -->
                        <div id="modalGetAllMG" class="modal">
                          <div class="modal-content" id="modal-contentGetAllMG">
                            <h4>Memorias gráficas</h4>
                            <p>Elija una memoria gráfica:</p>

                            <table id="tableAllMG" class="display responsive-table"  cellspacing="0"  style="font-size:12x;">
                              <thead>
                                <tr id = "pointer">

                                <th>Código</th>
                                <th>Placas</th>

                                <th>Fecha ingreso</th>
                                <th>Fecha documento</th>
                                <th>Cantidad fotos</th>

                                </tr>
                              </thead>
                              <tbody id ="tbodyAllMG">

                              </tbody>
                            </table>

                          </div>
                          <div class="modal-footer">
                            <a href="#!" class=" modal-action
                            modal-close waves-effect waves-green btn-flat">Aceptar</a>
                          </div>
                        </div>

                        <div class="row">
                          <div class="input-field col s6">
                            <input  id="placasActualizar" onKeyUp ="javascript:convertir_aMayuscula(this.value, this.id)"
                            maxlength="10" placeholder="Placas" type="text" class="validate" required>
                            <label for="first_name">Placas</label>
                          </div>
                          <div class="col s6">
                            <a class="waves-effect waves-light
                            btn orange modal-triggerGetAllCars"
                            href="#modalGetAllCars" onclick="getAllCars()">Vehículo</a>
                          </div>
                        </div>


                        <!--<div class="input-field col s6">
                          <input  id="memoria_graficaBuscar" type="text" class="validate" maxlength="15" required
                          onKeyUp="convertir_aMayuscula(this.value, this.id)">
                          <label for="first_name">Código o placas</label>
                        </div>
                        <div class="input-field col s6">
                          <a class="waves-effect btn" onclick="buscarMemoria_grafica()" >Buscar</a>
                        </div>-->
                      </div>
                    </form>

                    <form name="form_mod" enctype="multipart/form-data">
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
                       <input  required id="fecha_ingresoActualizar" type="date"  >
                     </div>

                     <div class="input-field col s6">
                       <input  required id="fecha_documentoActualizar" type="date"  >
                     </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <label for="first_name">Imagen</label>
                      </div>
                    </div>

                    <div class="row" id="campo_extra_mod">

                      <div class="row">

                        <div class="file-field input-field col s12">
                          <div class="btn blue">
                            <span>Seleccione la imagen</span>
                            <input type="file" name="imagenes_mod[]" id="imagenes_mod_1"  accept="image/*">
                          </div>

                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                          </div>
                        </div>

                      </div>
                   </div>

                    <div class="row">
                      <!--<div class="btn-floating blue ">-->
                        <a onclick="agregar_campoIMG_mod()"
                           class="btn-floating blue waves-red">
                         <i class="material-icons">add</i>
                       </a>
                      <!--</div>-->
                    </div>

                       <a class="waves-effect btn green" onclick="modificarMemoria_grafica()" >Modificar documento</a>
                    </form>
                    <div class="row"></div>
               </div>
          </div>
        </div>

        <div class="col s12 m12 l4" id="eliminar_memoria">
          <div class="card">
              <div class="row" >
                  <h2 class="title">Eliminar Memoria gráfica</h2>

                    <div class="input-field col s6">
                       <input id="nombreliminar" type="text" class="validate" placeholder="Codigo de memoria gráfica" required>
                       <label for="icon_prefix">Cpdigo de memoria gráfica</label>
                     </div>

                    <!-- Modal Trigger -->
                        <div class="row">
                          <div class="col s6">
                            <a class="waves-effect waves-light
                            btn orange modal-triggerGetAllMG"
                            href="#modalGetAllMG" onclick="getAllMG()">Memoria gráfica</a>
                          </div>
                        </div>
               </div>

               <a class="waves-effect btn red" onclick="eliminarMemoria_grafica()">Eliminar</a>
               <div class="row"><p></p> </div>
          </div>
        </div>
      </div>

      <div class="row" id ="Tabla">
        <div class="col s12 m12 l12">
              <div class="card">
               <h2 class="title">Memorias gráficas</h2>
                <div class="card-content">
                  <table id="example" class="display responsive-table"  cellspacing="0"  style="font-size:12px;">
                    <thead>
                      <tr id="pointer">
                        <th>Codigo</th>
                        <th>Placas</th>
                        <th>Fecha documento</th>
                        <th>Fecha ingreso</th>
                        <th>Cantidad fotos</th>
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