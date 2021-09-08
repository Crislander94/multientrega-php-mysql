<div class="contenido">
    <h2 class="title_details">Usuario: <?php echo $nombre ?></h2>
    <form id="form1" method="POST">
        <div class="row">
            <div class="container_thumb_center mb-4 col-12 d-flex justify-content-center">
                <div class="thumb">
                    <img class="img_thumb" src="assets/img/admin_profile.svg" alt="#Administracion usuario">
                </div>
            </div>
            <div class="col-md-6 col-12 mb-4">
                <label for="" class="">Identificacion:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-id-badge"></i></span>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $identificacion ?>" disabled aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-6 col-12 mb-4">
                <label for="" class="">Correo:</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" disabled  value="<?php echo $correo ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="button-addon2"><i class="fas fa-envelope-open"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12 mb-4">
                <label for="" class="">Telefono:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-square-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $telefono ?>" disabled aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-6 col-12 mb-4">
                <label for="" class="">Metodo de Pago:</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" disabled  value="<?php echo $metodo_pago ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text" id="button-addon2"><i class="fas fa-credit-card"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <a href="<?php echo RUTA?>admin.php?c=admin&a=approveClient&id=<?php echo $id?>" class="btn btn-success">Aprobar Cliente</a>
                <a href="<?php echo RUTA?>admin.php?c=admin&a=disclaimerClient&id=<?php echo $id?>" class="btn btn-danger ml-2">Cancelar Cliente</a>
            </div>
        </div>
    </form>
</div>



<script>
    const form1 = document.getElementById('form1');
    form1.addEventListener('submit' , (e) => {
        e.preventDefault();
    })
</script>