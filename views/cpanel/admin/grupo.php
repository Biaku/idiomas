<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php require_once 'controllers/admin/grupoController.php' ?>
<?php include $templates_header ?>
    <body >
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-right">
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">nuevo
                        </button>
                    </div>
                    <div class="card-body">
                        <h5>Grupo</h5>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>                                
                                <th>Aula</th>
                                <th>Curso</th>
                                <th>Maestro</th>
                                <th>Horario</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($grupos as $row) {
                                echo "<tr>";
                                echo "<td>$row[idg]</td>";
                                echo "<td>$row[nombre_aula]</td>";
                                echo "<td>$row[nombre_idioma] $row[nombre_nivel]</td>";
                                echo "<td>$row[nombre_maestro] $row[ap_maestro]</td>";
                                echo "<td>$row[nombre_horario]</td>";
                                echo "<td>
                                            <a href='?page=adm-grupo-editar&id=$row[idg]'>Editar</a>
                                            <a href='$row[idg]' data-toggle='modal' data-target='#deleteModal' class='linkborrar'>Borrar</a>
                                          </td>";
                                echo "</tr>";
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Grupo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/admin/grupoController.php" method="post" id="form">
                            <div class="form-group">
                                 <label>Aula</label>
                                <select name="aula" id="" class="form-control">
                                    <?php
                                    foreach ($aulas as $row) {
                                        echo "<option value='$row[id]'>$row[nombre]</option>";
                                    }

                                    ?>
                                </select>
                                <label>Curso</label>
                                <select name="curso" class="form-control">
                                    <?php
                                    foreach ($cursos as $row) {
                                        echo "<option value='$row[id]'>$row[nombre_idioma] $row[nombre_nivel]</option>";
                                    }
                                    ?>
                                </select>

                                <label for="">Maestro</label>
                                <select name="maestro" id="" class="form-control">
                                    <?php
                                    foreach ($usuarios as $row) {
                                        echo "<option value='$row[id]'>$row[nombre] $row[apellidos]</option>";
                                    }

                                    ?>
                                </select>
                                <label for="">Horario</label>
                                <select name="horario" id="" class="form-control">
                                    <?php
                                    foreach ($horarios as $row) {
                                        echo "<option value='$row[id]'>$row[descripcion]</option>";
                                    }

                                    ?>
                                </select>
                                <input type="hidden" name="tipo" value="registro">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" form="form">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- borrar -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Borrar Grupo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/admin/grupoController.php" method="post" id="form2">
                            <div class="form-group">
                                <h3 class="text-danger">¿Estas seguro de borrar este grupo?</h3>
                                <input type="hidden" name="aula" id="inpborrar">
                                <input type="hidden" name="tipo" value="borrar">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger" form="form2">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <footer>
            <p>Instituto de Idiomas de México 2017</p>
        </footer>
    </div>

<?php include $templates_footer_adm ?>