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
<body class="bg-light" style="margin-left: 0px !important;">
  <nav class="card p-2" style="border-bottom: 1px solid rgba(0,0,0,.1)">
    <a class="navbar-brand" style="color:#000;" href="#">MULTI-ENTREGA</a>
  </nav>
  <hr style="color:#000; opacity: .4">
  <?php if(isset($_SESSION['error'])) : ?>
      <div class="alert alert-danger alert-dismissible fade show mx-auto mb-4 w-50" role="alert">
        El usuario no se encuentra en nuestros registros
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <?php
    unset($_SESSION['error']);
    endif; 
  ?>
  <?php if(isset($_SESSION['success_repartidor'])) : ?>
      <div class="alert alert-success alert-dismissible fade show mx-auto mb-4 w-50" role="alert">
        Se ha registrado al repartidor exitosamente.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <?php
    unset($_SESSION['success_repartidor']);
    endif; 
  ?>
  <?php if(isset($_SESSION['repartidor_pending'])) : ?>
      <div class="alert alert-warning alert-dismissible fade show mx-auto mb-4 w-50" role="alert">
        El repartidor aun no ha sido aprobado espere mientras se procede al acceso.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <?php
    unset($_SESSION['repartidor_pending']);
    endif; 
  ?>
  <section id="cabeza" class="text-white font-weigth-bold">
    <div class="row m-0">
      <section class="form-login">
        <center>
          <h5> Login</h5>
        </center>
        <form action="validar-usuario.php" method="POST" name="login_account_access" id="login_account_access">
          <input id="user" class="controls" type="email" placeholder="Correo electrónico" name="email">
          <input id="pass" class="controls" type="password" placeholder="Contraseña" name="password">
          <div style="text-align: center;width:100%" >
            <input class="btnSubmitLogin" id="btnSubmitLogin" type="submit"  value="Acceder"/>
          </div>
          <div style="text-align: center; width:100%">
            <a class="btn btn-primary" style="text-decoration: none; width:100%; font-size:17px !important" href="registrar.php">Registrar Repartidor</a>
          </div>
        </form>
      </section>
    </div>
  </section>
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