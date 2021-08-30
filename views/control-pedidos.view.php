<div class="contenido contenido_table">
    <h2 class="text-center">Control de pedidos</h2>
    <div class="card">
        <div class="card-header">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                <div class="d-flex justify-content-between">
                    <select name="busqueda_filtro" id="busqueda_filtro">
                        <option value="0" <?php if(!strcmp('0', $seleccion)){echo 'selected';} ?>>Todos</option>
                        <option value="1" <?php if(!strcmp('1', $seleccion)){echo 'selected';} ?>>Completados</option>
                        <option value="2" <?php if(!strcmp('2', $seleccion)){echo 'selected';} ?>>Cancelados</option>
                    </select>
                    <input type="hidden" name="titulo">
                    <button type="submit" class="btn btn-info">Buscar <i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr style="left: 0px;">
                    <th><span style="width: 40px;">#</th>
                    <th><span style="width: 200px;">Nombre Producto</span></th>
                    <th><span style="width: 200px;">Cliente</span></th>
                    <?php if($seleccion === '1'): ?>
                    <th><span style="width: 100px;">Fecha Envio</span></th>
                    <?php endif; ?>
                    <?php if($seleccion === '2'): ?>
                    <th><span style="width: 100px;">Fecha Cancelacion</span></th>
                    <?php endif; ?>
                    <th><span style="width: 88px;">Valor</span></th>
                    <th><span style="width: 88px;">Valor Neto</span></th>
                    <th><span style="width: 88px;">Ganancia Web</span></th>
                    <?php if($seleccion === '2'): ?>
                    <th><span style="width: 130px;">Motivo Cancelacion</span></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <?php if(count($result) === 0) : ?>
                <tbody>
                    <tr>
                        <td colspan="8"><center><span>No se han encontrado resultados..</span></center></td>
                    </tr>
                </tbody>
            <?php else : ?>
                <tbody>
                    <?php foreach($result as $key => $control) :?>
                        <tr>
                            <td class="datatable-cell-sorted datatable-cell-left datatable-cell" data-field="RecordID" aria-label="1">
                                <span style="width: 40px;"><span class="font-weight-bolder"><?php echo ($key +1) ?></span></span>
                            </td>
                            <td data-field="ShipDate" aria-label="<?php echo $control["nom_producto"] ?>" class="datatable-cell"><span style="width: 144px;">
                                    <div class="font-weight-bolder text-primary mb-0">
                                        <?php echo $control["nom_producto"]?></div>
                                </span></td>
                            <td data-field="ShipDate" aria-label="64616-103" class="datatable-cell"><span style="width: 250px;">
                                    <div class="d-flex align-items-center">
                                    <div class="font-weight-bold text-muted"><?php echo $control['cliente'];?></div></div>
                            </span></td>
                            <?php if($seleccion === '1'): ?>
                            <td data-field="ShipDate" aria-label="64616-103" class="datatable-cell"><span style="width: 250px;">
                                <div class="d-flex align-items-center">
                                <div class="font-weight-bold text-muted"><?php echo $control['fecha_envio'];?></div></div>
                            </span></td>
                            <?php endif; ?>
                            <?php if($seleccion === '2'): ?>
                            <td data-field="ShipDate" aria-label="64616-103" class="datatable-cell text-center"><span style="width: 250px;">
                                <div class="d-flex align-items-center">
                                <div class="font-weight-bold text-center text-muted"><?php echo $control['fecha_cancelacion'] ?></div></div>
                            </span></td>
                            <?php endif; ?>
                            <td data-field="ShipDate" aria-label="64616-103" class="datatable-cell"><span style="width: 250px;">
                                <div class="d-flex align-items-center">
                                <div class="font-weight-bold text-muted">$<?php echo $control['valor'] ?></div></div>
                            </span></td>
                            <td data-field="ShipDate" aria-label="64616-103" class="datatable-cell"><span style="width: 250px;">
                                <div class="d-flex align-items-center">
                                <div class="font-weight-bold text-muted">$<?php echo $control['valor_neto'] ?></div></div>
                            </span></td>
                            <td data-field="ShipDate" aria-label="64616-103" class="datatable-cell"><span style="width: 250px;">
                                <div class="d-flex align-items-center">
                                <div class="font-weight-bold text-muted">$<?php echo $control['ganancia_web'] ?></div></div>
                            </span></td>
                            <?php if($seleccion === '2'): ?>
                            <td data-field="ShipDate" aria-label="64616-103" class="datatable-cell"><span style="width: 250px;">
                                <div class="d-flex align-items-center">
                                <div class="font-weight-bold text-muted"><?php echo $control['motivo_cancelacion'] ?></div></div>
                            </span></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            <?php endif; ?>
        </table>
    </div>
</div>


<script src="assets/js/render-control.js"></script>