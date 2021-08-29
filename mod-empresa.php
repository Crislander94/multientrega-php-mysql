<?php
    include_once 'config/settings.php';
    require_once 'verificar.php';
    include_once 'partials/cabecera.php';
    include_once 'partials/menu.php';
    include_once 'db/conexion.php';
    if(!isset($_SESSION["cod_empresa"])) header('Location: registrar-empresa.php');
    //Abrimos la conexion...
    require_once 'db/conexion.php';
    $dbClass = new DBClass();
    $conexion = $dbClass->getconnection();
    $sql = "Select 
            e.cod_empresa, e.nom_empresa, e.ruc, e.correo, e.telefono, e.direccion, e.formas_pago, e.tipo, 
            te.descripcion as tipo_empresa,
            h.dias, h.horas
            from empresa e
            inner join tipo_empresa te on e.tipo = te.id
            inner join horarios h on e.cod_empresa = h.cod_empresa
            where e.cod_empresa = '".$_SESSION['cod_empresa']."'";
    $statment = $conexion->prepare($sql);
    $statment->execute();
    $result = $statment->fetchAll();
    /* --------  DATOS EMPRESA -----------*/
    $nom_empresa = $result[0]['nom_empresa'];
    $tipo = $result[0]['tipo'];
    $ruc = $result[0]['ruc'];
    $correo = $result[0]['correo'];
    $telefono = $result[0]['telefono'];
    $direccion = $result[0]['direccion'];
    $formas_pago = $result[0]['formas_pago'];
    $tipo_empresa = $result[0]['tipo_empresa'];
    $dias = $result[0]['dias'];
    $horas = $result[0]['horas'];
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
            isset($_POST['direccion'])
        ){
            $xnom_empresa = $_POST['nom_empresa'];
            $xruc = $_POST['ruc'];
            $xcorreo = $_POST['correo'];
            $xtelefono = $_POST['telefono'];
            $xtipo = $_POST['radio-stacked'];
            $xhorarios = $_POST['horarios'];
            $xdesde_hora = $_POST['desde_hora'];
            $xdireccion = $_POST['direccion'];
            $xmin_desde = $_POST['min_desde'];
            $xhasta_hora = $_POST['hasta_hora'];
            $xmin_hasta = $_POST['min_hasta'];
            $xstrings_pagos = $_POST['strings_pagos'];
            $xformas_pago = $_POST['formaspago'];
            $xhasta_hora = $_POST['hasta_hora'];
            $xdesde_hora = $_POST['desde_hora'];
            if(intval($xdesde_hora) > 12){
                $xmin_desde .= ' PM ';
            }else{
                $xmin_desde .= ' AM ';
            }
            if(intval($xhasta_hora) > 12){
                $xmin_hasta .= ' PM ';
            }else{
                $xmin_hasta .= ' AM ';
            }
            $horario_final = $xdesde_hora.':'.$xmin_desde.' - '.$xhasta_hora.':'.$xmin_hasta;
            foreach ($xhorarios as $key => $xhorario) {
                if($key === count($xhorarios) -1){
                    $strings_days.= $array_days[$xhorario-1];
                }else{
                    $strings_days.= $array_days[$xhorario-1].',';
                }
            }
            //Insertar Informacion de la empresa
            $query = "UPDATE empresa
                        set
                            nom_empresa = '$xnom_empresa',
                            ruc =  '$xruc',
                            correo =  '$xcorreo',
                            telefono =  '$xtelefono',
                            tipo =  '$xtipo',
                            direccion =  '$xdireccion',
                            formas_pago =  '$xstrings_pagos',
                            edited_at = CURRENT_TIMESTAMP(),
                            edited_by = '".$_SESSION['cod_usuario']."'
                        where
                            cod_empresa = '".$_SESSION['cod_empresa']."'";
            try{
                //Iniciamos la transaccion
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion->beginTransaction();
                //Ejecutamos el query
                $conexion->exec($query);
                //Insertamos el horario de la empresa
                $xquery = "UPDATE horarios 
                            set 
                                dias = '$strings_days', 
                                horas= '$horario_final',
                                edited_at = CURRENT_TIMESTAMP(),
                                edited_by = '".$_SESSION['cod_usuario']."'
                             where
                                cod_empresa = '".$_SESSION['cod_empresa']."'";
                $conexion->exec($xquery);
                //Actualizamos la empresa del usuario...
                $conexion->commit();
                $_SESSION['success_mod'] = true;
                header('Location: index.php');
            }catch(Exception $e){
                echo $e->getMessage();
                $conexion->rollBack();
                $_SESSION['error'] = true;
                header('Location: mod-empresa.php');
            }
        }
    }
?>
<div class="contenido contenido_main">
    <?php if(isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Ocurrio un error y no se pudo modificar la empresa.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php
        unset($_SESSION['error']);
        endif; 
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" id="form_registrar_empresa" class="needs-validation" style="margin-bottom: 1rem;">
        <div class="form-group">
            <label for="nom_empresa">Nombre:</label>
            <input type="text" class="form-control" id="nom_empresa" placeholder="Registre nombre" value="<?php echo $nom_empresa?>" name="nom_empresa">
        </div>
        <div class="form-group">
            <label for="ruc">RUC:</label>
            <input type="text" class="form-control" id="ruc" placeholder="Registre RUC" value="<?php echo $ruc; ?>" name="ruc">
        </div>
        <div class="form-group">
            <label for="direccion">Direccion:</label>
            <input type="text" class="form-control" id="direccion" placeholder="Registre su Direccion" name="direccion">
        </div>
        <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" class="form-control" id="correo" placeholder="Registre correo" value="<?php echo $correo; ?>" name="correo">
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" placeholder="Registre telefono" value="<?php echo $telefono; ?>" name="telefono">
        </div>
        <div class="form-group">
            <label>Tipo empresa:</label>
            <?php 
                $xquery = "SELECT * FROM tipo_empresa";
                $xstatment = $conexion->prepare($xquery);
                $xstatment->execute();
                $xresult = $xstatment->fetchAll();
                $checked = '';
                foreach ($xresult as $key => $tipo_empresa) {
                    $id = $tipo_empresa['id'];
                    $descripcion = $tipo_empresa['descripcion'];
                    $checked = '';
                    if(strcmp($tipo, $id) === 0) {$checked = "checked";}
                    echo "<div class='custom-control custom-radio'>";
                    echo "    <input type='radio' class='custom-control-input' id='customControlValidation".$id."' value='".$id."' name='radio-stacked'".$checked." >";
                    echo "    <label class='custom-control-label' for='customControlValidation".$id."'>".$descripcion."</label>";
                    echo "</div>";
                }
            ?>
        </div>
        <div class="form-group">
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
        <div class="form-group">
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
            <input type="number" class="number_custom_styles" name="min_desde" id="min_desde" max="60" min="0" maxlength="2"
                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            >
        </div>
        <div class="form-group">
            <label for="hasta_hora">Hasta(horas)</label>
            <select  class="select_custom_styles" name="hasta_hora" id="hasta_hora">
                <?php 
                    for ($i=6; $i < 24; $i++) { 
                        echo "<option value=".($i+1).">".($i+1)."</option>";
                    }
                ?>
            </select>
            <label for="min_hasta">Hasta(min)</label>
            <input type="number" class="number_custom_styles" name="min_hasta" id="min_hasta" max="60" min="0"  maxlength="2"
                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            >
        </div>
        <div class="form-group">
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
        <div id="btnGuardar"><button type="submit" class="btn btn-primary">Guardar</button></div>
    </form> 
</div>

<?php include_once 'partials/footer.php'; ?>