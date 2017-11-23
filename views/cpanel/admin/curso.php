<?php require_once 'controllers/admin/cursoController.php' ?>
<?php include $templates_header ?>
    <body>
<script src="recursos\vendor\chartjs/Chart.bundle.js"></script>
<script src="recursos\vendor\chartjs\samples/utils.js"></script>
<?php include $templates_navbar_adm ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-right">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">Nuevo
                    </button>
                </div>
                <div class="card-body">
                    <h5>Curso</h5>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Capacidad</th>
                            <th>Estatus</th>
                            <th>Iidioma</th>
                            <th>Nivel</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($query as $row) {
                            echo "<tr>";
                            echo "<td>$row[id]</td>";
                            echo "<td>$row[capacidad]</td>";
                            echo "<td>$row[esta_abierto]</td>";
                            echo "<td>$row[nombre_idioma]</td>";
                            echo "<td>$row[nombre_nivel]</td>";
                            echo "<td>
                                            <a href='?page=adm-curso-editar&id=$row[id]'>Editar</a>
                                            <a href='#' data-toggle='modal' data-target='#deleteModal'>Borrar</a>
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
    <!-- crear -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo curso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="controllers/admin/cursoController.php" method="post" id="form">
                        <div class="form-group">
                            <label>Capacidad</label>
                            <input type="text" class="form-control" name="capacidad">
                            <label>Nivel</label>
                            <select name="desc" id="" class="form-control">
                                <?php
                                foreach ($niveles as $row) {
                                    echo "<option value='$row[id]'>$row[nombre]</option>";
                                }

                                ?>
                            </select>
                            <label>Idioma</label>
                            <select name="idioma" class="form-control">
                                <?php
                                foreach ($idiomas as $row) {
                                    echo "<option value='$row[id]'>$row[nombre]</option>";
                                }

                                ?>
                            </select>
                            <br>
                            <label for="">Estatus</label>
                            <select name="estatus" id="" class="form-control">
                                <option value="0">cerrado</option>
                                <option value="1">abierto</option>
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
                    <h5 class="modal-title" id="deleteModalLabel">Borrar Aula</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="controllers/admin/cursoController.php" method="post" id="form2">
                        <div class="form-group">
                            <h3 class="text-danger">¿Estas seguro de borrar este curso?</h3>
                            <input type="hidden" name="aula" value=<?= $row['id'] ?>>
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
<center><h2>Grafica de Barras de Alumnos por mes</h2>
    <div id="container" style="width: 50%;">
        <canvas id="canvas"></canvas>
    </div>
    <script>
        var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var color = Chart.helpers.color;
        var barChartData = {
            labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto"],
            datasets: [{
                label: 'Alumnos por mes',
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
                    100,
                    50,
                    150,
                    200,
                    180,
                    90,
                    110,
                    50
                ]
            }]

        };

        window.onload = function () {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Grafico Mensual de Inscripciones'
                    }
                }
            });

        };


        var colorNames = Object.keys(window.chartColors);
        document.getElementById('addDataset').addEventListener('click', function () {
            var colorName = colorNames[barChartData.datasets.length % colorNames.length];
            ;
            var dsColor = window.chartColors[colorName];
            var newDataset = {
                label: 'Ventas ' + barChartData.datasets.length,
                backgroundColor: color(dsColor).alpha(0.5).rgbString(),
                borderColor: dsColor,
                borderWidth: 1,
                data: []
            };

            for (var index = 0; index < barChartData.labels.length; ++index) {
                newDataset.data.push(randomScalingFactor());
            }

            barChartData.datasets.push(newDataset);
            window.myBar.update();
        });


    </script>
</center>



<?php include $templates_footer_adm ?>