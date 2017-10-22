<?php include $templates_header ?>
    <body ng-app="admin" ng-controller="horarioEditController">
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label>Descripcion</label>
                                <input type="text" class="form-control" ng-model="nombre">
                            </div>
                            <a class="btn btn-primary" href="?page=adm-horario">guardar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

<?php include $templates_footer_adm ?>