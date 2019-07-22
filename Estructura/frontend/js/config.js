app.config(function($routeProvider){

    $routeProvider
        .when('/',{
            templateUrl: 'frontend/html/paginas/inicio.html',
            controller: 'inicioCtrl'
        })
        .when('/contacto',{
            templateUrl: 'frontend/html/paginas/contacto.html',
            controller: 'contactoCtrl'
        })
        .when('/aplicaciones',{
            templateUrl: 'frontend/html/paginas/aplicaciones.html',
            controller: 'aplicacionesCtrl'
        })
        .when('/ayd',{
            templateUrl: 'frontend/html/paginas/ayd.html',
            controller: 'aydCtrl'
        })
        .when('/software',{
            templateUrl: 'frontend/html/paginas/software.html',
            controller: 'softwareCtrl'
        })
        .when('/administrarAplicaciones',{
            templateUrl: 'frontend/html/administrador/aAplicacion.html',
            controller: 'aAplicacionCtrl'
        })
        .when('/administrarTalleres',{
            templateUrl: 'frontend/html/administrador/taller.html',
            controller: 'tallerCtrl'
        })
        .when('/taller/:id',{
            templateUrl: 'frontend/html/administrador/editarTaller.html',
            controller: 'editarTallerCtrl'
        })
        .when('/aplicacion/:id',{
            templateUrl: 'frontend/html/administrador/editarAplicacion.html',
            controller: 'editarAplicacionCtrl'
        })
        .when('/ingresar',{
            templateUrl: 'frontend/html/paginas/ingresar.html',
            controller: 'loginCtrl'
        })
        .otherwise({
            redirectTo: '/'
        });

});