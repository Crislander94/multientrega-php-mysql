<?php
    include_once 'config/settings.php';
    require_once 'verificar.php';
    include_once 'partials/cabecera.php';
    include_once 'partials/menu.php';
    include_once 'db/conexion.php';
    if(isset($_SESSION["tipo_usuario"])){
        if($_SESSION["tipo_usuario"] === 'A') header('Location: admin.php');
        if($_SESSION["tipo_usuario"] === 'R') header('Location: repartidor.php');
        if($_SESSION["tipo_usuario"] === 'C') header('Location: cliente.php');
    } 
    if(isset($_SESSION["cod_empresa"])) header('Location: index.php');
    //Abrimos la conexion...
    $dbClass = new DBClass();
    $conexion = $dbClass->getconnection();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $array_days = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'];
        $strings_days = '';
        if(
            isset($_POST['nom_empresa']) &&
            isset($_POST['ruc']) &&
            isset($_POST['correo']) &&
            isset($_POST['telefono']) &&
            isset($_POST['radio-stacked']) &&
            isset($_POST['horarios']) &&
            isset($_POST['desde_hora']) &&
            isset($_POST['min_desde']) &&
            isset($_POST['hasta_hora']) &&
            isset($_POST['min_hasta']) &&
            isset($_POST['formaspago']) &&
            isset($_POST['strings_pagos']) &&
            isset($_POST['direccion']) &&
            isset($_POST['terminos_condiciones'])
        ){
            $nom_empresa = $_POST['nom_empresa'];
            $ruc = $_POST['ruc'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $tipo = $_POST['radio-stacked'];
            $horarios = $_POST['horarios'];
            $desde_hora = $_POST['desde_hora'];
            $direccion = $_POST['direccion'];
            $min_desde = $_POST['min_desde'];
            $hasta_hora = $_POST['hasta_hora'];
            $min_hasta = $_POST['min_hasta'];
            $strings_pagos = $_POST['strings_pagos'];
            $terminos_condiciones = $_POST['terminos_condiciones'];
            $formas_pago = $_POST['formaspago'];
            $hasta_hora = $_POST['hasta_hora'];
            $desde_hora = $_POST['desde_hora'];
            if(intval($desde_hora) > 12){
                $min_desde .= ' PM ';
            }else{
                $min_desde .= ' AM ';
            }
            if(intval($hasta_hora) > 12){
                $min_hasta .= ' PM ';
            }else{
                $min_hasta .= ' AM ';
            }
            $horario_final = $desde_hora.':'.$min_desde.' - '.$hasta_hora.':'.$min_hasta;
            foreach ($horarios as $key => $horario) {
                if($key === count($horarios) -1){
                    $strings_days.= $array_days[$horario-1];
                }else{
                    $strings_days.= $array_days[$horario-1].',';
                }
            }
            //Insertar Informacion de la empresa
            $query = "INSERT INTO empresa(nom_empresa,ruc,correo,telefono,direccion, formas_pago, tipo, created_by)
                      VALUES('$nom_empresa','$ruc', '$correo','$telefono', '$direccion', '$strings_pagos', '$tipo', '".$_SESSION['cod_usuario']."')";
            try{
                //Iniciamos la transaccion
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion->beginTransaction();
                //Ejecutamos el query
                $conexion->exec($query);
                //Obtenemos el ultimo elemento insertado....
                $ultimo_insert = "SELECT max(cod_empresa) as id from empresa";
                $statment = $conexion->prepare($ultimo_insert);
                $statment->execute();
                $xresult = $statment->fetchAll();
                $id = $xresult[0]['id'];
                $_SESSION['cod_empresa'] = $id;
                //Insertamos el horario de la empresa
                $xquery = "INSERT into horarios(dias, horas, cod_empresa, created_by)
                           VALUES('$strings_days','$horario_final', '$id', '".$_SESSION['cod_usuario']."')";
                $conexion->exec($xquery);

                //Actualizamos la empresa del usuario...
                $xyQuery = "Update users set cod_empresa = '$id' where id = '".$_SESSION['cod_usuario'].".'";
                $conexion->exec($xyQuery);
                $conexion->commit();
                $_SESSION['success'] = true;
                $_SESSION['estado_empresa'] = 'P';
                header('Location: index.php');
            }catch(Exception $e){
                echo $e->getMessage();
                $conexion->rollBack();
                $_SESSION['cod_empresa'] = NULL;
                $_SESSION['error'] = true;
                header('Location: registrar-empresa.php');
            }
        }
    }
