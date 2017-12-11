<?php session_start();
include_once 'models/Conexion.php';
$id = $_SESSION['usuario']->id;
$sql = "SELECT
            aula.nombre AS aula,
            idioma.nombre AS curso_idioma,
            usuario.nombre AS maestro,
            usuario.apellidos AS maestro_ap,
            grupo.id AS idg,
            horario.descripcion AS horario,
            nivel.nombre AS nivel_idioma
            FROM
            grupo
            INNER JOIN aula ON grupo.aula_id = aula.id
            INNER JOIN curso ON grupo.curso_id = curso.id
            INNER JOIN idioma ON curso.idioma_id = idioma.id
            INNER JOIN usuario ON grupo.maestro_id = usuario.id
            INNER JOIN horario ON grupo.horario_id = horario.id ,
            nivel WHERE maestro_id = $id";
    $grupos = $pdo->query($sql);

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
                    <h1>Profesor: <?= $_SESSION['usuario']->nombre ." ". $_SESSION['usuario']->apellidos ?></h1>
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
                    <h4>Grupos asignados</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Aula</th>
                            <th>Curso</th>
                            <th>Horario</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($grupos as $row) {
                            echo "<tr>";
                            echo "<td>$row[idg]</td>";
                            echo "<td>$row[aula]</td>";
                            echo "<td>$row[curso_idioma] $row[nivel_idioma]</td>";
                            echo "<td>$row[horario]</td>";
                            echo "<td><a href='?page=lista_alumnos&idg=$row[idg]'>Ver lista de alumnos</a></td>";
                            echo "</tr>";
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