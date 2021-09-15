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
        unset($_SESSION['success_mod']);
        endif; 
    ?>
    <input type="hidden" id="estado_empresa" value="<?php echo $_SESSION['estado_empresa']?>">
    <h1 class="text-center">Informacion de la empresa</h1>
    <div class="row">
      <div class="container_thumb_center mb-4 col-12 d-flex justify-content-center">
          <div class="thumb">
              <img class="img_thumb" src="<?php echo RUTA?>assets/img/admin_enterprise1.svg" alt="#Ver Empresa">
          </div>
      </div>
      <div class="col-md-6 col-12 mb-4">
          <label for="" class="">Nombre Empresa:</label>
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-archway"></i></span>
              </div>
              <input type="text" class="form-control" value="<?php echo $nom_empresa ?>" disabled aria-label="Username" aria-describedby="basic-addon1">
          </div>
      </div>
      <div class="col-md-6 col-12 mb-4">
          <label for="" class="">RUC:</label>
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="far fa-id-badge"></i></span>
              </div>
              <input type="text" class="form-control" value="<?php echo $ruc ?>" disabled aria-label="Username" aria-describedby="basic-addon1">
          </div>
      </div>
      <div class="col-md-6 col-12 mb-4">
          <label for="" class="">Correo:</label>
          <div class="input-group mb-3">
              <input type="text" class="form-control" disabled  value="<?php echo $correo ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
              <div class="input-group-append">
                  <span class="input-group-text" id="button-addon2"><i class="fas fa-envelope-open"></i></span>
              </div>
          </div>
      </div>
      <div class="col-md-6 col-12 mb-4">
          <label for="" class="">Telefono:</label>
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-square-alt"></i></span>
              </div>
              <input type="text" class="form-control" value="<?php echo $telefono ?>" disabled aria-label="Username" aria-describedby="basic-addon1">
          </div>
      </div>
      <div class="col-md-6 col-12 mb-4">
          <label for="" class="">Direccion:</label>
          <div class="input-group mb-3">
              <input type="text" class="form-control" disabled  value="<?php echo $direccion ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
              <div class="input-group-append">
                  <span class="input-group-text" id="button-addon2"><i class="fas fa-route"></i></span>
              </div>
          </div>
      </div>
      <div class="col-md-6 col-12 mb-4">
          <label for="" class="">Tipo de Empresa:</label>
          <div class="input-group mb-3">
              <input type="text" class="form-control" disabled  value="<?php echo $tipo_empresa ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
              <div class="input-group-append">
                  <span class="input-group-text" id="button-addon2"><i class="fas fa-balance-scale-left"></i></span>
              </div>
          </div>
      </div>
      <div class="col-12">
          <h4 class="subtitle_details">Horario disponible</h4>
      </div>
      <div class="col-md-6 col-12 mb-4">
          <label for="" class="">Dias:</label>
          <div class="input-group">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-day"></i></span>
              </div>
              <input type="text" class="form-control" value="<?php echo $dias ?>" disabled aria-label="Username" aria-describedby="basic-addon1">
          </div>
      </div>
      <div class="col-md-6 col-12 mb-4">
          <label for="" class="">Horas:</label>
          <div class="input-group mb-3">
              <input type="text" class="form-control" disabled  value="<?php echo $horas ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
              <div class="input-group-append">
                  <span class="input-group-text" id="button-addon2"><i class="fas fa-hourglass-start"></i></span>
              </div>
          </div>
      </div>
      <div class="col-12">
          <h4 class="subtitle_details">Métodos-Pago disponible</h4>
      </div>
      <div class=" d-flex justify-content-around w-100 form-group">
          <?php 
            $formas_pago = explode(',' ,$formas_pago);
            foreach ($formas_pago as $key => $pago): ?>
              <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-file-invoice-dollar"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo $pago ?>" disabled aria-label="Username" aria-describedby="basic-addon1">
              </div>
          <?php endforeach;?>
      </div>
    </div>
</div>

<script src="./assets/js/status-empresa.js"></script>
