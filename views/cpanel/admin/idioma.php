<?php include $templates_header ?>
    <body ng-app="admin" ng-controller="idiomaController">
    <script src="recursos\js\vendor\chartjs/Chart.bundle.js"></script>
    <script src="recursos\js\vendor\chartjs\samples/utils.js"></script>
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Horario</h5>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="idioma in idiomas">
                                <td>{{ idioma.id }}</td>
                                <td>{{idioma.nombre}}</td>
                                <td>
                                    <a href="#">Borrar</a>
                                    <a href="?page=adm-idioma-editar&id={{idioma.id}}">Editar</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<h2><center>Grafica de Alumnos por idioma</center></h2>
<center><div id="canvas-holder" style="width:65%">
        <canvas id="chart-area" />
    </div>
   <!-- <button id="randomizeData">Randomize Data</button>
    <button id="addDataset">Add Dataset</button>
    <button id="removeDataset">Remove Dataset</button>!-->
    <script>
    var randomScalingFactor = function() 
    {
        return Math.round(Math.random() * 100);
    };

    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                ],
                backgroundColor: [
                    window.chartColors.red,
                    window.chartColors.orange,
                    window.chartColors.yellow,
                    window.chartColors.green,
                    window.chartColors.blue,
                ],
                label: 'Dataset 1'
            }],
            labels: [
                "Ingles",
                "Aleman",
                "Japones",
                "Frances",
                "Italiano"
            ]
        },
        options: {
            responsive: true
        }
    };

    window.onload = function() {
        var ctx = document.getElementById("chart-area").getContext("2d");
        window.myPie = new Chart(ctx, config);
    };

    document.getElementById('randomizeData').addEventListener('click', function() {
        config.data.datasets.forEach(function(dataset) {
            dataset.data = dataset.data.map(function() {
                return randomScalingFactor();
            });
        });

        window.myPie.update();
    });

    var colorNames = Object.keys(window.chartColors);
    document.getElementById('addDataset').addEventListener('click', function() {
        var newDataset = {
            backgroundColor: [],
            data: [],
            label: 'New dataset ' + config.data.datasets.length,
        };

        for (var index = 0; index < config.data.labels.length; ++index) {
            newDataset.data.push(randomScalingFactor());

            var colorName = colorNames[index % colorNames.length];;
            var newColor = window.chartColors[colorName];
            newDataset.backgroundColor.push(newColor);
        }

        config.data.datasets.push(newDataset);
        window.myPie.update();
    });

    document.getElementById('removeDataset').addEventListener('click', function() {
        config.data.datasets.splice(0, 1);
        window.myPie.update();
    });
    </script>
    </center>
    </div>

<?php include $templates_footer_adm ?>