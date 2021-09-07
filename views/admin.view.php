<div class="contenido">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo RUTA ?>assets/img/admin_cliente.jpg" class="d-block w-100" alt="...">
                <div class="carousel_caption_custom carousel-caption d-none d-md-block">
                    <h5>Administración de clientes.</h5>
                    <p>En MULTIENGRA JEDAF compartimos una cultura de 
                    trabajo enfocada a satisfacer a nuestros clientes y consumidores.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo RUTA ?>assets/img/admin_delivery.jpg" class="d-block w-100" alt="...">
                <div class="carousel_caption_custom carousel-caption d-none d-md-block">
                    <h5 > Administración de repartidores</h5>
                    <p>Avanzamos continuamente para brindarles mejores opciones de entregas de sus productos ,
                        a precios justos y con una alta calidad de servicio.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php echo RUTA ?>assets/img/admin_empresa.jpg" class="d-block w-100" alt="...">
                <div class="carousel_caption_custom carousel-caption d-none d-md-block">
                    <h5> Administración de empresas</h5>
                    <p>Buscando siempre exceder las expectativas de los 
                        consumidores que atendemos cotidianamente y sin interrupción.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Después</span>
        </a>
    </div>
</div>
<?php include_once 'partials/footer.php' ?>