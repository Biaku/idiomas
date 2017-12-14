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
                    <div class="card-body">
                        <form action="controllers/admin/inscripcionController.php" method="post" id="form">
                            <div class="form-group">
                                <label>Alumno</label>
                                <select name="alumno"  class="form-control">
                                    <?php
                                    foreach ($alumnos as $row) {
                                        if ($grupo_alum->usuario_id == $row['id']) {
                                            echo "<option value='$row[id]' selected>$row[nombre] $row[apellidos]</option>";
                                        } else {
                                            echo "<option value='$row[id]'>$row[nombre] $row[apellidos]</option>";
                                        }
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
                                        if ($grupo_alum->grupo_id == $row['id']) {
                                            echo "<option value='$row[id]' selected>$row[nombre_idioma] $row[nombre_nivel] $row[nombre_aula]</option>";
                                        } else {
                                            echo "<option value='$row[id]'>$row[nombre_idioma] $row[nombre_nivel] $row[nombre_aula]</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" name="aula" value="<?= $id ?>">
                            <input type="hidden" name="tipo" value="actualizar">
                            <a href="?page=adm-inscripcion" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Actualizar">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include $templates_footer_adm ?>