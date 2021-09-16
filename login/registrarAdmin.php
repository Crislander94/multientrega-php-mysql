<?php 
  require_once 'validar-login.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../assets/libs/bootstrap-4.6.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/libs/bootstrap-select-1.13.1/css/bootstrap-select.css"/>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/personalizacion.css">
    <style>
        .login_account_access{
            overflow-x:hidden;
            overflow-y:auto;
            scrollbar-width: thin;
        }
    </style>
</head>
<body class="bg-light" style="margin-left: 0px !important;">
  <nav class="card p-2" style="border-bottom: 1px solid rgba(0,0,0,.1)">
    <a class="navbar-brand" style="color:#000;" href="#">MULTI-ENTREGA</a>
  </nav>
  <hr style="color:#000; opacity: .4">
  <?php if(isset($_SESSION['error_admin'])) : ?>
      <div class="alert alert-danger alert-dismissible fade show mx-auto mb-4 w-50" role="alert">
        Ocurrio un error al registrar al administrador.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <?php
    unset($_SESSION['error_admin']);
    endif; 
  ?>
  <section id="cabeza" class="text-white font-weigth-bold">
    <div class="row m-0">
        <div class="col-12 d-flex justify-content-center">
            <a href="index.php" class="btn btn-success">Volver Inicio de sesion</a>
        </div>
      <section class="form-login login_account_access">
        <center>
          <h5>Registro Administrador</h5>
        </center>
        <form action="validar-registroAdmin.php" method="POST" name="login_account_access" id="login_account_access" class="row">
            <div class="form-group col-12">
                <label for="user">Username:</label>
                <input id="username" class="controls" type="username" placeholder="usuario" name="username">
            </div>
            <div class="form-group col-12">
                <label for="user">Contraseña:</label>
                <input id="pass" class="controls" type="text" placeholder="contraseña" name="pass">
            </div>
            
            <div class="form-group col-12">
                <label for="correo">correo:</label>
                <input id="correo" class="controls" type="email" placeholder="correo electronico" name="correo">
            </div>
            <div class="col-12 d-flex"style="text-align: center;">
                <input class="w-100 btnSubmitLogin" id="btnSubmitLogin" type="submit"  value="Registrar"/>
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
  <script src="js/validaciones_registrarOtherUsers.js"></script>
  <script src="../assets/libs/bootstrap-select-1.13.1/js/bootstrap-select.js"></script>
</body>
</html>




