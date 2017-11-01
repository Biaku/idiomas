<?php include $templates_header ?>
    <body ng-app="admin" ng-controller="horarioController">
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
                            <tr ng-repeat="horario in horarios">
                                <td>{{ horario.id }}</td>
                                <td>{{horario.nombre}}</td>
                                <td>
                                    <a href="#">Borrar</a>
                                    <a href="?page=adm-horario-editar&id={{horario.id}}">Editar</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a href="profesor.php">Ver profesor</a>
    </div>

<?php include $templates_footer_adm ?>