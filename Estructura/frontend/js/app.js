var app = angular.module('PortafolioApp', ['ngRoute']);
app.controller('modeloCtrl', ['$scope', '$http', '$location', function ($scope, $http, $location) {

    $scope.header = "frontend/html/partes/header.html";
    $scope.footer = "frontend/html/partes/footer.html";
    $scope.configuracion = {};
    $scope.permiso = true;
    $scope.correcto = false;
    $scope.mensaje = "";
    $scope.menuAdministrador = false;
    $scope.sesion = {};

    $scope.activarMenu = function (menu, titulo) {
        $scope.mInicio = "";
        $scope.mAplicaciones = "";
        $scope.mCursos = "";
        $scope.mContacto = "";
        $scope.mOpciones = "";
        $scope.mLogin = "";
        $scope[menu] = "active";
        $scope.titulo = titulo;
    }

    $scope.estaLogueado = function (menu) {
        var datos = {
            menuValidar: menu
        }
        $http({
            method: 'POST',
            data: datos,
            url: 'backend/controlador/UsuarioCtrl.php'
        }).then(function successCallback(respuesta) {
            if (!respuesta.data.err) {
                if (menu === "Ingresar") {
                    $location.path("/inicio");
                }
                $scope.permiso = false;
                var array = respuesta.data.roles;
                $scope.menuAdministrador = array.includes('Administrador');
                $scope.sesion = respuesta.data;
            } else {
                $scope.permiso = true;
                $location.path("/ingresar");
                $scope.menuAdministrador = false;
                $scope.sesion = {};
            }
        });
    }

    $scope.cerrarSesion = function () {
        $http({
            method: 'GET',
            url: 'backend/controlador/UsuarioCtrl.php?cerrarSesion=true'
        }).then(function successCallback(respuesta) {
            if (!respuesta.data.err) {
                $scope.estaLogueado("Ingresar");
            }
        });
    }

    $scope.activarMenu("mInicio", "Inicio");

    $http({
        method: 'GET',
        url: 'frontend/assets/json/configuracion.json'
    }).then(function successCallback(respuesta) {
        $scope.configuracion = respuesta.data;
    });

}]);