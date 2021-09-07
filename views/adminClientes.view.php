<div class="contenido">
    <div class="card">
        <div class=" d-flex justify-content-between align-items-center card-header">
            <p class="mb-0">Gestiona a los clientes</p>
            <!-- <a href="<?php echo RUTA.'producto.php?c=producto&a=new'?>" class="btn btn-success">Nuevo Producto</a> -->
        </div>
    </div>


    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombres</th>
                    <th>Identifiacion</th>
                    <th>Fecha Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Cristhian Raúl</td>
                    <td>0943836478</td>
                    <td>28/Agosto/2021</td>
                    <td>
                        <div class="btn-group mb-3" role="group" aria-label="Basic example">
                            <a href="<?php echo RUTA.'producto.php?c=producto&a=modify&id='.$producto['id']; ?>"  data-toggle="tooltip" data-placement="top" title="Aprobar Cliente" id="modificar1">
                                <button type="button" style="border-radius: 5px 0 0 5px;" class="btn btn-success">
                                    <i style="color:#fff; font-size:16px !important;" class="fas fa-check alt"></i>
                                </button>
                            </a>
                            <a href="<?php echo RUTA.'producto.php?c=producto&a=delete&id='.$producto['id']; ?>" data-toggle="tooltip" data-placement="top"  title="" data-original-title="Eliminar Registro" id="modificar1">
                                <button type="button" style="border-radius:0 5px 5px 0" class="btn btn-danger izquierdo" >
                                    <i style="color:#fff; font-size:16px !important;" class="fas fa-times alt"></i>
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