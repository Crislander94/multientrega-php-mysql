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
  <?php if(isset($_SESSION['error_repartidor'])) : ?>
      <div class="alert alert-danger alert-dismissible fade show mx-auto mb-4 w-50" role="alert">
        Ocurrio un error al registrar el repartidor.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <?php
    unset($_SESSION['error_repartidor']);
    endif; 
  ?>
  <section id="cabeza" class="text-white font-weigth-bold">
    <div class="row m-0">
        <div class="col-12 d-flex justify-content-center">
            <a href="index.php" class="btn btn-success">Volver Inicio de sesion</a>
        </div>
      <section class="form-login login_account_access">
        <center>
          <h5>Registro Repartidor</h5>
        </center>
        <form action="validar-registro.php" method="POST" name="login_account_access" id="login_account_access" class="row">
            <div class="form-group col-12">
                <label for="user">Username:</label>
                <input id="username" class="controls" type="username" placeholder="usuario" name="username">
            </div>
            <div class="form-group col-12">
                <label for="user">Contraseña:</label>
                <input id="pass" class="controls" type="text" placeholder="contraseña" name="pass">
            </div>
            <div class="form-group col-12">
                <label for="">Nombres:</label>
                <input id="nombres" class="controls" type="text" placeholder="Nombres" name="nombres">
            </div>
            <div class="form-group col-12">
                <label for="">RUC:</label>
                <input id="ruc" class="controls" type="text" placeholder="RUC" name="ruc">
            </div>
            <div class="form-group col-12">
                <label for="">Telefono:</label>
                <input id="telefono" class="controls" type="text" placeholder="Telefono" name="telefono">
            </div>
            <div class="form-group col-12">
                <label for="correo">correo:</label>
                <input id="correo" class="controls" type="email" placeholder="correo electronico" name="correo">
            </div>
            <div class="form-group col-12">
                <label for="medio_transporte">Medio Transporte:</label>
                <input id="medio_transporte" class="controls" type="text" placeholder="medio transporte" name="medio_transporte">
            </div>
            <div class="form-group col-12">
                <label for="diasAtencion">Días de trabajo:</label>
                <select class="form-control selectpicker" name="horarios[]" id="horarios" multiple>
                    <option value="1">Lunes</option>
                    <option value="2">Martes</option>
                    <option value="3">Miércoles</option>
                    <option value="4">Jueves</option>
                    <option value="5">Viernes</option>
                    <option value="6">Sábado</option>
                    <option value="7">Domingo</option>
                </select>
            </div>
            <div class="form-group col-12">
                <h5>Horarios de servicio</h5>
                <label for="desde_hora">Desde(horas)</label>
                <select class="select_custom_styles" name="desde_hora" id="desde_hora">
                    <?php 
                        for ($i=5; $i < 24; $i++) { 
                            echo "<option value=".($i+1).">".($i+1)."</option>";
                        }
                    ?>
                </select>
                <label for="hasta_hora">Desde(min)</label>
                <input type="number" class="number_custom_styles" style="width:23%" name="min_desde" id="min_desde" max="59" min="0" maxlength="2"
                        oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                >
            </div>
            <div class="form-group col-12">
                <label for="hasta_hora">Hasta(horas)</label>
                <select  class="select_custom_styles" name="hasta_hora"  id="hasta_hora">
                    <?php 
                        for ($i=6; $i < 24; $i++) { 
                            echo "<option value=".($i+1).">".($i+1)."</option>";
                        }
                    ?>
                </select>
                <label for="min_hasta">Hasta(min)</label>
                <input type="number" class="number_custom_styles" style="width:23%" name="min_hasta" id="min_hasta" max="59" min="0"  maxlength="2"
                        oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                >
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
  <script src="js/validaciones_registrar.js"></script>
  <script src="../assets/libs/bootstrap-select-1.13.1/js/bootstrap-select.js"></script>
</body>
</html>




