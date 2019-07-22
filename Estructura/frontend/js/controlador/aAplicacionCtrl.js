app.controller('aAplicacionCtrl', ['$scope', '$http', function ($scope, $http) {
    $scope.activarMenu("mOpciones", "Administrar Aplicaciones");
    $scope.aplicacion = {};
    $scope.aplicaciones = {};
    $scope.tecnologias = {};
    $scope.mensaje = "";
    $scope.error = false;
    $scope.creado = false;

    $scope.estaLogueado("Aplicacion");

    $scope.listarTecnologias = function () {
        $http({
            method: 'GET',
            url: 'backend/controlador/AplicacionCtrl.php?listarTecnologias=true'
        }).then(function successCallback(respuesta) {
            $scope.tecnologias = respuesta.data;
        });
    }

    $scope.listarTecnologias();

    $scope.guardarAplicacion = function () {
        var añadir = $scope.añadirSeleccionadas();
        if (!añadir) {
            $scope.error = true;
            $scope.mensaje = "Por favor seleccione las tecnologias usadas.";
        } else {
            $scope.error = false;
            $scope.creado = false;
            $http({
                method: 'POST',
                data: $scope.aplicacion,
                url: 'backend/controlador/AplicacionCtrl.php'
            }).then(function successCallback(respuesta) {
                $scope.mensaje = respuesta.data.mensaje;
                var error = respuesta.data.err;
                if (error) {
                    $scope.error = true;
                } else {
                    $scope.guardarFoto("file", $scope.aplicacion.titulo);
                }
            });
        }
    }

    $scope.guardarFoto = function (input, titulo) {
        var fd = new FormData();
        var files = document.getElementById(input).files[0];
        if(files === undefined){
            $scope.error = true;
            $scope.mensaje = "Seleccione la foto";
        }else{
            fd.append('file', files);
            fd.append('titulo', titulo);
            $http({
                method: 'POST',
                data: fd,
                url: 'backend/controlador/subirFoto.php',
                headers: { 'Content-Type': undefined },
            }).then(function successCallback(respuesta) {
                $scope.mensaje = respuesta.data.mensaje;
                var error = respuesta.data.err;
                if (error) {
                    $scope.error = true;
                } else {
                    $scope.creado = true;
                    $scope.aplicacion = {};
                    $scope.listarAplicaciones();
                }
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

    $scope.listarAplicaciones = function () {
        $http({
            method: 'GET',
            url: 'backend/controlador/AplicacionCtrl.php?listarAplicaciones=true'
        }).then(function successCallback(respuesta) {
            $scope.aplicaciones = respuesta.data;
        });
    }

    $scope.listarAplicaciones();

    $scope.eliminarAplicacion = function (aplicacion) {
        var datos = {
            idAplicacionEliminar: aplicacion
        }
        $http({
            method: 'POST',
            data: datos,
            url: 'backend/controlador/AplicacionCtrl.php'
        }).then(function successCallback(respuesta) {
            $scope.mensaje = respuesta.data.mensaje;
            $scope.listarAplicaciones();
            $scope.creado = true;
            setTimeout(function () {
                $scope.creado = false;
                $scope.$apply();
            }, 2500);
        });
    }

}]);