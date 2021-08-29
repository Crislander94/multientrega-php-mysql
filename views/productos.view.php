<?php
    include_once 'config/settings.php';
    require_once 'verificar.php';
    include_once 'partials/cabecera.php';
    include_once 'partials/menu.php';
?>
<div class="contenido contenido_table">
    <div class="card">
        <div class=" d-flex justify-content-between align-items-center card-header">
            <p class="mb-0">Mis productos</p>
            <button class="btn btn-success">Nuevo Producto</button>
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
            <!-- <tbody>
                <tr>
                    <td colspan="8"><center><span>No se han encontrado resultados..</span></center></td>
                </tr>
            </tbody> -->
            <tbody>
                <tr>
                    <td class="datatable-cell-sorted datatable-cell-left datatable-cell" data-field="RecordID" aria-label="1">
                        <span style="width: 40px;"><span class="font-weight-bolder"><?php echo '1' ?></span></span>
                    </td>
                    <td data-field="ShipDate" aria-label="<?php echo $nom_producto?>" class="datatable-cell"><span style="width: 144px;">
                            <div class="font-weight-bolder text-primary mb-0">
                                <?php echo 'produto1'?></div>
                        </span></td>
                    <td data-field="ShipDate" aria-label="64616-103" class="datatable-cell"><span style="width: 250px;">
                            <div class="d-flex align-items-center">
                            <div class="font-weight-bold text-muted"><?php echo 'vehiculos'?></div></div>
                        </span></td>
                    <td data-field="ShipDate" aria-label="64616-103" class="datatable-cell"><span style="width: 250px;">
                        <div class="d-flex align-items-center">
                        <div class="font-weight-bold text-muted"><?php echo '$precio'?></div></div>
                    </span></td>
                        
                    <td data-field="ShipDate" aria-label="64616-103" class="datatable-cell"><span style="width: 250px;">
                        <div class="d-flex align-items-center">
                        <div class="font-weight-bold text-muted"><?php echo '$disponibilidad' ?></div></div>
                    </span></td>
                    <td data-field="ShipDate" aria-label="64616-103" class="datatable-cell"><span style="width: 250px;">
                        <div class="d-flex align-items-center">
                        <div class="font-weight-bold text-muted">$ <?php echo '$oferta' ?></div></div>
                    </span></td>
                    <td data-field="CompanyName" aria-label="Casper-Kerluke" class="datatable-cell text-center">
                        <span class="badge badge-<?php echo 'success'?>"><?php echo '$estado'?></span>
                    </td>
                    <td>
                        <div class="btn-group mb-3" role="group" aria-label="Basic example">
                            <a data-toggle="tooltip" href="prev-factura.php?cod_factura=<?php echo $codigo_factura; ?>&ver=SI" data-placement="bottom" title="" data-original-title="Ver Registro" id="modificar1">
                                <button type="button"  style="padding: 4.7px 11px;border-radius: 5px 0 0 5px;" class="btn btn-primary derecho">
                                    <i style="color:#fff; font-size:16px !important;"class="fas fa-eye"></i>
                                </button>
                            </a>
                            <a data-toggle="tooltip" href="nueva-factura.php?codigo_factura=<?php echo $codigo_factura; ?>"  data-placement="bottom" title="" data-original-title="Modificar Registro" id="modificar1">
                                <button type="button" style="border-radius:0px !important;" class="btn btn-warning centro">
                                    <i style="color:#fff; font-size:16px !important;"class="fas fa-pencil-alt"></i>
                                </button>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="top" onClick="javascript:EliminarRegistro('elim-factura.php?codigo_factura=<?php echo $codigo_factura; ?>');" title="" data-original-title="Eliminar Registro" id="modificar1">
                                <button type="button" style="border-radius:0 5px 5px 0" class="btn btn-danger izquierdo" >
                                    <i style="color:#fff; font-size:16px !important;"class="fas fa-trash"></i>
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php include_once 'partials/footer.php' ?>