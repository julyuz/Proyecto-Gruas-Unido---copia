<?php include('inc/header.php'); ?>
<script src="js/gruas.js"></script>
<script src="js/funciones_generales.js"></script>

<meta chartset="UTF-8">
    <div class="row">

        <div class="col s12 m12 l4">
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

                     <a class="waves-effect waves-teal btn-flat" onclick="agregargrua()">Agregar</a>
                  </form>

                </div>
            </div>
          </div>
        </div>

      <div class="col s12 m12 l4">
        <div class="card">
            <div class="row">
                <h2 class="title">Modificar Grúa</h2>
                  <form class="col s12" action="javascript:buscargrua()">
                  <div class="row">
                    <div class="input-field col s6">
                      <input  id="vbuscar" type="text" class="validate" maxlength="15" required
                      onKeyUp="convertir_aMayuscula(this.value, this.id)">
                      <label for="first_name">Placas</label>
                    </div>
                    <div class="input-field col s6">
                    <a class="waves-effect waves-teal btn-flat" onclick="buscargrua()" >Buscar</a>
                    </div>
                  </div>
                  </form>

                  <form>
                    <div class="row">
                    <div class="input-field col s6">
                        <input disabled value="placas" id="plcac" type="text" class="validate" placeholder="placas" required maxlength="20">
                        <label for="first_name">Placas</label>
                      </div>
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

                     <a class="waves-effect waves-teal btn-flat" onclick="modificargrua()" >Modificar</a>
                  </form>
                  <div class="row"></div>
             </div>
        </div>
      </div>

        <div class="col s12 m12 l4" id="eliminar">
          <div class="card">
              <div class="row">
                  <h2 class="title">Eliminar Grúa</h2>

                     <div class="input-field col s12">
                       <input id="noseliminar" type="text" class="validate" placeholder="placas" required
                       onKeyUp="convertir_aMayuscula(this.value, this.id)">
                       <label for="icon_prefix">Placas</label>
                     </div>
               </div>
                 <a class="waves-effect waves-teal btn-flat" onclick="eliminargrua()">Eliminar</a>
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