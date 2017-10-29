<?php include $templates_header ?>
    <body ng-app="admin" ng-controller="cursoController">
    <script src="recursos\js\vendor\chartjs/Chart.bundle.js"></script>
    <script src="recursos\js\vendor\chartjs\samples/utils.js"></script>
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Curso</h5>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Capacidad</th>
                                <th>Estatus</th>
                                <th>Descripcion</th>
                                <th>Idioma</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="curso in cursos">
                                <td>{{curso.id}}</td>
                                <td>{{curso.capacidad}}</td>
                                <td>{{curso.estatus}}</td>
                                <td>{{curso.descripcion}}</td>
                                <td>{{curso.idioma}}</td>
                                <td>
                                    <a href="#">Borrar</a>
                                    <a href="?page=adm-curso-editar&?id={{curso.id}}">Editar</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
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
            labels: ["Enero","Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio","Agosto"],
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

        window.onload = function() {
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
        document.getElementById('addDataset').addEventListener('click', function() {
            var colorName = colorNames[barChartData.datasets.length % colorNames.length];;
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