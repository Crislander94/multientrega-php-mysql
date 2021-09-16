<script> const cod_usuario = <?php echo $_SESSION["cod_usuario"]; ?></script>
<div class="contenido contenido_table">
    <h2 class="text-center">Reporte de tus pedidos</h2>
    <div class="card">
        <div class="card-header">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                <div class="d-flex justify-content-between">
                    <select class="custom_select_reportes" name="busqueda_filtro" id="busqueda_filtro">
                        <option value="">Todos</option>
                        <option value="completados">Completados</option>
                        <option value="cancelados">Cancelados</option>
                    </select>
                    <input type="hidden" name="titulo">
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-dark">
            <thead id="cabecera">
                <tr>
                    <th>#</th>
                    <th>Nombre Producto</th>
                    <th>Cliente</th>
                    <th>Fecha Creacion</th>
                    <th>Precio</th>
                    <th>Importe</th>
                    <th>Estado</th>
                    <th>Motivo Cancelacion</th>
                </tr>
            </thead>
            <tbody id="body_pedidos_control">
                <tr>
                    <td colspan="8" class="text-center py-4">
                        <div class="container_thumb_center d-flex justify-content-center mb-4">
                            <div class="thumb_lg">
                                <img src="assets/img/not_found.svg" alt="#Not Found" class="img_thumb">
                            </div>
                        </div>
                        <span style="font-style:italic;">No se han encontrado pedidos para el reporte</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<script src="assets/js/list-reportes-repartidor.js"></script>