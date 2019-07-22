app.controller('aplicacionesCtrl', ['$scope', '$http', function ($scope, $http) {
  $scope.activarMenu("mAplicaciones", "Aplicaciones");
  $scope.aplicaciones = {};
  $scope.cargando = false;
  $scope.aplicacion = {};

  $scope.listarAplicaciones = function () {
    $scope.cargando = true;
    $http({
      method: 'GET',
      url: 'backend/controlador/AplicacionCtrl.php?listarAplicaciones=true'
    }).then(function successCallback(respuesta) {
      setTimeout(() => {
        $scope.aplicaciones = respuesta.data;
        $scope.cargando = false;
        $scope.$apply();
      }, 1000);
    });
  }

  $scope.mostrarDetalles = function (id) {
    for (var x = 0; x < $scope.aplicaciones.length; x++) {
      if ($scope.aplicaciones[x].id == id) {
        $scope.aplicacion = $scope.aplicaciones[x];
        break;
      }
    }
    $scope.tecnologiasSeleccionadas(id);
  }

  $scope.tecnologiasSeleccionadas = function (id) {
    var datos = {
      tecnologiasAplicacion: id
    }
    $http({
      method: 'POST',
      data: datos,
      url: 'backend/controlador/AplicacionCtrl.php'
    }).then(function successCallback(respuesta) {
      $scope.aplicacion.tecnologias = respuesta.data;
    });
  }

  $scope.listarAplicaciones();


}]);