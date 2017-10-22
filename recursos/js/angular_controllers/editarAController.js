angular.module("ejemplo5", []);
angular.module('ejemplo5').controller("ealumnoC",
    function ($scope, $http) {
        $scope.alumnosg = [];
        $http.get('alumnos.json')
            .then(function (response) {
                id = getParameterByName("id");
                for (var i = 0, len = response.data.length; i < len; i++) {
                    if (response.data[i]["id"] == id) {
                        $scope.curso = response.data[i]["curso"];
                        $scope.profesor = response.data[i]["profesor"];
                        $scope.porcentaje = response.data[i]["porcentaje"];
                        $scope.aula = response.data[i]["aula"];
                        $scope.hora = response.data[i]["hora"];
                    }
                }
            });
    });

function getParameterByName(name) {
    var match = RegExp('[?&]' + name + '=([^&]*)').exec(window.location.search);
    return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
}
