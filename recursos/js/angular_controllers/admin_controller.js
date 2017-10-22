var app = angular.module('admin', []);

app.controller('aulaController', function ($scope, $http) {
    $scope.aulas = [];
    $http.get("recursos/js/json/admin/aulas.json").then(function ($response) {
        $scope.aulas = $response.data;
    });
});

app.controller('aulaEditController', function ($scope, $http) {
    $http.get("recursos/js/json/admin/aulas.json").then(function (response) {
        var id = getParameterByName("id");
        for (var i = 0, len = response.data.length; i < len; i++) {
            if (response.data[i]["id"] == id) {
                $scope.nombre = response.data[i]["nombre"];
            }
        }
    });
});

app.controller('cursoController', function ($scope, $http) {
    $scope.cursos = [];
    $http.get("recursos/js/json/admin/cursos.json").then(function ($response) {
        $scope.cursos = $response.data;
    });
});

app.controller('cursoEditController', function ($scope, $http) {
    $http.get("recursos/js/json/admin/cursos.json").then(function (response) {
        var id = getParameterByName("id");
        for (var i = 0, len = response.data.length; i < len; i++) {
            if (response.data[i]["id"] == id) {
                $scope.id = response.data[i]["id"];
                $scope.capacidad = response.data[i]["capacidad"];
                $scope.estatus = response.data[i]["estatus"];
                $scope.descripcion = response.data[i]["descripcion"];
                $scope.idioma = response.data[i]["idioma"];
            }
        }
    });
});

app.controller('grupoController', function ($scope, $http) {
    $scope.grupos = [];
    $http.get("recursos/js/json/admin/grupos.json").then(function ($response) {
        $scope.grupos = $response.data;
    });
});

app.controller('grupoEditController', function ($scope, $http) {
    $http.get("recursos/js/json/admin/grupos.json").then(function (response) {
        var id = getParameterByName("id");
        for (var i = 0, len = response.data.length; i < len; i++) {
            if (response.data[i]["id"] == id) {
                $scope.nombre = response.data[i]["nombre"];
            }
        }
    });
});

app.controller('horarioController', function ($scope, $http) {
    $scope.horarios = [];
    $http.get("recursos/js/json/admin/horarios.json").then(function ($response) {
        $scope.horarios = $response.data;
    });
});

app.controller('horarioEditController', function ($scope, $http) {
    $http.get("recursos/js/json/admin/horarios.json").then(function (response) {
        var id = getParameterByName("id");
        for (var i = 0, len = response.data.length; i < len; i++) {
            if (response.data[i]["id"] == id) {
                $scope.nombre = response.data[i]["nombre"];
            }
        }
    });
});

app.controller('idiomaController', function ($scope, $http) {
    $scope.idiomas = [];
    $http.get("recursos/js/json/admin/idiomas.json").then(function ($response) {
        $scope.idiomas = $response.data;
    });
});

app.controller('idiomaEditController', function ($scope, $http) {
    $http.get("recursos/js/json/admin/idiomas.json").then(function (response) {
        var id = getParameterByName("id");
        for (var i = 0, len = response.data.length; i < len; i++) {
            if (response.data[i]["id"] == id) {
                $scope.nombre = response.data[i]["nombre"];
            }
        }
    });
});

function getParameterByName(name) {
    var match = RegExp('[?&]' + name + '=([^&]*)').exec(window.location.search);
    return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
}