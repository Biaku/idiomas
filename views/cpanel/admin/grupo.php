<?php include $templates_header ?>
    <body ng-app="admin" ng-controller="grupoController">
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Grupo</h5>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="grupo in grupos">
                                <td>{{grupo.id}}</td>
                                <td>{{grupo.nombre}}</td>
                                <td>
                                    <a href="#">Borrar</a>
                                    <a href="?page=adm-grupo-editar&id={{grupo.id}}">Editar</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
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