<?php include $templates_header ?>
    <body ng-app="admin" ng-controller="cursoController">
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

<?php include $templates_footer_adm ?>