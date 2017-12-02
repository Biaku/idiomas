<?php session_start() ?>
<?php include $templates_header_cp ?>
<body ng-controller="alumnosController">
<?php include $templates_navbar_cp ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Alumno: <?= $_SESSION['usuario']->nombre ." ". $_SESSION['usuario']->apellidos ?></h1>
                    <div class="media">
                        <img class="d-flex mr-3"
                             src="https://image.freepik.com/iconos-gratis/nerd-perfil-masculino-avatar_318-68813.jpg"
                             alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0">Datos</h5>
                            <p><?= $_SESSION['usuario']->domicilio ?></p>
                            <p><?= $_SESSION['usuario']->telefono ?></p>
                            <p><?= $_SESSION['usuario']->correo ?></p>
                        </div>
                    </div>
                    <hr>
                    <table class="table table-bordered table-hover">
                        <thead class="thead-default">
                        <tr>
                            <th>Curso</th>
                            <th>Profesor</th>
                            <th>Porcentaje</th>
                            <th>Aula</th>
                            <th>Hora</th>
                            <th>Opcion</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="alumno in alumnos">
                            <td>{{ alumno.curso }}</td>
                            <td>{{ alumno.profesor }}</td>
                            <td>{{ alumno.porcentaje }}</td>
                            <td>{{ alumno.aula }}</td>
                            <td>{{ alumno.hora }}</td>
                            <td><a href="editar.html?id={{alumno.id}}">editar</a></td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="../construccion.html" class="btn btn-primary">Agregar curso</a>
                    <a href="../construccion.html" class="btn btn-primary">Calificaciones</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <footer>
        <p>Instituto de Idiomas de México 2017</p>
    </footer>
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