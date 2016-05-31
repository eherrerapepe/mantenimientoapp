var app = angular.module('mantenimientoApp',[]);

app.controller('timeLineCtrl',['$http','$scope', function ($http, $scope) {

    $scope.$watch('itemSelect',function (vn,vv) {
        $http.get('http://localhost:8000/listCar/'+$scope.itemSelect).success(function (data) {
            $scope.listCar = data;
        });
    });

}]);

