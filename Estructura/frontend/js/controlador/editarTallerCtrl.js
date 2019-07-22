app.controller('editarTallerCtrl',['$scope','$http','$routeParams','$location',function($scope,$http,$routeParams,$location){
    $scope.notificacion = "frontend/html/partes/notificacion.html";
    $scope.activarMenu("mOpciones", "Actualizar Taller");
    $scope.taller = {};
    $scope.respuesta = "";
    $scope.mostrar = false;
    var id = $routeParams.id;
    var datos = {
      editarTaller : id
    }
    $http({
        method: 'POST',
        data: datos,
        url: 'backend/controlador/TallerCtrl.php'
      }).then(function successCallback(respuesta) {
        $scope.taller = respuesta.data;
        $scope.taller.fecha = new Date($scope.taller.fecha);
      });

    $scope.actualizarTaller = function(){
      var datos = {
        idActualizar : $scope.taller.id,
        tituloActualizar : $scope.taller.titulo,
        linkActualizar : $scope.taller.link,
        archivoActualizar : $scope.taller.archivo,
        fechaActualizar : $scope.taller.fecha,
        nombreActualizar : $scope.taller.nombre,
        descripcionActualizar : $scope.taller.descripcion,
        cursoActualizar : $scope.taller.curso
      }

      $http({
        method: 'POST',
        data: datos,
        url: 'backend/controlador/TallerCtrl.php'
      }).then(function successCallback(respuesta) {
        $scope.mostrar = true;
        $scope.respuesta = respuesta.data;
        setTimeout(function () {
          $location.path("/administrarTalleres");
          $scope.$apply();
        }, 2000);
      });
    }
}]);