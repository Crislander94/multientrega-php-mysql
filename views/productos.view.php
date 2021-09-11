<div class="contenido contenido_table">
    <?php if(isset($_SESSION['error'])) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        No se pudo registrar al producto.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php
        unset($_SESSION['error']);
        endif; 
    ?>
    <?php if(isset($_SESSION['success'])) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        El registro del producto fue exitoso.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php
        unset($_SESSION['success']);
        endif; 
    ?>
    <?php if(isset($_SESSION['success_mod'])) : ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
        Se modifico el producto con exito.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php
        unset($_SESSION['success_mod']);
        endif; 
    ?>
    <?php if(isset($_SESSION['success_del'])) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        Se elimino el producto con exito.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    <?php
        unset($_SESSION['success_del']);
        endif; 
    ?>
    <div class="card">
        <div class=" d-flex justify-content-between align-items-center card-header">
            <p class="mb-0">Mis productos</p>
            <a href="<?php echo RUTA.'producto.php?c=producto&a=new'?>" class="btn btn-success">Nuevo Producto</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <tr style="left: 0px;">
                    <th><span style="width: 40px;">#</th>
                    <th><span style="width: 144px;">Nombre Producto</span></th>
                    <th><span style="width: 100px;">Categoria</span></th>
                    <th><span style="width: 100px;">Precio</span></th>
                    <th><span style="width: 100px;">Disponibilidad</span></th>
                    <th><span style="width: 100px;">Oferta</span></th>
                    <th><span style="width: 144px;">Estado</span></th>
                    <th><span style="width: 130px;">Acciones</span></th>
                </tr>
            </thead>
            <?php if(count($data["productos"]) === 0) : ?>
                <tbody>
                    <tr>
                        <td colspan="8" class="text-center py-4">
                            <div class="container_thumb_center d-flex justify-content-center mb-4">
                                <div class="thumb_lg">
                                    <img src="assets/img/not_found.svg" alt="#Not Found" class="img_thumb">
                                </div>
                            </div>
                            <span style="font-style:italic;">No se han encontrado productos</span>
                        </td>
                    </tr>
                </tbody>
            <?php else : ?>
                <tbody>
                    <?php foreach($data["productos"] as $key => $producto) :?>
                        <tr>
                            <td class="datatable-cell-sorted datatable-cell-left datatable-cell" data-field="RecordID" aria-label="1">
                                <span style="width: 40px;"><span class="font-weight-bolder"><?php echo ($key +1) ?></span></span>
                            </td>
                            <td data-field="ShipDate" aria-label="<?php echo $producto["nom_producto"] ?>" class="datatable-cell"><span style="width: 144px;">
                                    <div class="font-weight-bolder text-primary mb-0">
                                        <?php echo $producto['nom_producto']?></div>
                                </span></td>
                            <td data-field="ShipDate" aria-label="64616-103" class="datatable-cell"><span style="width: 250px;">
                                    <div class="d-flex align-items-center">
                                    <div class="font-weight-bold text-muted"><?php echo $producto['categoria'];?></div></div>
                            </span></td>
                            <td data-field="ShipDate" aria-label="64616-103" class="datatable-cell"><span style="width: 250px;">
                                <div class="d-flex align-items-center">
                                <div class="font-weight-bold text-muted">$<?php echo $producto['precio'];?></div></div>
                            </span></td>
                                
                            <td data-field="ShipDate" aria-label="64616-103" class="datatable-cell text-center"><span style="width: 250px;">
                                <div class="d-flex align-items-center">
                                <div class="font-weight-bold text-center text-muted"><?php echo $producto['disponibilidad'] ?></div></div>
                            </span></td>
                            <td data-field="ShipDate" aria-label="64616-103" class="datatable-cell"><span style="width: 250px;">
                                <div class="d-flex align-items-center">
                                <div class="font-weight-bold text-muted"><?php echo $producto['ofertas'] ?>%</div></div>
                            </span></td>
                            <td data-field="CompanyName" aria-label="Casper-Kerluke" class="datatable-cell text-center">
                                <span class="badge badge-<?php echo $producto['color_estado']?>"><?php echo $producto['estado']?></span>
                            </td>
                            <td>
                                <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                    <!-- <a data-toggle="tooltip" href="prev-factura.php?cod_factura=<?php //echo $producto['id']; ?>&ver=SI" data-placement="bottom" title="" data-original-title="Ver Registro" id="modificar1">
                                        <button type="button"  style="padding: 4.7px 11px;border-radius: 5px 0 0 5px;" class="btn btn-primary derecho">
                                            <i style="color:#fff; font-size:16px !important;"class="fas fa-eye"></i>
                                        </button>
                                    </a> -->
                                    <a data-toggle="tooltip" href="<?php echo RUTA.'producto.php?c=producto&a=modify&id='.$producto['id']; ?>"  data-placement="bottom" title="" data-original-title="Modificar Registro" id="modificar1">
                                        <button type="button" style="border-radius: 5px 0 0 5px;" class="btn btn-warning centro">
                                            <i style="color:#fff; font-size:16px !important;"class="fas fa-pencil-alt"></i>
                                        </button>
                                    </a>
                                    <a href="<?php echo RUTA.'producto.php?c=producto&a=delete&id='.$producto['id']; ?>" data-toggle="tooltip" data-placement="top"  title="" data-original-title="Eliminar Registro" id="modificar1">
                                        <button type="button" style="border-radius:0 5px 5px 0" class="btn btn-danger izquierdo" >
                                            <i style="color:#fff; font-size:16px !important;"class="fas fa-trash"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php endif; ?>
        </table>
    </div>
</div>
<?php include_once 'partials/footer.php' ?>