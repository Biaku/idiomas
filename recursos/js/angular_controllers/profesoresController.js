angular.module("ejemplo2",[]);
angular.
module('ejemplo2').
controller("profesoresController",
    function($scope,$http) {
        $scope.profesores=[];
        $http.get('profesores.json')
            .then(function(response){
                $scope.profesores = response.data;
            });
    });
