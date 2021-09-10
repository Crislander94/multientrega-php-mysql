
<div class="contenido">
                    <!-- Alertas -->
    <!-- ================================================= -->
    <?php if(isset($_SESSION['empty'])) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          Verificar que el codigo del pedido esté correctamente enviado al servidor.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php
        unset($_SESSION['empty']);
        endif; 
    ?>
    <!-- ================================================= -->
    <h2 class="title_details">Pedido: <?php echo $nombre_producto ?></h2>
    <form id="form1" method="POST">
        <div class="row">
            <div class="container_thumb_center mb-4 col-12 d-flex justify-content-center">
                <div class="thumb">
                    <img class="img_thumb" src="assets/img/admin_boxes.svg" alt="#Administracion Empresa">
                </div>
            </div>
            <div class="col-md-6 col-12 mb-4">
                <label for="" class="">Precio:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-tags"></i></span>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $precio ?>" disabled aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-6 col-12 mb-4">
                <label for="" class="">Ofertas:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-percent"></i></span>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $ofertas ?>" disabled aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-6 col-12 mb-4">
                <label for="" class="">Precio Final:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-tags"></i></span>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $precio_final ?>" disabled aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-6 col-12 mb-4">
                <label for="" class="">Categoria:</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" disabled  value="<?php echo $categoria ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="button-addon2"><i class="fab fa-battle-net"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h4 class="subtitle_details">Datos Cliente</h4>
            </div>
            <div class="col-md-6 col-12 mb-4">
                <label for="" class="">Identificacion del Cliente:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-id-badge"></i></span>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $identificacion_cliente ?>" disabled aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-6 col-12 mb-4">
                <label for="" class="">Correo Cliente:</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" disabled  value="<?php echo $correo_cliente ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="button-addon2"><i class="fas fa-envelope-open"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h4 class="subtitle_details">Datos Repartidor</h4>
            </div>
            <div class="col-md-6 col-12 mb-4">
                <label for="" class="">RUC del Repartidor:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-id-badge"></i></span>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $ruc_repartidor ?>" disabled aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-6 col-12 mb-4">
                <label for="" class="">Correo Repartidor:</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" disabled  value="<?php echo $correo_repartidor ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="button-addon2"><i class="fas fa-envelope-open"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center flex-wrap mb-4">
                <label for="" class="">Medio de transporte:</label>
                <div class="input-group d-flex justify-content-center mb-3">
                    <input type="text" class="form-control custom_input_single" disabled  value="<?php echo $medio_transporte ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="button-addon2"><i class="fas fa-route"></i></span>
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
            <div class="col-12 d-flex justify-content-center">
                <?php if($codigo_pedido === ''): ?>
                    <a href="<?php echo RUTA?>admin.php?c=admin&a=renderAdminPedidos" class="btn btn-info">Regresar</a>
                <?php else: ?>
                    <a href="<?php echo RUTA?>admin.php?c=admin&a=approvePedido&id=<?php echo $id?>" class="btn btn-success">Aprobar Pedido</a>
                    <a href="<?php echo RUTA?>admin.php?c=admin&a=disclaimerPedido&id=<?php echo $id?>" class="btn btn-danger ml-2">Cancelar Pedido</a>
                <?php endif; ?>
            </div>
        </div>
    </form>
</div>


<?php include 'partials/footer.php' ?>
