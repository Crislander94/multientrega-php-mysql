
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
            <div class="col-12 d-flex justify-content-center">
                <?php if($codigo_pedido === ''): ?>
                    <a href="<?php echo RUTA?>admin.php?c=admin&a=renderAdminPedidos" class="btn btn-info">Regresar</a>
                <?php else: ?>
                    <a href="<?php echo RUTA?>admin.php?c=admin&a=approvePedido&id=<?php echo $id?>" class="btn btn-success">Aprobar Pedido</a>
                    <a data-id="<?php echo $id ?>" onclick="showModalMotivos(this)" href="#" class="btn btn-danger ml-2">Cancelar Pedido</a>
                <?php endif; ?>
            </div>
        </div>
    </form>
    <!-- Modal Motivo Cancelacion -->
    <div class="modal fade" id="modal_cancelacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog custom_modal_dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Motivo Cancelacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo RUTA.'admin.php?c=admin&a=disclaimerPedido';?>" class="modal-body row p-4" id="formulario-motivos" method="POST">
                    <div class="input-group d-flex justify-content-center p-4 mb-3" style="width:100%">
                        <textArea type="text" class="form-control custom_input_single" style="max-width:70%; min-width:70%; min-height:150px; max-height:200px" name="motivo" id="motivo" aria-label="Recipient's username" aria-describedby="button-addon2" placeholder="Escriba su motivo aqui..."></textArea>
                        <div class="input-group-append">
                            <span class="input-group-text" id="button-addon2"><i class="fas fa-window-close"></i></span>
                        </div>
                        <input type="hidden" name="cod_pedido" id="cod_pedido">
                    </div>  
                    <div class="modal-footer d-flex justify-content-end mt-1" style="width:100%">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-info">Enviar Motivo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'partials/footer.php' ?>
<script>
    const formulario_motivos = document.getElementById('formulario-motivos');
    const showModalMotivos = (element) =>{
        $("#modal_cancelacion").modal('show');
        document.getElementById('cod_pedido').value = element.getAttribute('data-id');
    }
    formulario_motivos.addEventListener('submit', (e) =>{
        console.log('Holia')
        if(document.getElementById('motivo').value === ""){
            Swal.fire('Validate Form', 'No puede cancelar sin motivo', 'warning');
            e.preventDefault();
            return;
        }
        if(document.getElementById('motivo').value === ""){
            Swal.fire('Validate Form', 'Verifique su codigo de pedido', 'warning');
            e.preventDefault();
            return;
        }
    });
</script>