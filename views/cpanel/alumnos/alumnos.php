<?php
session_start();
include_once 'models/Conexion.php';
$id = $_SESSION['usuario']->id;

$sql = "SELECT
        idioma.nombre AS nombre_idioma,
        nivel.nombre AS nivel_idioma,
        usuario.apellidos AS profe_ap,
        usuario.nombre AS profe_nombre,
        horario.descripcion AS horario,
        aula.nombre as nombre_aula
        FROM
        grupo_alumno
        INNER JOIN grupo ON grupo_alumno.grupo_id = grupo.id
        INNER JOIN curso ON grupo.curso_id = curso.id
        INNER JOIN idioma ON curso.idioma_id = idioma.id
        INNER JOIN nivel ON curso.nivel_id = nivel.id
        INNER JOIN usuario ON grupo.maestro_id = usuario.id
        INNER JOIN horario ON grupo.horario_id = horario.id
        INNER JOIN aula ON grupo.aula_id = aula.id
        WHERE usuario_id = $id";

$cursos = $pdo->query($sql);

?>
<?php include $templates_header_cp ?>
<body>
<?php include $templates_navbar_cp ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Alumno: <?= $_SESSION['usuario']->nombre . " " . $_SESSION['usuario']->apellidos ?></h1>
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
                            <th>Aula</th>
                            <th>Hora</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($cursos as $row) {
                            echo "<tr>";
                            echo "<td>$row[nombre_idioma] $row[nivel_idioma]</td>";
                            echo "<td>$row[profe_nombre] $row[profe_ap]</td>";
                            echo "<td>$row[nombre_aula]</td>";
                            echo "<td>$row[horario]</td>";
                        }
                        ?>
                        </tbody>
                    </table>
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