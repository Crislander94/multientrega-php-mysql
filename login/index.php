<?php 
  require_once 'validar-login.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="../assets/libs/bootstrap-4.6.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/personalizacion.css">
</head>
<body>
  <div id="contenido" class="contenido contenido_login">
    <div>
      <?php if(isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          El usuario no se encuentra en nuestros registros
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php
        unset($_SESSION['error']);
        endif; 
      ?>
      <div class="imgcontainer">
        <img src="../assets/img/empresa.jpg" width="200" height="200" alt="Avatar" class="avatar">
      </div>
      <h1>Iniciar sesión</h1>
    </div>
    <div>
      <form action="validar-usuario.php" method="POST" name="login_account_access" id="login_account_access">
          <input id="user" type="email" placeholder="Correo electrónico" name="email">
          <input id="pass" type="password" placeholder="Contraseña" name="password">
        <div class="rememberpsw">
          <label><input type="checkbox" name="remember_user"> Recordar usuario</label>
        </div>
        <div style="text-align: center;">
          <input class="btnSubmitLogin" id="btnSubmitLogin" type="submit" value="Acceder">
        </div>
      </form>
    </div>
      <div class="forgetpsw">
        <span><a href="#">¿Olvidaste usuario o contraseña?</a></span>
      </div>
      <hr class="separator">
  </div>
  <footer class="footer mt-auto py-3" style="text-align: center;">
    <div class="container">
      <span class="text-muted">Derecho reservados &copy; 2021</span>
    </div>
  </footer>
  <script src="../assets/libs/jquery/jquery.min.js"></script>
  <script src="../assets/libs/popper/popper.min.js"></script>
  <script src="../assets/libs/bootstrap-4.6.0-dist/js/bootstrap.js"></script>
  <script src="../assets/libs/sweetAlert2/sweetalert2.all.min.js"></script>
  <script src="js/validaciones_login.js"></script>
</body>
</html>