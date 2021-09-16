<div class="contenido">
    <h2 class="title">Verificando pedido</h2>
    <form action="repartidor.php?c=repartidor&a=activePedido&id=<?php echo $id?>" method="POST" class="row">
        <div class="form-group">
            <label for="cliente">Cliente:</label>
            <input type="text" value="<?php echo $nombres ?>">
        </div>
        <div class="form-group">
            <label for="cliente">Cliente:</label>
            <input type="text" value="<?php echo $nombres ?>">
        </div>
        <div class="form-group">
            <label for="cliente">Cliente:</label>
            <input type="text" value="<?php echo $nombres ?>">
        </div>
        <div class="form-group">
            <label for="cliente">Cliente:</label>
            <input type="text" value="<?php echo $nombres ?>">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="aceptar_pedido">
            <input type="submit" class="btn btn-info" value="regresar">
        </div>
    </form>
</div>