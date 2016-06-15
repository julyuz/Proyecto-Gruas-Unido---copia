<?php include('inc/header.php'); ?>
<script src="js/deposito.js"></script>
<meta chartset="UTF-8">
     <div class="row">

        <div class="col s12 m12 l4">
          <div class="card">
            <div class="card-content">
                <div class="row">
                  <h2 class="title">Agregar Deposito</h2>
                  <form class="col s12" >
                   <div class="row">
                      <div class="input-field col s12">
                        <input  id="codigo" type="number" class="validate" required>
                        <label for="first_name">codigo cliente</label>
                      </div>
                    </div>

                    
                   <div class="row">
                      <div class="input-field col s12">
                        <input  id="fechaInicial" type="date"  required>
                        <label for="first_name">Fecha inicial</label>
                      </div>
                     
                    </div>

                    <div class="row">
                      <div class="input-field col s12">
                        <input  id="fechaFinal" type="date" required>
                        <label for="first_name">Fecha Final</label>
                      </div>
                     
                    </div>

                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="dias_custodiado" type="text" class="validate" required>
                        <label for="first_name">dias custodiado</label>
                      </div>
                    </div>

                     <div class="row">
                      <div class="input-field col s12">
                        <input  id="cuotaxdia" type="text" class="validate" required>
                        <label for="first_name">cuota por dia</label>
                      </div>
                       <a class="waves-effect waves-teal btn-flat" onclick="total()">calcular total</a>
                    </div>
                      <div3 class="row">
                      <div class="input-field col s12">
                        <input  id="total" type="text" class="validate" placeholder="total" required>
                        <label for="first_name">total</label>
                      </div>
                      <a class="waves-effect waves-teal btn-flat" onclick="agregardeposito()">Agregar</a>
                    </div>

                   
                     
                     
                  </form>

                </div>

            </div>

          </div>
            <div class="row">
  <div class="col s12 m12 l12">
          <div class="card">
           <h2 class="title">Depositos realizados </h2>
            <div class="card-content">
            <table id="example" class="display"  cellspacing="0"  style="font-size:12px;">
                <thead>
                  <tr>
                  <th>id_deposito</th>
                  <th>codigo cliente</th>
                  <th>fecha inicial</th>
                  <th>fecha final</th>
                  <th>dias custodiado</th>
                  <th>cuota por dia</th>
                  <th>total</th>
                  </tr>
                </thead>
                <tbody  id="muestra">

                </tbody>
              </table> 
            </div>
          </div>
        </div>
     


      </div>
        </div>

        
      
     
        
      </div>




<?php include('inc/footer.php'); ?>