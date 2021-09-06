<?php
    include_once 'partials/cabecera.php';
    include_once 'partials/menu.php';

    if(isset($_GET['id'])){
      $query = "Select 
                  id,
                  categoria,
                  nom_producto, precio, disponibilidad, ofertas
                  from productos 
                  where 
                      cod_empresa = '".$cod_empresa."'
                  and
                      st_producto != 'X' 
                  and
                      id = '".$_GET['id']."'
                  ";
          $statment = $conexion->prepare($query);
          $statment->execute();
          $xresult = $statment->fetchAll();
          $nom_producto = $xresult[0]['nom_producto'];
          $id_producto = $xresult[0]['id'];
          $precio = $xresult[0]['precio'];
          $oferta = $xresult[0]['ofertas'];
          $disponibilidad = $xresult[0]['disponibilidad'];
          $xcategoria = $xresult[0]['categoria'];
    }
?>
<div class="contenido contenido_main">
    <form action="<?php echo RUTA.'producto.php?c=producto&a=update'?>" method="POST" class="needs-validation" id="registar_producto" style="margin-bottom: 1rem;">
      <h3 class="text-center">Registar nuevo producto</h3>
      <div class="form-group">
        <label for="tuscategorias">Categorias:</label>
        <select class="form-control selectpicker" id="tuscategorias" name="categoria">
          <option value="" disabled>Seleccione una</option>
          <?php 
            $xquery = "SELECT * FROM categorias";
            $xstatment = $conexion->prepare($xquery);
            $xstatment->execute();
            $xresult = $xstatment->fetchAll();
            $selected  = '';
            foreach ($xresult as $key => $categoria) {
                $selected  = '';
                $id = $categoria['id'];
                if(!strcmp($id, $xcategoria)){$selected = "selected";}
                $descripcion = $categoria['descripcion'];
                echo "<option value=".$id." $selected>".$descripcion."</option>";
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="nom_product">Nombre producto:</label>
        <input type="text" class="form-control" id="nom_product" placeholder="Nombre producto" name="nom_producto" value="<?php echo $nom_producto;?>">
      </div>
      <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="number" class="form-control" id="precio" placeholder="Registre precio" name="precio" value="<?php echo $precio;?>">
      </div>
      <div class="form-group">
        <label for="oferta">Crear Oferta:</label>
        <input type="number" class="form-control" id="oferta" placeholder="Nueva oferta" name="oferta" value="<?php echo $oferta;?>">
      </div>
      <div class="form-group">
        <label for="disponibilidad">Disponibilidad:</label>
        <input type="number" class="form-control" id="disponibilidad" placeholder="Números de existencias" value="<?php echo $disponibilidad;?>" name="disponibilidad">
      </div>
      <input type="hidden" name="id" value="<?php echo $id_producto;?>">
      <div id="btnGuardar" class="d-flex justify-content-center"><button type="submit" class="btn btn-info">Modificar</button></div>
    </form>
</div>

<script src="assets/js/validar_producto.js"></script>
<?php include_once 'partials/footer.php'; ?>

