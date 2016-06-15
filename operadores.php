<?php include('inc/header.php'); ?>
<script src="js/operadores.js"></script>
<meta chartset="UTF-8">
     <div class="row">

        <div class="col s12 m12 l4">
          <div class="card">
            <div class="card-content">
                <div class="row">
                  <h2 class="title">Agregar operador</h2>
                  <form class="col s12">

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="nombre" type="text" class="validate" required>
                        <label for="first_name">Nombre</label>
                      </div>
                    </div>

                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="licencia" type="text" class="validate" required>
                        <label for="first_name">Licencia</label>
                      </div>
                    </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="tipo" type="text" class="validate" required>
                        <label for="first_name">Tipo licencia </label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="numero" type="text" class="validate" required>
                        <label for="first_name">Número de licencia</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="vigencia" type="text" class="validate" required>
                        <label for="first_name">Vigencia de licencia</label>
                      </div>
                    </div>

                     <a class="waves-effect waves-teal btn-flat" onclick="agregarop()">Agregar</a>
                  </form>

                </div>
            </div>
          </div>
        </div>

      <div class="col s12 m12 l4">
        <div class="card">
            <div class="row">
                <h2 class="title">Modificar operador</h2>
                  <form class="col s12" action="javascript:buscarop()">
                  <div class="row">
                    <div class="input-field col s6">
                      <input  id="vbuscar" type="text" class="validate" maxlength="15" required>
                      <label for="first_name">id operador</label>
                    </div>
                    <div class="input-field col s6">
                    <a class="waves-effect waves-teal btn-flat" onclick="buscarop()" >Buscar</a>
                    </div>
                  </div>
                  </form>

                  <form>
                    <div class="row">
                    <div class="input-field col s6">
                        <input disabled value="idop" id="idop" type="text" class="validate" placeholder="id operador" required maxlength="20">
                        <label for="first_name">id operador</label>
                      </div>
                      <div class="input-field col s12">
                        <input  id="nombreac" type="text" class="validate" required placeholder="Nombre">
                        <label for="first_name">Nombre</label>
                      </div>
                      </div>

                    <div class="row">
                    <div class="input-field col s12">
                      <input  id="licac" type="text" class="validate" required placeholder="Licencia">
                      <label for="first_name">Licencia</label>
                    </div>
                    </div>

                    <div class="row">
                    <div class="input-field col s12">
                      <input  id="tl" type="text" class="validate" required placeholder="Tipo de licencia ">
                      <label for="first_name">Tipo de licencia</label>
                    </div>
                    </div>

                    <div class="row">
                    <div class="input-field col s12">
                      <input  id="nl" type="text" class="validate" required placeholder="Número de licencia">
                      <label for="first_name">Número de licencia</label>
                    </div>
                    </div>

                    <div class="row">
                    <div class="input-field col s12">
                      <input  id="vl" type="text" class="validate" required placeholder="Vigencia de licencia">
                      <label for="first_name">Vigencia de licencia</label>
                    </div>
                    </div>

                     <a class="waves-effect waves-teal btn-flat" onclick="modificarop()" >Modificar</a>
                  </form>
                  <div class="row"></div>
             </div>
        </div>
      </div>

        <div class="col s12 m12 l4" id="eliminar">
          <div class="card">
              <div class="row">
                  <h2 class="title">Eliminar operador</h2>

                     <div class="input-field col s12">
                       <input id="noseliminar" type="text" class="validate" placeholder="id operador" required>
                       <label for="icon_prefix">id operador</label>
                     </div>
               </div>
                 <a class="waves-effect waves-teal btn-flat" onclick="eliminarop()">Eliminar</a>
                 <div class="row">
                   <p></p>
                 </div>

          </div>
        </div>
      </div>



  <div class="row">
  <div class="col s12 m12 l12">
          <div class="card">
           <h2 class="title">Operadores </h2>
            <div class="card-content">
            <table id="example" class="display responsive-table"  cellspacing="0"  style="font-size:12px;">
                <thead>
                  <tr>
                  <th>id operador</th>
                  <th>Nombre</th>
                  <th>Licencia</th>
                  <th>Tipo licencia</th>
                  <th>No licencia</th>
                  <th>Vigencia</th>
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