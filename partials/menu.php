<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-left">
    <!-- Brand -->
    <a class="navbar-brand" href="#">APP WEB</a>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link nav-link-id" href="#">Inicio</a>
        </li>
        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
            Empresa
            </a>
            <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Registrar su información</a>
            <a class="dropdown-item" href="#">Registrar sus productos</a>
            <a class="dropdown-item" href="#">Control de los pedidos</a>
            </div>
        </li>
        <!-- Search -->
        <div id="nav-item-search">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                Buscador
            </a>
            <div class="dropdown-menu">
                <form style="width: 100%;" class="form-inline" action="/action_page.php">
                <input style="width: 100%;" class="form-control dropdown-item" type="search" placeholder="¿Que desea buscar?">
                </form>
            </div>
            </li>
        </div>
        </ul>
    </div>
</nav>
