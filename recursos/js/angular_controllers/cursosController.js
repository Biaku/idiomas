angular.module("ejemplo4",[]);
angular.
module('ejemplo4').
controller("cursosController",
    function($scope,$http) {
        $scope.cursos=[];
        $http.get('cursos.json')
            .then(function(response){
                $scope.cursos = response.data;
            });
    });
