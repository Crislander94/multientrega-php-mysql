<div class="contenido">
                       <!-- Alertas -->
    <!-- ================================================= -->
    <?php if(isset($_SESSION['success_approve'])) : ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          El producto fue aprobado con éxito.
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
          El producto fue cancelado con éxito.
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
          El producto no pudo ser aprobado ocurrio un error en el servidor.
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
          El producto no pudo ser cancelado ocurrio un error en el servidor.
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
        <div class="py-4 d-flex justify-content-between align-items-center card-header">
            <p class="mb-0" style="text-shadow: 0 0 10px rgba(0,0,0,.7); font-weight:bold;">Observa como van tus ingresos.</p>
            <select name="tipo" id="tipo" class="custom_select_reportes">
                <option value="">Filtra para más detalles...</option>
                <option value="cliente">Clientes</option>
                <option value="repartidor">Repartidor</option>
                <option value="empresa">Empresa</option>
                <option value="producto">Producto</option>
                <option value="categoria">Categoria</option>
            </select>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-dark">
            <thead id="cabecera">
                <tr>
                    <th>#</th>
                    <th>Nombres</th>
                    <th>Precio</th>
                    <th>Fecha Creación</th>
                </tr>
            </thead>
            <tbody id="myResponseReports"></tbody>
        </table>
    </div>
</div>

<script src="assets/js/list-reporte.js"></script>
<?php include_once 'partials/footer.php' ?>