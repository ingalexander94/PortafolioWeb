app.controller('tallerCtrl', ['$scope', '$http', function ($scope, $http) {
  $scope.activarMenu("mOpciones", "Administrar Talleres");
  $scope.taller = {};
  $scope.talleres = {};
  $scope.respuesta = "";
  $scope.creado = false;

  $scope.estaLogueado("Taller");

  $scope.listarTalleres = function () {
    $http({
      method: 'GET',
      url: 'backend/controlador/TallerCtrl.php?listarTalleres=true'
    }).then(function successCallback(respuesta) {
      $scope.talleres = respuesta.data;
    });
  }

  $scope.listarTalleres();


  $scope.guardarTaller = function () {
    $http({
      method: 'POST',
      data: $scope.taller,
      url: 'backend/controlador/TallerCtrl.php'
    }).then(function successCallback(respuesta) {
      $scope.respuesta = respuesta.data;
      $scope.taller = {};
      $scope.listarTalleres();
      $scope.creado = true;
      setTimeout(function () {
        $scope.creado = false;
        $scope.$apply();
      }, 2500);
    });
  }

  $scope.eliminarTaller = function (taller) {
    var datos = {
      idTallerEliminar : taller
    }
    $http({
      method: 'POST',
      data: datos,
      url: 'backend/controlador/TallerCtrl.php'
    }).then(function successCallback(respuesta) {
      $scope.respuesta = respuesta.data;
      $scope.listarTalleres();
      $scope.creado = true;
      setTimeout(function () {
        $scope.creado = false;
        $scope.$apply();
      }, 2500);
    });
  }

}]);