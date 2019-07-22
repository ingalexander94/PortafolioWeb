app.controller('editarAplicacionCtrl', ['$scope', '$http', '$routeParams', '$location', function ($scope, $http, $routeParams, $location) {
    $scope.notificacion = "frontend/html/partes/notificacion.html";
    $scope.activarMenu("mOpciones", "Actualizar Aplicacion");
    $scope.aplicacion = {};
    $scope.tecnologias = {};
    $scope.mensaje = "";
    $scope.mostrar = false;

    $scope.mostrarAplicacion = function () {
        var id = $routeParams.id;
        var datos = {
            editarAplicacion: id
        }
        $http({
            method: 'POST',
            data: datos,
            url: 'backend/controlador/AplicacionCtrl.php'
        }).then(function successCallback(respuesta) {
            $scope.aplicacion = respuesta.data;
            $scope.aplicacion.fecha = new Date($scope.aplicacion.fecha);
        });
    }

    $scope.tecnologiasSeleccionadas = function () {
        var id = $routeParams.id;
        var datos = {
            tecnologiasAplicacion: id
        }
        $http({
            method: 'POST',
            data: datos,
            url: 'backend/controlador/AplicacionCtrl.php'
        }).then(function successCallback(respuesta) {
            for (var i = 0; i < $scope.tecnologias.length; i++) {
                for (var j = 0; j < respuesta.data.length; j++) {
                    if ($scope.tecnologias[i].id === respuesta.data[j].tecnologia) {
                        $scope.tecnologias[i].checked = true;
                    }
                }
            }
        });
    }

    $scope.listarTecnologias = function () {
        $http({
            method: 'GET',
            url: 'backend/controlador/AplicacionCtrl.php?listarTecnologias=true'
        }).then(function successCallback(respuesta) {
            $scope.tecnologias = respuesta.data;
        });
    }

    $scope.actualizarAplicacion = function () {
        var añadir = $scope.añadirSeleccionadas();
        if (!añadir) {
            $scope.error = true;
            $scope.mensaje = "Por favor seleccione las tecnologias usadas.";
        } else {
            var datos = {
                idActualizar: $scope.aplicacion.id,
                tituloActualizar: $scope.aplicacion.titulo,
                linkActualizar: $scope.aplicacion.link,
                fechaActualizar: $scope.aplicacion.fecha,
                descripcionActualizar: $scope.aplicacion.descripcion,
                tecnologiasActualizar: $scope.aplicacion.tecnologias
            }

            $http({
                method: 'POST',
                data: datos,
                url: 'backend/controlador/AplicacionCtrl.php'
            }).then(function successCallback(respuesta) {
                $scope.mostrar = true;
                $scope.mensaje = respuesta.data.mensaje;
                setTimeout(function () {
                    $location.path("/administrarAplicaciones");
                    $scope.$apply();
                }, 2000);
            });
        }
    }

    $scope.añadirSeleccionadas = function () {
        var tecnologias = [];
        var exito = false;
        angular.forEach($scope.tecnologias, function (value, key) {
            if ($scope.tecnologias[key].checked) {
                tecnologias.push($scope.tecnologias[key].id);
            }
        });
        if (tecnologias.length > 0) {
            $scope.aplicacion.tecnologias = tecnologias;
            exito = true;
        }
        return exito;
    }

    $scope.listarTecnologias();
    $scope.mostrarAplicacion();
    $scope.tecnologiasSeleccionadas();

}]);