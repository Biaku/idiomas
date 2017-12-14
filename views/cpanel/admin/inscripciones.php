<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php require_once 'controllers/admin/inscripcionController.php' ?>
<?php include $templates_header ?>
    <body>
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-right">
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">Inscribir
                        </button>
                    </div>
                    <div class="card-body">
                        <h5>Inscripciones</h5>
                        <table class="table" ng-controller="aulaController">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Alumno</th>
                                <th>Grupo</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($inscripciones as $row) {
                                echo "<tr>";
                                echo "<td>$row[id]</td>";
                                echo "<td>$row[nombre] $row[apellidos]</td>";
                                echo "<td>$row[nombre_idioma] $row[nombre_nivel]</td>";

                                echo "<td>
                                            <a href='?page=adm-inscripcion-editar&id=$row[id]'>Editar</a>
                                            <a href='$row[id]' data-toggle='modal' data-target='#deleteModal' class='linkborrar'>Borrar</a>
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
                        <h5 class="modal-title" id="exampleModalLabel">Inscribir alumno </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/admin/inscripcionController.php" method="post" id="form">
                            <div class="form-group">
                                <label>Alumno</label>
                                <select name="alumno"  class="form-control">
                                    <?php
                                    foreach ($alumnos as $row) {
                                        echo "<option value='$row[id]'>$row[nombre] $row[apellidos]</option>";
                                    }
                                    ?>

                                </select>
                                <input type="hidden" name="tipo" value="registro">
                            </div>
                            <div class="form-group">
                                <label>Grupo</label>
                                <select name="grupo" id="" class="form-control">
                                    <?php
                                    foreach ($grupos as $row) {
                                        echo "<option value='$row[id]'>$row[nombre_idioma] $row[nombre_nivel] $row[nombre_aula]</option>";
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
        <!-- =============================================================================================== -->
        <!-- =========================== MODAL BORRAR AULA ================================================ -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Borrar Aula</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="controllers/admin/inscripcionController.php" method="post" id="form2">
                            <div class="form-group">
                                <h3 class="text-danger">¿Estas seguro de borra esta inscripcion?</h3>
                                <input id="inpborrar" type="hidden" name="aula">
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
    </div>
<?php include $templates_footer_adm ?>