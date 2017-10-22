angular.module("ejemplo4", []);
angular.module('ejemplo4').controller("alumnoC",
    function ($scope, $http) {
        $scope.alumnosg = [];
        $http.get('alumnosg.json')
            .then(function (response) {
                id = getParameterByName("id");
                for (var i = 0, len = response.data.length; i < len; i++) {
                    if (response.data[i]["id"] == id) {
                        $scope.paterno = response.data[i]["paterno"];
                        $scope.materno = response.data[i]["materno"];
                        $scope.nombre = response.data[i]["nombre"];
                        $scope.matricula = response.data[i]["matricula"];
                        $scope.porcentaje = response.data[i]["porcentaje"];
                    }
                }
            });
    });

function getParameterByName(name) {
    var match = RegExp('[?&]' + name + '=([^&]*)').exec(window.location.search);
    return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
}
