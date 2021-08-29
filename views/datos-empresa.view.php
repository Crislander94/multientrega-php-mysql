<div class="contenido contenido_main">
    <?php if(isset($_SESSION['success'])) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          El registro de la empresa fue exitoso.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php
        unset($_SESSION['success']);
        endif; 
    ?>
    <?php if(isset($_SESSION['success_mod'])) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          La empresa se modifico con exito.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php
        unset($_SESSION['success']);
        endif; 
    ?>
    <h1 class="text-center">Informacion de la empresa</h1>
    <div>
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" disabled class="form-control" id="nombre" placeholder="Registre nombre" name="nombre" value="<?php echo $nom_empresa;?>">
      </div>
      <div class="form-group">
        <label for="ruc">RUC:</label>
        <input type="text" disabled class="form-control" id="ruc" placeholder="Registre RUC" name="ruc" value="<?php echo $ruc;?>">
      </div>
      <div class="form-group">
        <label for="correo">Correo:</label>
        <input type="email" disabled class="form-control" id="correo" placeholder="Registre correo" name="correo" value="<?php echo $correo;?>">
      </div>
      <div class="form-group">
        <label for="direccion">Correo:</label>
        <input type="text" disabled class="form-control" id="direccion" placeholder="Registre correo" name="direccion" value="<?php echo $direccion;?>">
      </div>
      <div class="form-group">
        <label for="telefono">Teléfono:</label>
        <input type="text" disabled class="form-control" id="telefono" placeholder="Registre telefono" name="telefono" value="<?php echo $telefono;?>">
      </div>
      <div class="form-group">
        <label for="tipo_empresa">Tipo de Empresa:</label>
        <input type="text" disabled class="form-control" id="tipo_empresa" placeholder="Registre correo" value="<?php echo $tipo_empresa;?>">
      </div>
      <div class="form-group">
        <label>Días de atención:</label>
        <p><?php echo $dias; ?>.</p>
        <label>Hora de atencion: </label>
        <p><?php echo $horas; ?></p>
      </div>
      <div class="form-group">
        <label>Formas de pago admitidas:</label>
        <ul>
          <?php 
            $formas_pago = explode(',' ,$formas_pago);
            
            foreach ($formas_pago as $key => $pago) {
              echo  "<li>$pago</li>";
            }
          ?>
        </ul>
        </select>
      </div>
    </div> 
</div>