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
        <div class=" d-flex justify-content-between align-items-center card-header">
            <p class="mb-0">Gestiona los productos de las empresas.</p>
            <!-- Button trigger modal -->
            <button type="button" id="showEnterprise" class="btn btn-info" data-toggle="modal" data-target="#modal_enterprises">
                Mostrar Empresas Disponibles.
            </button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombres</th>
                    <th>Precio</th>
                    <th>Fecha Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="myProducts">
                <tr>
                    <td colspan="8" class="text-center py-4">
                        <div class="container_thumb_center d-flex justify-content-center mb-4">
                            <div class="thumb_lg">
                                <img src="assets/img/unsearch_enterprise.svg" alt="#Not Selected" class="img_thumb">
                            </div>
                        </div>
                        <span style="font-style:italic;">Seleccione una empresa para ver los resultados de sus productos</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Modal Con empresas disponibles -->
    <div class="modal fade" id="modal_enterprises" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog custom_modal_dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lista de empresas activas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row p-4">
                <select class="col-12 select_custom_styles p-2" name="myEnterprise" id="myEnterprises"></select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-info" id="selectedEnterprise">Seleccionar</button>
            </div>
            </div>
        </div>
    </div>

</div>

<script src="assets/js/list-enterprise.js"></script>
<?php include_once 'partials/footer.php' ?>