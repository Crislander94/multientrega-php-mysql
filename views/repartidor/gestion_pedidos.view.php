<div class="contenido contenido_table">
    <?php if(isset($_SESSION['error_finish'])) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Ocurrio un error al actualizar el estado del pedido.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php
        unset($_SESSION['error_finish']);
        endif; 
    ?>
    <?php if(isset($_SESSION['success_finish'])) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Se actualizo el estado del pedido correctamente.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php
        unset($_SESSION['success_finish']);
        endif; 
    ?>
    <div class="card">
        <div class=" d-flex justify-content-between align-items-center card-header">
            <p class="mb-0">Pedidos</p>
            <a class="btn btn-danger" href="repartidor.php?c=repartidor&a=renderSelectedPedido">Gestiona tus pedidos</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <tr style="left: 0px;">
                    <th><span style="width: 40px;">#</th>
                    <th><span style="width: 144px;">Nombre Producto</span></th>
                    <th><span style="width: 100px;">Cliente</span></th>
                    <th><span style="width: 100px;">Precio</span></th>
                    <th><span style="width: 100px;">Ganancia</span></th>
                    <th><span style="width: 100px;">Fecha Creacion</span></th>
                    <th><span style="width: 130px;">Acciones</span></th>
                </tr>
            </thead>
            <?php if(count($data["pedidos"]) === 0) : ?>
                <tbody>
                    <tr>
                        <td colspan="8" class="text-center py-4">
                            <div class="container_thumb_center d-flex justify-content-center mb-4">
                                <div class="thumb_lg">
                                    <img src="assets/img/not_found.svg" alt="#Not Found" class="img_thumb">
                                </div>
                            </div>
                            <span style="font-style:italic;">No has aceptado ning??n pedido a??n.</span>
                        </td>
                    </tr>
                </tbody>
            <?php else : ?>
                <tbody>
                    <?php foreach($data["pedidos"] as $key => $pedido){
                        $array_meses  = ["Enero", "Febero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre","Octubre", "Noviembre", "Diciembre"];
                        $fecha_final = explode(" ",$pedido["fecha_creacion"])[0];
                        $fecha_final = explode("-", $fecha_final)[2].'/'.$array_meses[(explode("-",$fecha_final)[1])-1]."/".explode("-", $fecha_final)[0];
                    ?>
                    <tr>
                        <td><?php echo ($key+1); ?></td>
                        <td><?php echo $pedido["nom_producto"] ?></td>
                        <td><?php echo $pedido["nombres"] ?></td>
                        <td>$<?php echo $pedido["precio"] ?></td>
                        <td><?php echo $pedido["ganancia_repartidor"] ?></td>
                        <td style="color:#12121; font-weight:bold;"><?php echo $fecha_final; ?></td>
                        <td>
                            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                <?php if($status_repartidor) : ?>
                                <a href="<?php echo RUTA.'repartidor.php?c=repartidor&a=finishEntrega&id='.$pedido['id']; ?>"  data-toggle="tooltip" data-placement="top" title="Finalizar Entrega" id="modificar1">
                                    <button type="button" style="border-radius: 5px;" class="btn btn-primary">
                                        <i style="color:#fff; font-size:16px !important;" class="fas fa-check alt"></i>
                                    </button>
                                </a>
                                <?php else :?>
                                <a href="#"  data-toggle="tooltip" data-placement="top" title="No est??s disponible" id="modificar1">
                                    <button type="button" style="border-radius: 5px !important;" class="btn btn-info">
                                        <i style="color:#fff; font-size:16px !important;" class="fas fa-bath"></i>
                                    </button>
                                </a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php var_dump($status_repartidor)?>
<?php include_once 'partials/footer.php' ?>
<script>
    const status_repartidor = '<?php echo $status_repartidor?>';
    if(status_repartidor === ''){
        Swal.fire(
            'Horario Laboral Terminado','No puede hacer la gesti??n de seleccion. Ya acabo su turno', 'info')
    }
</script>