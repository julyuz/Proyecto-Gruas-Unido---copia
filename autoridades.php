<?php include('inc/header.php'); ?>
<script src="js/autoridad.js"></script>
<script src="js/funciones_generales.js"></script>

<meta chartset="UTF-8">
     <div class="row" id="row1_autoridades">

        <div class="col s12 m12 l4" id="agregar_autoridades">
          <div class="card">
            <!--<div class="card-content">-->
                <div class="row">
                  <h2 class="title">Agregar Autoridad</h2>
                  <form class="col s12" name ="form_add" enctype="multiport/form-data">

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="nombre" type="text" class="validate" required>
                        <label for="first_name">Nombre completo</label>
                      </div>
                    </div>

                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="jefe" type="text" class="validate" required>
                        <label for="first_name">Jefe</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="tel_jefe" type="number" class="validate" required>
                        <label for="first_name">Tel Jefe</label>
                      </div>
                    </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="puesto" type="text" class="validate" required>
                        <label for="first_name">Puesto</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="contacto1" type="text" class="validate" required>
                        <label for="first_name">Contacto 1</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="telcontacto1" type="number" class="validate" required>
                        <label for="first_name">Tel Contacto 1</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="contacto2" type="text" class="validate" required>
                        <label for="first_name">Contacto 2</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="telcontacto2" type="number" class="validate" required>
                        <label for="first_name">Tel Contacto 2</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="contacto3" type="text" class="validate" required>
                        <label for="first_name">Contacto 3</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="telcontacto3" type="number" class="validate" required>
                        <label for="first_name">Tel Contacto 3</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="teldependencia" type="number" class="validate" required>
                        <label for="first_name">Tel Dependencia</label>
                      </div>
                    </div>

                    <div class ="row">
                        <div class="file-field input-field col s12">
                          <div class="btn blue">
                            <span>Logo Dependencia</span>
                            <input type="file" name="logodependencia" id="logodependencia" class="validate" required>
                          </div>

                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                          </div>
                        </div>
                    </div>

                    <div class="row">
                      <a class="waves-effect btn green" onclick="subirImagen('form_add','logodependencia')">Subir imagen</a>
                    </div>

                    <div class="row">
                      <a class="waves-effect waves-teal btn-flat" onclick="agregarautoridades()">Agregar</a>
                    </div>
                  </form>

                </div>
            <!--</div>-->
          </div>
        </div>

        <div class="col s12 m12 l4" id="modificar_autoridades">
          <div class="card">
              <div class="row">
                  <h2 class="title">Modificar Autoridad</h2>
                    <form class="col s12" action="javascript:buscarAutoridad()">
                      <div class="row">
                        <div class="input-field col s6">
                          <input  id="autoridadBuscar" type="text" class="validate" maxlength="15" required>
                          <label for="first_name">Código de autoridad</label>
                        </div>
                        <div class="input-field col s6">
                        <a class="waves-effect btn" onclick="buscarAutoridad()" >Buscar</a>
                        </div>
                      </div>
                    </form>

                    <form name ="form_mod" enctype="multiport/form-data">
                      <div class="row">
                      <div class="input-field col s6">
                          <input disabled value="co" id="co" type="number" class="validate" placeholder="Codigo de autoridad" required maxlength="20">
                          <label for="first_name">Código de autoridad</label>
                        </div>
                        <div class="input-field col s12">
                          <input  id="nombreActualizar" type="text" class="validate" required placeholder="Nombre">
                          <label for="first_name">Nombre</label>
                        </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="jefeActualizar" type="text" class="validate" required placeholder="Jefe">
                        <label for="first_name">Jefe</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="teljActualizar" type="number" class="validate" required placeholder="Teléfono jefe">
                        <label for="first_name">Teléfono jefe</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="puestoActualizar" type="text" class="validate" required placeholder="Puesto">
                        <label for="first_name">Puesto</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="contacto1Actualizar" type="text" class="validate" required placeholder="Contacto 1">
                        <label for="first_name">Contacto 1</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="telcontacto1Actualizar" type="number" class="validate" required placeholder="Tel Contacto 1">
                        <label for="first_name">Tel Contacto 1</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="contacto2Actualizar" type="text" class="validate" required placeholder="Contacto 2">
                        <label for="first_name">Contacto 2</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="telcontacto2Actualizar" type="number" class="validate" required placeholder="Tel Contacto 2">
                        <label for="first_name">Tel Contacto 2</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="contacto3Actualizar" type="text" class="validate" required placeholder="Contacto 3">
                        <label for="first_name">Contacto 3</label>
                      </div>
                      </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="telcontacto3Actualizar" type="number" class="validate" required placeholder="Tel Contacto 3">
                        <label for="first_name">Tel Contacto 3</label>
                      </div>
                      </div>

                      <div class="row">
                        <div class="input-field col s12">
                          <input  id="teldependenciaActualizar" type="number" class="validate" required placeholder="Tel Dependencia">
                          <label for="first_name">Tel Dependencia</label>
                        </div>
                      </div>

                    <div class ="row">
                        <div class="file-field input-field col s12">
                          <div class="btn blue">
                            <span>Logo Dependencia</span>
                            <input type="file" name="logodependenciaActualizar" id="logodependenciaActualizar" class="validate" required>
                          </div>

                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <a class="waves-effect btn green" onclick="subirImagen('form_mod','logodependenciaActualizar')">Subir imagen</a>
                      </div>

                      <div class="row">
                        <a class="waves-effect waves-teal btn-flat" onclick="modificarAutoridad()" >Modificar</a>
                      </div>
                    </form>
                    <div class="row"></div>
               </div>
          </div>
        </div>

        <div class="col s12 m12 l4" id="eliminar_autoridades">
          <div class="card">
              <div class="row">
                  <h2 class="title">Eliminar Autoridad</h2>

                     <div class="input-field col s12">
                       <input id="nombreliminar" type="text" class="validate" placeholder="nombre o codigo" required>
                       <label for="icon_prefix">Nombre o codigo</label>
                     </div>
               </div>
               <a class="waves-effect waves-teal btn-flat" onclick="eliminarautoridades()">Eliminar</a>
               <div class="row">
                 <p></p>
               </div>

          </div>
        </div>
      </div>

  <div class="row">
    <div class="col s12 m12 l12">
          <div class="card">
           <h2 class="title">Autoridades </h2>
            <div class="card-content">
              <table id="example" class="display responsive-table"  cellspacing="0"  style="font-size:12px;">
                <thead>
                  <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Jefe</th>
                    <th>Tel Jefe</th>
                    <th>Puesto</th>
                    <th>Contacto 1</th>
                    <th>Tel Contacto 1</th>
                    <th>Contacto 2</th>
                    <th>Tel Contacto 2</th>
                    <th>Contacto 3</th>
                    <th>Tel Contacto 3</th>
                    <th>Tel Dependencia</th>
                    <th>Logo Dependencia</th>
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