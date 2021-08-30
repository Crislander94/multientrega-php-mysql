<?php
    include_once 'partials/cabecera.php';
    include_once 'partials/menu.php';
?>
<div class="contenido contenido_main">
    <form action="<?php echo RUTA.'producto.php?c=producto&a=save'?>" method="POST" class="needs-validation" id="registar_producto" style="margin-bottom: 1rem;">
      <h3 class="text-center">Registar nuevo producto</h3>
      <div class="form-group">
        <label for="tuscategorias">Categorias:</label>
        <select class="form-control selectpicker" id="tuscategorias" name="categoria">
          <option value="" selected disabled>Seleccione una</option>
          <?php 
            $xquery = "SELECT * FROM categorias";
            $xstatment = $conexion->prepare($xquery);
            $xstatment->execute();
            $xresult = $xstatment->fetchAll();
            foreach ($xresult as $key => $categoria) {
                $id = $categoria['id'];
                $descripcion = $categoria['descripcion'];
                echo "<option value=".$id.">".$descripcion."</option>";
            }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="nom_product">Nombre producto:</label>
        <input type="text" class="form-control" id="nom_product" placeholder="Nombre producto" name="nom_producto">
      </div>
      <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="number" class="form-control" id="precio" placeholder="Registre precio" name="precio">
      </div>
      <div class="form-group">
        <label for="oferta">Crear Oferta:</label>
        <input type="number" class="form-control" id="oferta" placeholder="Nueva oferta" name="oferta">
      </div>
      <div class="form-group">
        <label for="disponibilidad">Disponibilidad:</label>
        <input type="number" class="form-control" id="disponibilidad" placeholder="Números de existencias" name="disponibilidad">
      </div>
      <div id="btnGuardar"><button type="submit" class="btn btn-info">Guardar</button></div>
    </form>
</div>

<script src="assets/js/validar_producto.js"></script>
<?php include_once 'partials/footer.php'; ?>

