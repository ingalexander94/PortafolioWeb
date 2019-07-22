app.controller('loginCtrl', ['$scope','$http', function ($scope,$http) {
    $scope.activarMenu("mLogin", "Iniciar Sesión");
    
    $scope.usuario = {};
    $scope.estaLogueado("Ingresar");
    $scope.url = "frontend/img/login/0.jpg";
    $scope.cargando = false;
    $scope.error = false;
    $scope.correcto = false;
    $scope.mensaje = "";

    $scope.animar = function () {
        var longitud;
        if($scope.usuario.admin === "" || $scope.usuario.admin === undefined){
            longitud = 0;
        }else{
            longitud = $scope.usuario.admin.length;
        }
        if (longitud > 24) {
            longitud = 24;
        }
        $scope.url = "frontend/img/login/" + longitud + ".jpg";
    }

    $scope.esconder = function () {
        $scope.url = "frontend/img/login/tapar.png";
    }

    $scope.iniciarSesion = function(){
        $scope.cargando = true;
        $http({
            method: 'POST',
            data: $scope.usuario,
            url: 'backend/controlador/UsuarioCtrl.php'
          }).then(function successCallback(respuesta) {
            setTimeout(() => {
                if(respuesta.data.err){
                    $scope.error = true;
                }else{
                    $scope.correcto = true;
                    $scope.usuario = {};
                }
                $scope.mensaje = respuesta.data.mensaje;
                $scope.cargando = false;
                $scope.$apply();
            }, 1000);
            setTimeout(() => {
                $scope.estaLogueado("Ingresar");
            }, 2000);
          });
    }

}]);