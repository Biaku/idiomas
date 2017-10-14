angular.module("ejemplo3",[]);
angular.
module('ejemplo3').
controller("alumnosGController",
    function($scope,$http) {
        $scope.alumnosg=[];
        $http.get('alumnosg.json')
            .then(function(response){
                $scope.alumnosg = response.data;
            });
    });
