<?php include('inc/header.php'); ?>
<script src="js/remolque.js"></script>

<meta chartset="UTF-8">

    <div class="row">
      <div class="col s12 l4" id="agregar">
        <div class="card">
              <div class="row">
                <h2 class="title">Agregar Remolque</h2>
                <form class="col s12">
                  <div class="row">
                    <div class="input-field col s12">
                      <input  id="tipo" type="text" class="validate" required>
                      <label for="first_name">Tipo</label>
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
                      <input  id="capacidad" type="text" class="validate" required>
                      <label for="first_name">Capacidad</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12">
                      <input  id="serie" type="text" class="validate" required>
                      <label for="first_name">N. de serie</label>
                    </div>
                  </div>

                  <div class="row">
                    <div class="input-field col s12">
                      <input  id="tipo_carroceria" type="text" class="validate" required>
                      <label for="first_name">Tipo de carroceria</label>
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

                   <a class="waves-effect waves-teal btn-flat" onclick="agregarremolque()">Agregar</a>
                </form>

              </div>

        </div>
      </div>

      <div class="col s12 l4" id="modificar">
        <div class="card">
            <div class="row">
                <h2 class="title">Modificar Remolque</h2>
                  <form class="col s12" action="javascript:buscarvehiculo()">
                    <div class="row">
                      <div class="input-field col s6">
                        <input  id="vbuscar" type="text" class="validate"  required>
                        <label for="first_name">Id del remolque</label>
                      </div>
                      <div class="input-field col s6">
                        <a class="waves-effect waves-teal btn-flat" onclick="buscarremolque()" >Buscar</a>
                      </div>
                    </div>
                  </form>

                  <form>
                    <div class="row">
                      <div class="input-field col s6">
                        <input disabled value="id_remolques" id="id_remolques" type="text" class="validate" placeholder="Id del remolque" required>
                        <label for="first_name">Id remolque</label>
                      </div>
                    </div>

                    <div class="input-field col s12">
                        <input  id="tipoActualizar" type="text" class="validate" placeholder="Tipo" required >
                        <label for="first_name">Tipo</label>
                    </div>

                    <div class="input-field col s12">
                      <input  id="marcaActualizar" type="text" class="validate" placeholder="Marca" required>
                      <label for="first_name">Marca</label>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="modeloActualizar" type="text" class="validate" placeholder="Modelo" required>
                        <label for="first_name">Modelo</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="capacidadac" type="text" class="validate" placeholder="Capacidad" required>
                        <label for="first_name">Capacidad</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="serieac" type="text" class="validate" placeholder="N. de serie" required>
                        <label for="first_name">N. de serie</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="tipo_carrac" type="text" class="validate" placeholder="Tipo de carroceria" required>
                        <label for="first_name">Tipo de carroceria</label>
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

                    <a class="waves-effect waves-teal btn-flat" onclick="modificarremolque()" >Modificar</a>
                  </form>

            </div>
        </div>
      </div>

      <div class="col s12 l4" id="eliminar">
        <div class="card">
            <div class="row">
              <h2 class="title">Eliminar Remolque</h2>
              <div class="input-field col s12">
                <input id="noseliminar" type="number" class="validate" placeholder="id remolque" required>
                <label for="icon_prefix">id del remolque</label>
              </div>
            </div>
            <a class="waves-effect waves-teal btn-flat" onclick="eliminarremolque()">Eliminar</a>
            <div class="row"> <p></p> </div>
        </div>
      </div>

    </div> <!-- fin row -->

    <div class="row">
        <div class="col s12 m12 l12">
            <div class="card">
             <h2 class="title">Remolques </h2>
              <div class="card-content">
              <table id="example" class="display responsive-table"  cellspacing="0"  style="font-size:12x;">
                  <thead>
                    <tr>

                    <th>id remolque</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Capacidad</th>
                    <th>Serie</th>
                    <th>Tipo de carroceria</th>
                    <th>P.A.</th>
                    <th>A.C.</th>
                    <th>No. de siniestro</th>

                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
<?php include('inc/footer.php'); ?>