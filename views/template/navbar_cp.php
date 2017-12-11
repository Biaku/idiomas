<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Instituto de idomas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
<!--                <a class="nav-link" href="../contacto.html">Contacto</a>-->
            </li>
        </ul>
        <span class="navbar-text">Bienvenido <?= $_SESSION['usuario']->nombre ?> </span>
        <a href="controllers/admin/logoutController.php" class="btn btn-danger ml-2">Salir</a>
    </div>
</nav>