<?php include('inc/header.php'); ?>

<script src=""></script>
<meta chartset="UTF-8">
     <div class="row">

        <div class="col s12 m12 l4">
          <div class="card">
            <div class="card-content">
                <div class="row">
                  <h2 class="title">Ingrese los datos que se le piden</h2>
                  <form class="col s12">
                    
                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="fecha" type="date" class="validate" required>
                        <label for="first_name">fecha</label>
                      </div>
                     
                    </div>

                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="nomjefe" type="text" class="validate" required>
                        <label for="first_name">nombre del jefe en turno</label>
                      </div>
                    </div>

                      <div class="row">
                      <div class="input-field col s12">
                        <input  id="ordtrabajo" type="text" class="validate" required>
                        <label for="first_name">Orden de trabajo</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="nombre" type="text" class="validate" required>
                        <label for="first_name">nombre completo del cliente o id de cliente</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="placas" type="text" class="validate" required>
                        <label for="first_name">placas del vehiculo</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="origen" type="text" class="validate" required>
                        <label for="first_name">Origen del siniestro</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="destino" type="text" class="validate" required>
                        <label for="first_name">destino o lugar donde fue llevado </label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="operador" type="text" class="validate" required>
                        <label for="first_name">nombre o id del operador</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="horain" type="text" class="validate" required>
                        <label for="first_name">hora de la solicitud</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="tp" type="text" class="validate" required>
                        <label for="first_name">tiempo prometido</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="hcont" type="text" class="validate" required>
                        <label for="first_name">hora de contacto </label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="hter" type="text" class="validate" required>
                        <label for="first_name">hora de termino </label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="cont2" type="text" class="validate" required>
                        <label for="first_name">contacto 2</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="importe" type="text" class="validate" required>
                        <label for="first_name">importe</label>
                      </div>
                    </div>


                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="curp" type="text" class="validate" required>
                        <label for="first_name">Curp</label>
                      </div>
                    </div>

                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="rfc" type="text" class="validate" required>
                        <label for="first_name">RFC</label>
                      </div>
                    </div>


                     <a class="waves-effect waves-teal btn-flat" onclick="">Agregar</a>
                  </form>

                </div>
            </div>
          </div>
        </div>
<?php include('inc/footer.php'); ?>