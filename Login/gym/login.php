<html >
  <head>
    <meta charset="UTF-8">
    <title>Iniciar Sesion</title>
    <script src="../js/jquery-1.10.2.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/log.js"></script>
    <script src="index.js"></script>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="container">
      <div class="profile profile--open">
          <button class="profile__avatar" id="toggleProfile">
           <img src="imj/user.png" alt="Avatar" /> 
          </button>
          <div class="profile__form">
            <div class="profile__fields">
              <div class="field">
                <input type="text" id="usuario" class="input" required pattern=.*\S.* />
                <label for="fieldUser" class="label">Usuario</label>
              </div>
              <div class="field">
                <input type="password" id="password" class="input" required pattern=.*\S.* />
                <label for="fieldPassword" class="label">Contraseña</label>
              </div>
              <div class="profile__footer">
                 <center>
                <input style="background-color:#497BE8;" type="button" value="Iniciar sesion" class="btn" onclick="Login()" ></center>
              </div>
            </div>
          </div>
      </div>
    </div>
    <script src="index.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  </body>
</html>