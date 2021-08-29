<?php 
    require_once 'verificar.php';
    include_once '/partials/cabecera.php';
    include_once '/partials/menu.php';


    
?>
<div class="contenido contenido_main">
    <form action="/action_page.php" class="needs-validation" style="margin-bottom: 1rem;" novalidate>
      <div class="form-group">
        <label for="tuscategorias">Categorias:</label>
        <select class="form-control selectpicker" id="tuscategorias" required>
          <option value="" selected disabled>Seleccione una</option>
          <option value="1">Vehículos</option>
          <option value="2">Inmuebles o propiedades</option>
          <option value="3">Artículos deportivos</option>
          <option value="4">Artículos para el hogar</option>
          <option value="5">Electrónica</option>
          <option value="6">Instrumentos musicales</option>
          <option value="7">Productos para mascotas</option>
          <option value="8">Suministros de oficina</option>
        </select>
      </div>
      <div class="form-group">
        <label for="producto">Crear producto:</label>
        <input type="text" class="form-control" id="producto" placeholder="Nuevo producto" name="producto" required>
      </div>
      <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="number" class="form-control" id="precio" placeholder="Registre precio" name="precio" required>
      </div>
      <div class="form-group">
        <label for="oferta">Crear Oferta:</label>
        <input type="text" class="form-control" id="oferta" placeholder="Nueva oferta" name="oferta" required>
      </div>
      <div class="form-group">
        <label for="disponibilidad">Disponibilidad:</label>
        <input type="number" class="form-control" id="disponibilidad" placeholder="Números de existencias" name="disponibilidad" required>
      </div>
      <div id="btnGuardar"><button type="submit" class="btn btn-primary">Guardar</button></div>
    </form>
</div>

<?php include_once 'partials/footer'; ?>

