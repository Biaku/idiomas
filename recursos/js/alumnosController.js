angular.module("ejemplo",[]);
angular.
module('ejemplo').
controller("alumnosController",
    function($scope,$http) {
        $scope.alumnos=[];
        $http.get('alumnos.json')
            .then(function(response){
                $scope.alumnos = response.data;
            });
    });
