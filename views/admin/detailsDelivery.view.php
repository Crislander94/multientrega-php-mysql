
<div class="contenido">
                    <!-- Alertas -->
    <!-- ================================================= -->
    <?php if(isset($_SESSION['empty'])) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          Verificar que las credenciales del repartidor estén correctamente enviadas al servidor.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php
        unset($_SESSION['empty']);
        endif; 
    ?>
    <!-- ================================================= -->
    <h2 class="title_details">Repartidor: <?php echo $nombre ?></h2>
    <form id="form1" method="POST">
        <div class="row">
            <div class="container_thumb_center mb-4 col-12 d-flex justify-content-center">
                <div class="thumb">
                    <img class="img_thumb" src="assets/img/admin_delivery.svg" alt="#Administracion Repartidor">
                </div>
            </div>
            <div class="col-md-6 col-12 mb-4">
                <label for="" class="">RUC:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-id-badge"></i></span>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $identificacion ?>" disabled aria-label="Username" aria-describedby="basic-addon1">
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
                <label for="" class="">Medio de transporte:</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" disabled  value="<?php echo $medio_transporte ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
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
                <?php if($identificacion === ''): ?>
                    <a href="<?php echo RUTA?>admin.php?c=admin&a=renderAdminDelivery" class="btn btn-info">Regresar</a>
                <?php else: ?>
                    <a href="<?php echo RUTA?>admin.php?c=admin&a=approveDelivery&id=<?php echo $id?>&cod_usuario=<?php echo $cod_usuario?>" class="btn btn-success">Aprobar Repartidor</a>
                    <a href="<?php echo RUTA?>admin.php?c=admin&a=disclaimerDelivery&id=<?php echo $id?>&cod_usuario=<?php echo $cod_usuario?>" class="btn btn-danger ml-2">Cancelar Repartidor</a>
                <?php endif; ?>
            </div>
        </div>
    </form>
</div>


<?php include 'partials/footer.php' ?>
