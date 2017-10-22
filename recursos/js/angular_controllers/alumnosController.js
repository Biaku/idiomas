angular.module("ejemplo", []);
angular.module('ejemplo').controller("alumnosController",
    function ($scope, $http) {
        $scope.alumnos = [];
        $http.get('recursos/js/json/alumnos.json')
            .then(function (response) {
                $scope.alumnos = response.data;
            });
    });