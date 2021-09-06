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
    $tipo_empresa = $result[0]['tipo_empresa'];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(
            isset($_POST['nom_empresa']) &&
            isset($_POST['ruc']) &&
            isset($_POST['correo']) &&
            isset($_POST['telefono']) &&
            isset($_POST['radio-stacked']) &&
            isset($_POST['direccion'])
        ){
            $xnom_empresa = $_POST['nom_empresa'];
            $xruc = $_POST['ruc'];
            $xcorreo = $_POST['correo'];
            $xtelefono = $_POST['telefono'];
            $xtipo = $_POST['radio-stacked'];
            $xdireccion = $_POST['direccion'];
            //Insertar Informacion de la empresa
            $query = "UPDATE empresa
                        set
                            nom_empresa = '$xnom_empresa',
                            ruc =  '$xruc',
                            correo =  '$xcorreo',
                            telefono =  '$xtelefono',
                            tipo =  '$xtipo',
                            direccion =  '$xdireccion',
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
    <h3 class="text-center">Modifica tu empresa</h3>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" id="form_modificar_registro" class="needs-validation" style="margin-bottom: 1rem;">
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
            <input type="text" class="form-control" id="direccion" placeholder="Registre su Direccion" name="direccion" value="<?php echo $direccion; ?>">
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
        <div id="btnGuardar" class="d-flex justify-content-center"><button type="submit" class="btn btn-info">Actualizar</button></div>
    </form> 
</div>
<script src="./assets/js/validacion-mod-empresa.js"></script>
<?php include_once 'partials/footer.php'; ?>