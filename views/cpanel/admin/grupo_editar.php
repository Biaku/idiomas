<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php require_once 'controllers/admin/grupoController.php' ?>
<?php include $templates_header ?>
    <body>
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="controllers/admin/grupoController.php" method="post" id="form">
                            <div class="form-group">
                                <label>Aula</label>
                                <select name="aula" id="" class="form-control">
                                    <?php
                                    foreach ($aulas as $row) {
                                        if ($res->aula_id == $row['id']) {
                                            echo "<option value='$row[id]' selected>$row[nombre]</option>";
                                        } else {
                                            echo "<option value='$row[id]'>$row[nombre]</option>";
                                        }
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Curso</label>
                                <select name="curso" class="form-control">
                                    <?php
                                    foreach ($cursos as $row) {
                                        if ($res->curso_id == $row['id']) {
                                            echo "<option value='$row[id]' selected>$row[nombre]</option>";
                                        } else {
                                            echo "<option value='$row[id]'>$row[nombre]</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Maestro</label>
                                <select name="maestro" id="" class="form-control">
                                    <?php
                                    foreach ($usuarios as $row) {
                                        if ($res->maestro_id == $row['id']) {
                                            echo "<option value='$row[id]' selected>$row[nombre] $row[apellidos]</option>";
                                        } else {
                                            echo "<option value='$row[id]'>$row[nombre] $row[apellidos]</option>";
                                        }
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Horario</label>
                                <select name="horario" id="" class="form-control">
                                    <?php
                                    foreach ($horarios as $row) {
                                        if ($res->horario_id == $row['id']) {
                                            echo "<option value='$row[id]' selected>$row[descripcion]</option>";
                                        } else {
                                            echo "<option value='$row[id]'>$row[descripcion]</option>";
                                        }
                                    }

                                    ?>
                                </select>
                            </div>
                            <br>
                            <input type="hidden" name="aula" value="<?= $id ?>">
                            <input type="hidden" name="tipo" value="actualizar">
                            <a href="?page=adm-grupo" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Actualizar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

<?php include $templates_footer_adm ?>