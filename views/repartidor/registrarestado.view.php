<div class="contenido">
                <!-- Alertas -->
    <!-- ================================================= -->
    <?php if(isset($_SESSION['empty'])) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          Verificar que las credenciales del cliente estén correctamente enviadas al servidor.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php
        unset($_SESSION['empty']);
        endif;
    ?>
    <h2 class="subtitle_details" class="mb-4">Verificando pedido</h2>
    <div class="container d-flex justify-content-center">
        <form action="repartidor.php?c=repartidor&a=activePedido&id=<?php echo $cod_pedido?>" method="POST" style="background:#f2f2f2; box-shadow: 0px 0px 10px rgba(0,0,0,.7)" class="p-4 row">
            <div class="form-group col-12 d-flex justify-content-center">
                <label style="width:100%" for="cliente">Cliente:</label>
                <input  style="width:100%" type="text" value="<?php echo $nombre_cliente ?>" disabled>
            </div>
            <div class="form-group col-12 d-flex justify-content-center">
                <label style="width:100%" for="cliente">Producto:</label>
                <input style="width:100%" type="text" value="<?php echo $nombre_producto ?>" disabled>
            </div>
            <div class="form-group col-12 d-flex justify-content-center">
                <label style="width:100%" for="cliente">Precio:</label>
                <input style="width:100%" type="text" value="<?php echo $precio ?>" disabled>
            </div>
            <div class="form-group col-12 d-flex justify-content-center">
                <label style="width:100%" for="cliente">Ganancia:</label>
                <input style="width:100%" type="text" value="<?php echo $ganancia_repartidor ?>" disabled>
            </div>
            <div class="form-group col-12 d-flex justify-content-center">
                <input type="submit" class="btn btn-success mr-3" value="Aceptar Pedido">
                <a href="repartidor.php?c=repartidor&a=renderSelectedPedido" type="button" class="btn btn-info" >Regresar</a>
            </div>
        </form>
    </div>
</div>