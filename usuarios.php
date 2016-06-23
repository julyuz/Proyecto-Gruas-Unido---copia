<?php
	include('inc/header.php');
	session_start();
	if(isset($_SESSION['Usuario']) and $_SESSION['Nivel']=='1'){

	}else{
		header("Location: index.php?Error=Acceso denegado");
	}
?>



<meta chartset="UTF-8">
    <div class="row" id="row1_usuarios">

     	<div class="col s12 m12 l4" id="agregar_usuarios">
          <div class="card">
            <!--<div class="card-content">-->
                <div class="row">
                  <h2 class="title">Agregar Usuario</h2>
                  <form class="col s12">

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="nombre" type="text" class="validate" required>
                        <label for="first_name">Nombre</label>
                      </div>
                    </div>

                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="usuario" type="text" class="validate" required>
                        <label for="first_name">Usuario</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="pass" type="password" placeholder="Contraseña" class="validate" required>
                        <label for="first_name">Contraseña</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="pass1" type="password" placeholder="Repita su Contraseña" class="validate" required>
                        <label for="first_name">Repita su Contraseña</label>
                      </div>
                    </div>

                    <div class="row">
                    	<div class="col s6">
      						      <input name = "nivel"  type = "radio" id="trabaj" />
      						      <label for = "trabaj">Trabajador</label>
                    	</div>
                    	<div class="col s6">
                    		<input class="with-gap" name="nivel" type="radio" id="admin" />
        						    <label for="admin" >Administrador</label>
                    	</div>
                    </div>

                    <div class="row">
                      <a class="waves-effect btn green" onclick="agregarUsuario()">Agregar</a>
                    </div>
                  </form>

                </div>
            <!--</div>-->
          </div>
      </div>

      <div class="col s12 m12 l4" id="modificar_usuarios">
          <div class="card">
            <!--<div class="card-content">-->
                <div class="row">
                  <h2 class="title">Modificar Usuario</h2>
                  <form class="col s12">

                    <div class="row">

                      <div class="col s12">
                        <!-- Modal Trigger -->
                          <div class="row">
                              <div class="input-field col s6">
                                <input  id="usuarioBuscar" placeholder="Código usuario" type="text" class="validate" required>
                                <label for="first_name">Código usuario</label>
                              </div>

                              <div class="col s6">
                                <a class="waves-effect waves-light
                                btn orange modal-triggerGetAllUsers"
                                href="#modalGetAllUsers" onclick="getAllUsers()">Usuario</a>
                              </div>
                          </div>

                        <!-- Modal Structure -->
                        <div id="modalGetAllUsers" class="modal">
                          <div class="modal-content" id="modal-contentGetAllUsers">
                            <h4>Usuarios</h4>
                            <p>Elija un usuario:</p>

                            <table id="tableAllUsers" class="display responsive-table"  cellspacing="0"  style="font-size:12x;">
                              <thead>
                                <tr id="pointer">

                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Contraseña</th>
                                <th>Nivel</th>

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

                      <a href="#!" class="btn-flat waves-effect waves-green" onclick="buscarUsuario()">buscar</a>

                      <div class="input-field col s12">
                        <input  id="nombreActualizar" placeholder="Nombre" type="text" class="validate" required>
                        <label for="first_name">Nombre</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input id="co" type="text" placeholder = "Código de usuario" class="validate" max-length="20" required>
                        <label for="first_name">Código de usuario</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="usuarioActualizar" placeholder ="Usuario" type="text" class="validate" required>
                        <label for="first_name">Usuario</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="passActualizar" type="password" placeholder="Contraseña" class="validate" required>
                        <label for="first_name">Contraseña</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="pass1Actualizar" type="password" placeholder="Repita su Contraseña" class="validate" required>
                        <label for="first_name">Repita su Contraseña</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col s6">
                        <input name = "nivelActualizar"  type = "radio" id="trabajActualizar" />
                        <label for = "trabajActualizar">Trabajador</label>
                      </div>
                      <div class="col s6">
                        <input class="with-gap" name="nivelActualizar" type="radio" id="adminActualizar" />
                        <label for="adminActualizar" >Administrador</label>
                      </div>
                    </div>

                    <div class="row">
                      <a class="waves-effect btn green" onclick="modificarUsuario()">Modificar</a>
                    </div>
                  </form>

                </div>
            <!--</div>-->
          </div>
      </div>

      <div class="col s12 m12 l4" id="eliminar_usuarios">
          <div class="card">
              <div class="row">
                  <h2 class="title">Eliminar Usuario</h2>

                    <div class="col s12">
                      <!-- Modal Trigger -->
                          <div class="row">
                              <div class="col s4 offset-s4">
                                <a class="waves-effect waves-light
                                btn orange modal-triggerGetAllUsers"
                                href="#modalGetAllUsers" onclick="getAllUsers()">Usuario</a>
                              </div>
                          </div>

                    </div>

                    <div class="input-field col s12">
                      <input id="codigoEliminar" type="text" class="validate" placeholder="Código usuario" required>
                      <label for="icon_prefix">Código usuario</label>
                    </div>
               </div>
               <a class="waves-effect btn red" onclick="eliminarUsuario()">Eliminar</a>
               <div class="row">
                 <p></p>
               </div>

          </div>
      </div>
    </div>

  <div class="row">
    <div class="col s12 m12 l12" id ="consultar_usuarios">
          <div class="card">
           <h2 class="title">Usuarios</h2>
            <div class="card-content">
              <table id="example" class="display responsive-table"  cellspacing="0"  style="font-size:12px;">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Nivel</th>
                  </tr>
                </thead>
                <tbody  id="muestra">

                </tbody>
              </table>
            </div> <!-- fin card-content -->
          </div> <!-- fin card -->
    </div>
  </div> <!-- fin row -->
	<script src="js/usuario_1.js"></script>
	<script src="js/funciones_generales.js"></script>
<?php include('inc/footer.php'); ?>