?>
<div class="contenido contenido_main">
    <?php if(isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Ocurrio un error y no se pudo registrar a la empresa.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php
        unset($_SESSION['error']);
        endif; 
    ?>
    <h3 class="text-center">Registra tu empresa</h3>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" id="form_registrar_empresa" class="row needs-validation" style="margin-bottom: 1rem;">
        <div class="container_thumb_center mb-4 col-12 d-flex justify-content-center">
          <div class="thumb">
              <img class="img_thumb" src="<?php echo RUTA?>assets/img/admin_enterprise.svg" alt="#Ver Empresa">
          </div>
        </div>
        <div class="form-group col-12">
            <label for="nom_empresa">Nombre:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-archway"></i></span>
                </div>
                <input type="text" class="form-control" id="nom_empresa" placeholder="Registre nombre" name="nom_empresa">
            </div>
        </div>
        <div class="form-group col-12">
            <label for="ruc">RUC:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="far fa-id-badge"></i></span>
                </div>
                <input type="text" class="form-control" id="ruc" placeholder="Registre RUC" name="ruc">
            </div>
        </div>
        <div class="form-group col-12">
            <label for="direccion">Direccion:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-route"></i></span>
                </div>
                <input type="text" class="form-control" id="direccion" placeholder="Registre su Direccion" name="direccion">
            </div>
        </div>
        <div class="form-group col-12">
            <label for="correo">Correo:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope-open"></i></span>
                </div>
                <input type="email" class="form-control" id="correo" placeholder="Registre correo" name="correo">
            </div>
        </div>
        <div class="form-group col-12">
            <label for="telefono">Teléfono:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-square-alt"></i></span>
                </div>
                <input type="text" class="form-control" id="telefono" placeholder="Registre telefono" name="telefono">
            </div>
        </div>
        <div class="form-group col-12">
            <label>Tipo empresa:</label>
            <?php 
                $xquery = "SELECT * FROM tipo_empresa";
                $xstatment = $conexion->prepare($xquery);
                $xstatment->execute();
                $xresult = $xstatment->fetchAll();
                $checked ="";
                foreach ($xresult as $key => $forma_pago) {
                    $id = $forma_pago['id'];
                    $descripcion = $forma_pago['descripcion'];
                    echo "<div class='custom-control custom-radio'>";
                    if($key === count($xresult)-1) $checked = "checked";
                    echo "    <input type='radio' class='custom-control-input' id='customControlValidation".$id."' value='".$id."' name='radio-stacked'".$checked." >";
                    echo "    <label class='custom-control-label' for='customControlValidation".$id."'>".$descripcion."</label>";
                    echo "</div>";
                }
            ?>
        </div>
        <div class="form-group col-12">
            <label for="diasAtencion">Días de atención:</label>
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
            <h5>Horario atencion</h5>
            <label for="desde_hora">Desde(horas)</label>
            <select class="select_custom_styles" name="desde_hora" id="desde_hora">
                <?php 
                    for ($i=5; $i < 24; $i++) { 
                        echo "<option value=".($i+1).">".($i+1)."</option>";
                    }
                ?>
            </select>
            <label for="hasta_hora">Desde(min)</label>
            <input type="number" class="number_custom_styles" name="min_desde" id="min_desde" max="59" min="0" maxlength="2"
                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            >
        </div>
        <div class="form-group col-12">
            <label for="hasta_hora">Hasta(horas)</label>
            <select  class="select_custom_styles" name="hasta_hora" id="hasta_hora">
                <?php 
                    for ($i=6; $i < 24; $i++) { 
                        echo "<option value=".($i+1).">".($i+1)."</option>";
                    }
                ?>
            </select>
            <label for="min_hasta">Hasta(min)</label>
            <input type="number" class="number_custom_styles" name="min_hasta" id="min_hasta" max="59" min="0"  maxlength="2"
                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            >
        </div>
        <div class="form-group col-12">
            <label for="formaspago">Formas de pago admitidas:</label>
            <select class="form-control selectpicker" name="formaspago[]" id="formaspago" multiple>
                <?php 
                    $xquery = "SELECT * FROM formas_pago";
                    $xstatment = $conexion->prepare($xquery);
                    $xstatment->execute();
                    $xresult = $xstatment->fetchAll();
                    foreach ($xresult as $key => $forma_pago) {
                        $id = $forma_pago['id'];
                        $descripcion = $forma_pago['descripcion'];
                        echo "<option value=".$id.">".$descripcion."</option>";
                    }
                ?>
            </select>
            <input  type='hidden' id='strings_pagos' name='strings_pagos'/>
        </div>
        <div class="form-group col-12">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="terminos_condiciones" id="terminos_condiciones" > ¿Está de acuerdo con los términos y condiciones?
                </label>
            </div>
        </div>
        <div class="col-12 d-flex justify-content-center" id="btnGuardar"><button type="submit" class="btn btn-primary">Guardar</button></div>
    </form> 
</div>
<script src="./assets/js/datos-empresa.js"></script>
<?php include_once 'partials/footer.php'; ?>
