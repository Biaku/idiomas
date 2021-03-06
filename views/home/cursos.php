<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="recursos/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Instituto de idomas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="nosotros.html">Acerca de nosotros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contacto.html">Contacto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.html">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.html">Registro</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Panel de control
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="alumnos/alumnos.html">Alumnos</a>
                    <a class="dropdown-item" href="profesores/profesores.html">Profesores</a>
                    <a class="dropdown-item" href="cursos.html">Cursos</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="form-group">
                    <label for="">Seleccionar idioma</label>
                    <select class="form-control">
                        <option value="0">Elige</option>
                        <option value="">Ingles</option>
                        <option value="">Aleman</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Seleccionar curso</label>
                    <select class="form-control">
                        <option value="">Ingles basico</option>
                        <option value="">Aleman basico</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Seleccionar grupo</label>
                    <select class="form-control">
                        <option value="">Ingles</option>
                        <option value="">Aleman</option>
                    </select>
                </div>
            </form>
            <table class="table">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="recursos/js/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="recursos/js/bootstrap.min.js"></script>
</body>
</html>