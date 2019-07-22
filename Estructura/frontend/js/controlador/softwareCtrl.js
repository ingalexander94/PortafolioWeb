app.controller('softwareCtrl',['$scope','$http',function($scope,$http){
    $scope.activarMenu("mCursos","Ingenieria de Software");
    $scope.cargando = false;
    $scope.talleres = {};
    $scope.taller = {};

    $scope.listarTalleres = function () {
        $scope.cargando = true;
        $http({
            method: 'GET',
            url: 'backend/controlador/TallerCtrl.php?listarTalleresIngenieria=true'
        }).then(function successCallback(respuesta) {
            setTimeout(function () {
                $scope.talleres = respuesta.data;
                $scope.cargando = false;
                $scope.$apply();
            }, 1000);
        });
    }

    $scope.mostrarDetalles = function (id) {
        for(var x=0;x<$scope.talleres.length;x++){
            if($scope.talleres[x].id == id){
                $scope.taller = $scope.talleres[x];
                break;
            }
        }
    }

    $scope.listarTalleres();


}]);