<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-left" style="padding-right: 0px !important; padding-left: 0px !important">
    <!-- Brand -->
    <a class="navbar-brand" href="#" style="padding: 8px !important">Bienvenid@ <?php echo $_SESSION['username'] ?></a>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a style="font-weight: bold;" class="nav-link nav-link-id" href="<?php echo RUTA; ?>"><i class="fas fa-home"></i> Inicio</a>
            </li>
            <?php if(isset($_SESSION["tipo_usuario"])) : ?>
                <li class="nav-item dropdown">
                    <!-- Menu para Empresas -->
                    <?php if($_SESSION["tipo_usuario"] === 'E') : ?>
                        <p class="title_menu">Empresa</p>
                        <?php if(!isset($_SESSION["cod_empresa"])) : ?>
                            <a class="dropdown-item" href="<?php echo RUTA.'registrar-empresa.php'; ?>"><i class="fas fa-plus-square"></i>Registrar su informacion</a>
                        <?php endif;?>
                        <?php if(isset($_SESSION["cod_empresa"])):  ?>
                            <a class="dropdown-item" href="<?php echo RUTA.'mod-empresa.php'; ?>"><i class="fas fa-edit mr-1"></i> Modificar su informacion</a>
                            <?php if(isset($_SESSION['estado_empresa'])) : ?>
                                <?php if($_SESSION['estado_empresa'] !== 'P') : ?>
                                        <a class="dropdown-item" href="<?php echo RUTA.'producto.php'; ?>"><i class="fas fa-poll mr-1"></i> Productos</a>
                                        <a class="dropdown-item" href="<?php echo RUTA.'control-pedidos.php'; ?>"><i class="fas fa-bullhorn mr-1"></i> Control de los pedidos</a>
                                <?php endif;?>
                            <?php endif;?>
                        <?php endif;?>
                    <?php endif; ?>
                    <!-- Menu para Administración -->
                    <?php if($_SESSION["tipo_usuario"] === 'A'): ?>
                        <p class="title_menu">Administracion</p>
                        <a class="dropdown-item" href="<?php echo RUTA.'admin.php?c=admin&a=renderAdminClient'; ?>"><i class="fas fa-mug-hot mr-1"></i>Administrar Clientes</a>
                        <a class="dropdown-item" href="<?php echo RUTA.'admin.php?c=admin&a=renderAdminEnterprise'; ?>"><i class="fas fa-building mr-1"></i>Administrar Empresas</a>
                        <a class="dropdown-item" href="<?php echo RUTA.'admin.php?c=admin&a=renderAdminDelivery'; ?>"><i class="fas fa-truck mr-1"></i>Administrar Repartidores</a>
                        <a class="dropdown-item" href="<?php echo RUTA.'admin.php?c=admin&a=renderAdminPedidos'; ?>"><i class="fas fa-boxes mr-1"></i>Administrar Pedidos</a>
                        <a class="dropdown-item" href="<?php echo RUTA.'admin.php?c=admin&a=renderReportes'; ?>"><i class="fas fa-window-restore mr-1"></i>Reporeria</a>
                    <?php endif; ?>
                </li>
            <?php endif; ?>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo RUTA.'login/cerrar-sesion.php'; ?>"><i class="fas fa-sign-out-alt mr-1"></i>Cerrar sesión</a>
            </li>
        </ul>
    </div>
</nav>
