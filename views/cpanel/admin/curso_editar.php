<?php include $templates_header ?>
    <body ng-app="admin">
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" ng-controller="cursoEditController">
                        <h5>Curso</h5>
                        <form>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control"  ng-model="id">
                            </div>
                            <div class="form-group">
                                <label>Capacidad</label>
                                <input type="text" class="form-control" ng-model="capacidad">
                            </div>
                            <div class="form-group">
                                <label>Descripcion</label>
                                <input type="text" class="form-control" ng-model="descripcion">
                            </div>
                            <div class="form-group">
                                <label>Idioma</label>
                                <select name="" id="" class="form-control" ng-model="idioma">
                                    <option value="1">Ingles</option>
                                    <option value="2">Alemam</option>
                                    <option value="3">Japones</option>
                                </select>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" ng-model="estatus">
                                    ¿Abierto?
                                </label>
                            </div>
                            <a class="btn btn-primary" href="?page=adm-curso">Agregar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include $templates_footer_adm ?>