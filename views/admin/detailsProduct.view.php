<div class="contenido">
                    <!-- Alertas -->
    <!-- ================================================= -->
    <?php if(isset($_SESSION['empty'])) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          Verificar que las credenciales del producto estén correctamente enviadas al servidor.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php
        unset($_SESSION['empty']);
        endif; 
    ?>
    <!-- ================================================= -->
    <h2 class="title_details">Producto: <?php echo $nombre ?></h2>
    <form id="form1" method="POST">
        <div class="row">
            <div class="container_thumb_center mb-4 col-12 d-flex justify-content-center">
                <div class="thumb">
                    <img class="img_thumb" src="assets/img/admin_product.svg" alt="#Administracion Producto">
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
                <label for="" class="">Disponibilidad:</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" disabled  value="<?php echo $disponibilidad ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="button-addon2"><i class="fas fa-dolly-flatbed"></i></span>
                    </div>
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
                <label for="" class="">Categoria:</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" disabled  value="<?php echo $categoria ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="button-addon2"><i class="fab fa-battle-net"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <?php if($id === ''): ?>
                    <a href="<?php echo RUTA?>admin.php?c=admin&a=renderAdminPRoduct" class="btn btn-info">Regresar</a>
                <?php else: ?>
                    <a href="<?php echo RUTA?>admin.php?c=admin&a=approvePRoduct&id=<?php echo $id?>&cod_empresa=<?php echo $cod_empresa?>" class="btn btn-success">Aprobar Producto</a>
                    <a href="<?php echo RUTA?>admin.php?c=admin&a=disclaimerPRoduct&id=<?php echo $id?>&cod_empresa=<?php echo $cod_empresa?>" class="btn btn-danger ml-2">Cancelar Producto</a>
                <?php endif; ?>
            </div>
        </div>
    </form>
</div>
<?php include 'partials/footer.php' ?>
