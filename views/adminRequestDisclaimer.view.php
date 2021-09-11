<div class="contenido">
                        <!-- Alertas -->
    <!-- ================================================= -->
    <?php if(isset($_SESSION['success_approve'])) : ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          La peticion fue aprobada con éxito.
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
          La peticion fue cancelada con éxito.
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
          La peticion no pudo ser aprobada ocurrio un error en el servidor.
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
          La peticion no pudo ser cancelada ocurrio un error en el servidor.
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
            <p class="mb-0">Gestionar Peticiones de Cancelación</p>
            <a href="<?php echo RUTA.'admin.php?c=admin&a=renderAdminPedidos'?>" class="btn btn-info">Gestionar Peticiones de Cancelación.</a>
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
                    <th>Fecha Cancelacion</th>
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
                            <span style="font-style:italic;">No se han encontrado pedidos con solicitudes de cancelación</span>
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
                                <a href="<?php echo RUTA.'admin.php?c=admin&a=getDetailsPedidoCancelar&id='.$pedido['id']; ?>"  data-toggle="tooltip" data-placement="top" title="Revisar Peticion" id="modificar1">
                                    <button type="button" style="border-radius: 5px 0 0 5px;" class="btn btn-info">
                                        <i style="color:#fff; font-size:16px !important;" class="fas fa-eye"></i>
                                    </button>
                                </a>
                                <a href="<?php echo RUTA.'admin.php?c=admin&a=approvePedidoCancelar&id='.$pedido['id']; ?>"  data-toggle="tooltip" data-placement="top" title="Aprobar Peticion" id="modificar1">
                                    <button type="button" style="border-radius: 0px !important;" class="btn btn-success">
                                        <i style="color:#fff; font-size:16px !important;" class="fas fa-check alt"></i>
                                    </button>
                                </a>
                                <a href="<?php echo RUTA.'admin.php?c=admin&a=disclaimerPedidoCancelar&id='.$pedido['id']; ?>" data-toggle="tooltip" data-placement="top"  title="" data-original-title="Cancelación Peticion" id="modificar1">
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
</div>
<?php include_once 'partials/footer.php' ?>