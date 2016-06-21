<?php include('inc/header.php');
  date_default_timezone_set('America/Mexico_City');
  session_start();
  if(isset($_SESSION['Usuario'])){

  }else{
    header("Location: iniciar.php?Error=Acceso denegado");
  }
?>


     <div class="row">
      <div class="col l3">
        <p></p>
      </div>
        <div class="col s12 m12 l6 ">
          <div class="card">
            <div class="card-content">
              <div class="row">
                <h2 class="title">Reseña gráfica</h2>
              </div>
                <form action="javascript:Buscar()">
                  <div class="row">


              </div>
            </div>
          </div>
          <div class="col l3">
            <p></p>
          </div>
        </div>

<?php include('inc/footer.php'); ?>
