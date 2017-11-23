<?php require_once 'controllers/admin/cursoController.php' ?>
<?php include $templates_header ?>
    <body>
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" ng-controller="cursoEditController">
                        <h5>Curso</h5>
                        <form action="controllers/admin/cursoController.php" method="post">
                            <div class="form-group">
                                <label>Capacidad</label>
                                <input type="text" class="form-control" value="<?= $res->capacidad ?>" name="capacidad">
                            </div>
                            <div class="form-group">
                                <label>Idioma</label>
                                <select name="idioma" id="" class="form-control">
                                    <?php
                                    foreach ($idiomas as $row) {
                                        if ($res->idioma_id == $row['id']) {
                                            echo "<option value='$row[id]' selected>$row[nombre]</option>";
                                        } else {
                                            echo "<option value='$row[id]'>$row[nombre]</option>";
                                        }

                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nivel</label>
                                <select name="desc" class="form-control">
                                <?php
                                foreach ($niveles as $row) {
                                    if ($res->id_nivel == $row['id']) {
                                        echo "<option value='$row[id]' selected>$row[nombre]</option>";
                                    } else {
                                        echo "<option value='$row[id]'>$row[nombre]</option>";
                                    }

                                }
                                ?>
                                </select>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <?php
                                    if($res->esta_abierto == 1){
                                    echo '<input type="checkbox" class="form-check-input" name="estatus" checked>';
                                    }
                                    else{
                                        echo '<input type="checkbox" class="form-check-input" name="estatus">';
                                    }
                                    ?>
                                    ¿Abierto?
                                </label>
                            </div>
                            <input type="hidden" name="aula" value="<?= $id ?>">
                            <input type="hidden" name="tipo" value="actualizar">
                            <a href="?page=adm-curso" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Actualizar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include $templates_footer_adm ?>