<div class="contenido">
                        <!-- Alertas -->
    <!-- ================================================= -->
    <?php if(isset($_SESSION['success_approve'])) : ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          El pedido fue aprobado con éxito.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php
        unset($_SESSION['success_approve']);
        endif; 
    ?>
    <?php if(isset($_SESSION['success_disclaimer'])) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          El pedido fue cancelado con éxito.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php
        unset($_SESSION['success_disclaimer']);
        endif;
    ?>


    <?php if(isset($_SESSION['error_approve'])) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          El pedido no pudo ser aprobado ocurrio un error en el servidor.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php
        unset($_SESSION['error_disclaimer']);
        endif; 
    ?>
    <?php if(isset($_SESSION['error_disclaimer'])) : ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          El pedido no pudo ser cancelado ocurrio un error en el servidor.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <?php
        unset($_SESSION['error_disclaimer']);
        endif; 
    ?>
    <!-- ================================================= -->
    <div class="card">
        <div class=" d-flex justify-content-between align-items-center card-header">
            <p class="mb-0">Gestiona los pedidos</p>
            <a href="<?php echo RUTA.'admin.php?c=admin&a=renderAdminRequestDisclaimer'?>" class="btn btn-danger">Gestionar Peticiones de Cancelación.</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombres</th>
                    <th>Identificacion</th>
                    <th>Producto</th>
                    <th>Fecha Envio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($data["pedidos"]) === 0) :?>
                    <tr>
                        <td colspan="8" class="text-center py-4">
                            <div class="container_thumb_center d-flex justify-content-center mb-4">
                                <div class="thumb_lg">
                                    <img src="assets/img/not_found.svg" alt="#Not Found" class="img_thumb">
                                </div>
                            </div>
                            <span style="font-style:italic;">No se han encontrado pedidos con solicitudes pendientes</span>
                        </td>
                    </tr>
                <?php else : ?>
                    <?php foreach($data["pedidos"] as $key => $pedido){
                        $array_meses  = ["Enero", "Febero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre","Octubre", "Noviembre", "Diciembre"];
                        $fecha_final = explode(" ",$pedido["fecha_creacion"])[0];
                        $fecha_final = explode("-", $fecha_final)[2].'/'.$array_meses[(explode("-",$fecha_final)[1])-1]."/".explode("-", $fecha_final)[0];
                    ?>
                    <tr>
                        <td><?php echo ($key+1); ?></td>
                        <td><?php echo $pedido["nombre_cliente"] ?></td>
                        <td><?php echo $pedido["identificacion"] ?></td>
                        <td><?php echo $pedido["nom_producto"] ?></td>
                        <td style="color:#12121; font-weight:bold;"><?php echo $fecha_final; ?></td>
                        <td>
                            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                <a href="<?php echo RUTA.'admin.php?c=admin&a=getDetailsPedido&id='.$pedido['id']; ?>"  data-toggle="tooltip" data-placement="top" title="Revisar Pedido" id="modificar1">
                                    <button type="button" style="border-radius: 5px 0 0 5px;" class="btn btn-info">
                                        <i style="color:#fff; font-size:16px !important;" class="fas fa-eye"></i>
                                    </button>
                                </a>
                                <a href="<?php echo RUTA.'admin.php?c=admin&a=approvePedido&id='.$pedido['id']; ?>"  data-toggle="tooltip" data-placement="top" title="Aprobar Pedido" id="modificar1">
                                    <button type="button" style="border-radius: 0px !important;" class="btn btn-success">
                                        <i style="color:#fff; font-size:16px !important;" class="fas fa-check alt"></i>
                                    </button>
                                </a>
                                <a href="#" data-id="<?php echo $pedido["id"] ?>" onclick="showModalMotivos(this)"  data-toggle="tooltip" data-placement="top"  title="" data-original-title="Cancelación Pedido" id="modificar1">
                                    <button type="button" style="border-radius:0 5px 5px 0" class="btn btn-danger izquierdo" >
                                        <i style="color:#fff; font-size:16px !important;" class="fas fa-times alt"></i>
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
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
<?php include_once 'partials/footer.php' ?>
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
    })
</script>